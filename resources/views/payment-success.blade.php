@extends('layouts.app')
@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg border-0 rounded-4 p-5 animate__animated animate__fadeIn" style="max-width: 500px; background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
        <!-- Icon with Animation -->
        <div class="mb-4 text-center">
            <i class="bi bi-check-circle-fill text-success animate__animated animate__bounceIn" style="font-size: 5rem;"></i>
        </div>

        <!-- Title and Message -->
        <h1 class="fw-bold text-success mb-3 animate__animated animate__fadeInUp animate__delay-1s">Payment Successful 🎉</h1>
        <p class="text-muted mb-4 animate__animated animate__fadeInUp animate__delay-1s">Thank you for your payment! Your booking has been confirmed.</p>

        <!-- Booking Details -->
        <div class="card bg-light p-4 rounded-3 mb-4 animate__animated animate__fadeInUp animate__delay-2s">
            <h5 class="fw-semibold text-dark">Booking Details</h5>
            <hr class="my-2">
            <div class="d-flex justify-content-between">
                <span class="fw-medium">Booking ID:</span>
                <span>{{ $booking->id }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="fw-medium">Amount Paid:</span>
                <span>${{ number_format($booking->price, 2) }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="fw-medium">Status:</span>
                <span class="text-capitalize">{{ $booking->status }}</span>
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-3s">
            <a href="{{ route('home.index') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-medium">Back to Home</a>
        </div>
    </div>
</div>

<!-- Include Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection