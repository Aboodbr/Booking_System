<?php

declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PaymentServiceInterface
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPayment(Request $request);

    /**
     * @param string $token
     * @return array
     */
    public function capturePayment(string $token): array;

    /**
     * @param array $response
     * @return \App\Models\Booking|null
     */
    public function processSuccessfulPayment(array $response): ?\App\Models\Booking;
}
