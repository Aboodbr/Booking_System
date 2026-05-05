@extends('layouts.app')

@section('content')
<style>
    /* تحسينات بصرية عامة */
    .hero-wrap .overlay {
        background: rgba(0, 0, 0, 0.4); /* تخفيف التعتيم قليلاً لتوضيح الصورة */
    }

    .services-wrap {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
        background: #fff;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .services-wrap:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }

    .services-wrap .img {
        transition: transform 0.6s ease;
    }

    .services-wrap:hover .img {
        transform: scale(1.08);
    }

    .btn-primary-custom {
        background: #fd7792;
        border: 1px solid #fd7792;
        color: #fff;
        padding: 10px 25px;
        border-radius: 5px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-primary-custom:hover {
        background: #e0607a;
        color: #fff;
        box-shadow: 0 4px 10px rgba(253, 119, 146, 0.3);
    }

    .icon-box {
        width: 60px;
        height: 60px;
        background: #fff0f2;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .services-2:hover .icon-box {
        background: #fd7792;
    }

    .services-2:hover .icon-box span {
        color: #fff;
    }

    .icon-box span {
        color: #fd7792;
        font-size: 26px;
    }

    /* إصلاح التداخل الظاهر في الصورة */
    .main-section-hotels {
        padding-top: 5rem; /* استبدال margin-top السالب بـ padding موجب لمنع حجب النص */
        position: relative;
    }
</style>

{{-- Hero Section --}}
<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('assets/images/image_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading" style="color: #fd7792; letter-spacing: 4px; text-transform: uppercase; font-weight: 600;">Welcome To Damas Hotel</h2>
                <h1 class="mb-4" style="font-weight: 800; line-height: 1.1; font-size: 4rem;">Damas an apartment for your vacation</h1>
                <p>
                    <a href="#" class="btn btn-primary-custom px-4 py-3">Explore More</a> 
                    <a href="#" class="btn btn-white btn-outline-white px-4 py-3 ml-md-2" style="border-radius: 5px; font-weight: 600;">Contact us</a>
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Hotels Section - مع إصلاح الـ Padding --}}
<section class="ftco-section main-section-hotels bg-white">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading" style="color: #fd7792;">Our Locations</span>
                <h2 class="mb-4">Explore Our Luxury Hotels</h2>
            </div>
        </div>
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-md-4 d-flex ftco-animate mb-4">
                    <div class="services-wrap d-block text-center shadow-sm rounded w-100">
                        <div class="img" style="background-image: url('{{ asset($hotel->img) }}'); height:260px; background-size:cover; background-position:center;"></div>
                        <div class="media-body py-4 px-4">
                            <h3 class="heading h5" style="font-weight: 700; color: #333;">{{ $hotel->name }}</h3>
                            <p class="text-muted small mb-3">{{ Str::limit($hotel->description, 90) }}</p>
                            <p class="mb-4" style="color: #666;"><i class="fa fa-map-marker mr-2" style="color: #fd7792;"></i> {{ $hotel->location }}</p>
                            <p><a href="{{ route('hotel.rooms', $hotel->id) }}" class="btn btn-primary-custom w-100">Browse Rooms</a></p>
                        </div>
                    </div>      
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Apartment Rooms Section --}}
<section class="ftco-section bg-light">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading" style="color: #fd7792;">Featured Rooms</span>
                <h2 class="mb-4">Our Luxury Apartments</h2>
            </div>
        </div>
        <div class="row no-gutters">
            @foreach ($rooms as $room)
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex ftco-animate">
                        <div class="img w-100" style="background-image: url('{{ asset($room->img) }}'); height: 380px;"></div>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center w-100">
                                <p class="star mb-0" style="color: #ffba00; font-size: 14px;">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </p>
                                <p class="mb-2"><span class="price mr-1" style="color: #fd7792; font-weight: 800; font-size: 28px;">${{ $room->price }}</span> <span class="per text-muted">/ night</span></p>
                                <h3 class="mb-3 h4"><a href="{{ route('home.rooms') }}" class="text-dark fw-bold">{{ $room->name }}</a></h3>
                                <ul class="list-accomodation list-unstyled mb-4 text-muted small">
                                    <li class="mb-1"><i class="fa fa-users mr-2"></i> {{ $room->num_person }} Persons</li>
                                    <li class="mb-1"><i class="fa fa-expand mr-2"></i> {{ $room->size }} m² Area</li>
                                    <li><i class="fa fa-bed mr-2"></i> {{ $room->num_bed }} Luxury Bed</li>
                                </ul>
                                <p><a href="{{ route('home.one_room', $room->id) }}" class="btn btn-primary-custom px-4">View Details</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Offers Section --}}
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters align-items-center">
            <div class="col-md-6 wrap-about ftco-animate pr-md-5 mb-4 mb-md-0">
                <div class="img img-2 shadow-lg" style="background-image: url('{{ asset('assets/images/image_2.jpg') }}'); height: 450px; border-radius: 15px;"></div>
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section">
                    <div class="pl-md-5">
                        <span class="subheading" style="color: #fd7792;">Premium Experience</span>
                        <h2 class="mb-4">The Most Recommended Rental</h2>
                        <p class="text-muted mb-5">Enjoy a world-class stay with personalized services designed for your comfort and relaxation in every detail.</p>
                    </div>
                </div>
                <div class="pl-md-5">
                    <div class="row">
                        <div class="col-lg-6 services-2 d-flex mb-4">
                            <div class="icon-box"><span class="flaticon-diet"></span></div>
                            <div class="media-body pl-3">
                                <h3 class="heading h6 fw-bold">Organic Breakfast</h3>
                                <p class="small text-muted">Start your day with healthy options.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 services-2 d-flex mb-4">
                            <div class="icon-box"><span class="flaticon-workout"></span></div>
                            <div class="media-body pl-3">
                                <h3 class="heading h6 fw-bold">Fitness Center</h3>
                                <p class="small text-muted">Keep your routine during vacation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection