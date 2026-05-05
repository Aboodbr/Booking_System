@extends('layouts.app')

@section('content')
<style>
    .room-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }
    .room-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    .room-img-container {
        position: relative;
        overflow: hidden;
    }
    .room-img-container img {
        transition: transform 0.5s ease;
    }
    .room-card:hover .room-img-container img {
        transform: scale(1.1);
    }
    .price-tag {
        background: #fd7792;
        color: white;
        padding: 5px 15px;
        border-radius: 50px;
        font-weight: bold;
    }
    .room-features span {
        background: #f8f9fa;
        padding: 4px 10px;
        border-radius: 5px;
        font-size: 0.85rem;
        margin: 2px;
        display: inline-block;
        color: #555;
    }
    .btn-view-details {
        background: transparent;
        border: 2px solid #fd7792;
        color: #fd7792;
        font-weight: 600;
        transition: 0.3s;
        border-radius: 8px;
    }
    .btn-view-details:hover {
        background: #fd7792;
        color: white;
    }
</style>

<section class="hero-wrap hero-wrap-2 d-flex align-items-center" 
    style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/image_2.jpg') }}') center/cover no-repeat; height: 50vh;">
  <div class="container text-center text-white">
    <div class="row justify-content-center">
      <div class="col-md-9">
        <p class="breadcrumbs mb-2" style="text-transform: uppercase; letter-spacing: 2px; font-size: 13px;">
          <a href="{{ route('home.index') }}" class="text-white opacity-75">Home</a> 
          <span class="mx-2">/</span> 
          <span class="text-white">Rooms</span>
        </p>
        <h1 class="display-4 fw-bold">{{ $hotel->name ?? 'Damas' }} Rooms</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light py-5">
  <div class="container">
    <div class="row">
      @foreach ($rooms as $room)
        <div class="col-md-6 col-lg-4 mb-5">
          <div class="card room-card h-100 border-0 shadow-sm">
            <div class="room-img-container">
              <img src="{{ asset($room->img) }}" class="card-img-top" alt="{{ $room->name }}" style="height: 250px; object-fit: cover;">
            </div>
            
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="text-warning small">
                  @for($i=0; $i<5; $i++)
                    <i class="fa fa-star"></i>
                  @endfor
                </div>
                <span class="price-tag">${{ $room->price }}<small>/night</small></span>
              </div>

              <h4 class="card-title h5 mb-3">
                <a href="{{ route('home.one_room',$room->id) }}" class="text-dark fw-bold text-decoration-none">
                  {{ $room->name }}
                </a>
              </h4>

              <div class="room-features mb-4">
                <span><i class="fa fa-users me-1 text-muted"></i> {{ $room->max_persons }} Persons</span>
                <span><i class="fa fa-expand me-1 text-muted"></i> {{ $room->size }} m²</span>
                <span><i class="fa fa-eye me-1 text-muted"></i> {{ $room->view }}</span>
                <span><i class="fa fa-bed me-1 text-muted"></i> {{ $room->beds }}</span>
              </div>

              <div class="d-grid">
                <a href="{{ route('home.one_room',$room->id) }}" class="btn btn-view-details py-2">
                  View Room Details <i class="fa fa-long-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection