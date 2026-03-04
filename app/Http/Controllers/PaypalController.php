<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;

class PaypalController extends Controller
{
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

        $amount = number_format($request->input('amount'), 2, '.', '');
        $description = $request->input('description', 'Payment');
        $bookingId = $request->input('booking_id');

        // ✅ نخزن booking_id في session
        session(['paypal_booking_id' => $bookingId]);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $orderData = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => config('paypal.currency', 'USD'),
                        "value" => $amount,
                    ],
                    "description" => $description,
                    "custom_id" => (string) $bookingId, // Store booking ID in PayPal order
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ]
        ];

        Log::info('Order data sent to PayPal', $orderData);

        $response = $provider->createOrder($orderData);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
            return redirect()->back()->with('error', 'Approval link not found.');
        }

        Log::error('PayPal createOrder failed', ['response' => $response]);
        return redirect()->back()->with('error', 'Failed to create PayPal order.');
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

    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();

    $response = $provider->capturePaymentOrder($token);

    Log::info('PayPal capturePaymentOrder response', [
        'response' => $response
    ]);

    if (isset($response['status']) && $response['status'] === 'COMPLETED') {
        $bookingId = $response['purchase_units'][0]['custom_id'] ?? session('paypal_booking_id');
        Log::info('Payment completed, booking ID: ' . $bookingId);

        if ($bookingId) {
            $booking = Booking::find($bookingId);
            if ($booking) {
                $booking->update(['status' => 'paid']);
                Log::info('Booking status updated to paid', [
                    'booking_id' => $bookingId
                ]);

                // مسح booking_id من session
                session()->forget('paypal_booking_id');

                // عرض صفحة النجاح مع تفاصيل الحجز
                return view('payment-success', compact('booking'));
            } else {
                Log::warning('Booking not found for ID: ' . $bookingId);
            }
        } else {
            Log::warning('Booking ID not found in PayPal response or session.');
        }
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
