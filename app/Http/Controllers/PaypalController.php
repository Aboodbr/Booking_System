<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\PaymentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;

class PaypalController extends Controller
{
    private PaymentServiceInterface $paymentService;

    public function __construct(PaymentServiceInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Create a PayPal order (redirect to PayPal approval URL).
     */
    public function createPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string',
            'booking_id' => 'required|exists:bookings,id',
        ]);

        return $this->paymentService->createPayment($request);
    }

    /**
     * PayPal return URL for successful payment.
     */
    public function paymentSuccess(Request $request)
    {
        Log::info('PayPal returned to paymentSuccess', [
            'query' => $request->query(),
        ]);

        $token = $request->query('token');
        if (!$token) {
            Log::warning('No token received in paymentSuccess');
            return redirect()->route('payment.failed')->with('error', 'Invalid PayPal response.');
        }

        $response = $this->paymentService->capturePayment((string) $token);

        Log::info('PayPal capturePaymentOrder response', [
            'response' => $response
        ]);

        $booking = $this->paymentService->processSuccessfulPayment($response);

        if ($booking) {
            return redirect()->route('payment.success', ['booking' => $booking->id]);
        }

        Log::error('PayPal capture failed', ['response' => $response]);
        return redirect()->route('payment.failed')->with('error', 'Payment capture failed.');
    }

    public function paymentCancel()
{
    session()->forget('paypal_booking_id');
    return view('payment-cancelled');
}

public function paymentFailed()
{
    return view('payment-failed');
}


}
