<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\PaymentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalService implements PaymentServiceInterface
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPayment(Request $request)
    {
        $amount = number_format((float) $request->input('amount'), 2, '.', '');
        $description = $request->input('description', 'Payment');
        $bookingId = $request->input('booking_id');

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
                    "custom_id" => (string) $bookingId,
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
     * @param string $token
     * @return array
     */
    public function capturePayment(string $token): array
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        return $provider->capturePaymentOrder($token);
    }

    /**
     * @param array $response
     * @return \App\Models\Booking|null
     */
    public function processSuccessfulPayment(array $response): ?\App\Models\Booking
    {
        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $bookingId = $response['purchase_units'][0]['custom_id'] ?? session('paypal_booking_id');
            Log::info('Payment completed, booking ID: ' . $bookingId);

            if ($bookingId) {
                $booking = \App\Models\Booking::find($bookingId);
                if ($booking) {
                    $booking->update(['status' => 'paid']);
                    Log::info('Booking status updated to paid', [
                        'booking_id' => $bookingId
                    ]);

                    // Clear booking_id from session
                    session()->forget('paypal_booking_id');

                    return $booking;
                } else {
                    Log::warning('Booking not found for ID: ' . $bookingId);
                }
            } else {
                Log::warning('Booking ID not found in PayPal response or session.');
            }
        }

        return null;
    }
}
