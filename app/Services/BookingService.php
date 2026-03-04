<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\BookingDTO;
use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\PaymentServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingService
{
    private BookingRepositoryInterface $bookingRepository;
    private PaymentServiceInterface $paymentService;

    public function __construct(
        BookingRepositoryInterface $bookingRepository,
        PaymentServiceInterface $paymentService
    ) {
        $this->bookingRepository = $bookingRepository;
        $this->paymentService = $paymentService;
    }

    /**
     * @param BookingDTO $dto
     * @param float $pricePerNight
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function processBooking(BookingDTO $dto, float $pricePerNight, Request $request)
    {
        $checkIn = Carbon::parse($dto->check_in);
        $checkOut = Carbon::parse($dto->check_out);

        if ($checkOut->lte($checkIn)) {
            throw new \Exception('Check-out date must be after check-in date.');
        }

        $duration = $checkIn->diffInDays($checkOut);
        $totalPrice = $duration * $pricePerNight;

        $booking = $this->bookingRepository->create([
            'hotel_id'      => $dto->hotel_id,
            'room_id'       => $dto->room_id,
            'user_id'       => $dto->user_id,
            'name'          => $dto->name,
            'email'         => $dto->email,
            'phone'         => $dto->phone,
            'check_in'      => $dto->check_in,
            'check_out'     => $dto->check_out,
            'duration_days' => $duration,
            'price'         => $totalPrice,
            'status'        => 'pending',
            'payment_method'=> $dto->payment_method,
        ]);

        if ($dto->payment_method === 'cash') {
            return redirect()->route('payment.success', ['booking' => $booking->id])
                ->with('success', 'Room booked successfully. Please pay upon arrival.');
        }

        $request->merge([
            'amount' => $totalPrice,
            'description' => 'Booking for Room ID: ' . $dto->room_id . ' (Booking ID: ' . $booking->id . ')',
            'booking_id' => $booking->id,
        ]);

        return $this->paymentService->createPayment($request);
    }
}
