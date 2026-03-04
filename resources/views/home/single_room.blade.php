@extends('layouts.app')
@section('content')

<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset($room->img) }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Welcome to {{ $room->hotel->name ?? 'Our Hotel' }}</h2>
                <h1 class="mb-4">{{ $room->name }}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4">
                <form action="{{ route('book_room') }}" method="POST" class="appointment-form" style="margin-top: -568px;" dir="ltr">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <input type="hidden" name="hotel_id" value="{{ $room->hotel_id }}">
                    <input type="hidden" name="price_per_night" value="{{ $room->price }}">

                    <h3 class="mb-3">Book This Room</h3>

                    {{-- Alerts --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    {{-- Form Inputs --}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="check_in" value="{{ old('check_in') }}">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="check_out" value="{{ old('check_out') }}">
                    </div>

                    <div class="form-group">
                        <p>Total Amount: <span id="total-price">0.00</span> {{ config('paypal.currency', 'USD') }}</p>
                    </div>

                    @if (!Auth::check())
                        <p class="text-danger">You must login before booking the room.</p>
                    @else
                        {{-- زر الدفع مع PayPal --}}
                        <button type="submit" name="payment_method" value="paypal" class="btn btn-primary py-3 px-4 w-100 mb-2">
                            <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png" 
                                 alt="PayPal" style="vertical-align: middle; margin-right: 10px;">
                            Book & Pay with PayPal
                        </button>

                        {{-- زر الدفع عند الوصول (كاش) --}}
                        <button type="submit" name="payment_method" value="cash" class="btn btn-success py-3 px-4 w-100">
                            Book Now & Pay at Hotel
                        </button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkInInput = document.querySelector('input[name="check_in"]');
        const checkOutInput = document.querySelector('input[name="check_out"]');
        const pricePerNight = parseFloat(document.querySelector('input[name="price_per_night"]').value);
        const totalPriceElement = document.getElementById('total-price');

        function calculateTotalPrice() {
            const checkIn = new Date(checkInInput.value);
            const checkOut = new Date(checkOutInput.value);
            if (checkIn && checkOut && checkOut > checkIn) {
                const duration = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
                const totalPrice = (duration * pricePerNight).toFixed(2);
                totalPriceElement.textContent = totalPrice;
            } else {
                totalPriceElement.textContent = '0.00';
            }
        }

        checkInInput.addEventListener('change', calculateTotalPrice);
        checkOutInput.addEventListener('change', calculateTotalPrice);
    });
</script>

@endsection
