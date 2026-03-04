
@extends('layouts.app')
@section('content')

{{-- Hero Section --}}
<section class="hero-wrap hero-wrap-2 d-flex align-items-center" 
    style="background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('{{ asset('assets/images/image_2.jpg') }}') center/cover no-repeat; height: 60vh;">
  <div class="container text-center text-white">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-9 ftco-animate">
        <p class="breadcrumbs mb-2">
          <span class="mr-2">
            <a href="{{ route('home.index') }}" class="text-white">Home <i class="fa fa-chevron-right"></i></a>
          </span> 
          <span>Rooms <i class="fa fa-chevron-right"></i></span>
        </p>
        <h1 class="mb-0 bread display-5 fw-bold">
          {{ $hotel->name ?? 'Hotel' }} - Rooms
        </h1>
      </div>
    </div>
  </div>
</section>

{{-- Rooms Section --}}
<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      @foreach ($rooms as $room)
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card room-wrap h-100 shadow-sm border-0">
            <div class="card-img-top" 
                 style="background: url('{{ asset($room->img) }}') center/cover no-repeat; height: 220px;">
            </div>
            <div class="card-body text-center">
              <p class="star mb-2 text-warning">
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
              </p>
              <h5 class="card-title mb-3">
                <a href="{{ route('home.one_room',$room->id) }}" class="text-dark text-decoration-none">
                  {{ $room->name }}
                </a>
              </h5>
              <p class="mb-2">
                <span class="price h5 text-success">${{ $room->price }}</span> 
                <span class="per text-muted">/ per night</span>
              </p>
              <ul class="list-unstyled small text-muted mb-3">
                <li><strong>Max:</strong> {{ $room->max_persons }} Persons</li>
                <li><strong>Size:</strong> {{ $room->size }} m²</li>
                <li><strong>View:</strong> {{ $room->view }}</li>
                <li><strong>Bed:</strong> {{ $room->beds }}</li>
              </ul>
              <a href="{{ route('home.one_room',$room->id) }}" class="btn btn-primary btn-sm">
                View Room Details <span class="icon-long-arrow-right"></span>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
```
