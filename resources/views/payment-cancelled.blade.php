@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg border-0 rounded-4 p-5 animate__animated animate__fadeIn" style="max-width: 500px; background: linear-gradient(135deg, #fffbf2, #fef9e7);">
        <!-- Icon with Animation -->
        <div class="mb-4 text-center">
            <i class="bi bi-x-circle-fill text-warning animate__animated animate__zoomIn" style="font-size: 5rem;"></i>
        </div>

        <!-- Title and Message -->
        <h1 class="fw-bold text-warning mb-3 animate__animated animate__fadeInUp animate__delay-1s">Payment Cancelled</h1>
        <p class="text-muted mb-4 animate__animated animate__fadeInUp animate__delay-1s">You have cancelled the payment process. No charges were made.</p>

        <!-- Buttons -->
        <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-2s">
            <a href="{{ route('home.index') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-medium">Back to Home</a>
            <a href="{{ route('home.rooms') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-medium">Try Again</a>
        </div>
    </div>
</div>

<!-- Include Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection