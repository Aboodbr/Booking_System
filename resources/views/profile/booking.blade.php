@extends('layouts.app')

@section('content')
<div class="container my-5">

    @if($user_bookings->isEmpty())

        <div class="alert alert-warning text-center">
            You have no bookings yet.
        </div>

    @else

        @foreach($user_bookings as $booking)

        <div class="card shadow-lg border-0 rounded-3 mb-5">

            <!-- Header -->
            <div class="card-header bg-[#fd7792] text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="fas fa-calendar-check me-2"></i>
                    My Booking Details
                </h4>
            </div>

            <!-- Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <tbody>

                            <tr>
                                <th class="bg-gray-100 text-end w-25">
                                    <i class="fas fa-user me-2 text-[#fd7792]"></i>Name
                                </th>
                                <td>{{ $booking->name }}</td>
                            </tr>

                            <tr>
                                <th class="bg-gray-100 text-end">
                                    <i class="fas fa-envelope me-2 text-[#fd7792]"></i>Email
                                </th>
                                <td>{{ $booking->email }}</td>
                            </tr>

                            <tr>
                                <th class="bg-gray-100 text-end">
                                    <i class="fas fa-phone me-2 text-[#fd7792]"></i>Phone
                                </th>
                                <td>{{ $booking->phone }}</td>
                            </tr>

                            <tr>
                                <th class="bg-gray-100 text-end">
                                    <i class="fas fa-sign-in-alt me-2 text-[#fd7792]"></i>Check In
                                </th>
                                <td>{{ $booking->check_in }}</td>
                            </tr>

                            <tr>
                                <th class="bg-gray-100 text-end">
                                    <i class="fas fa-sign-out-alt me-2 text-[#fd7792]"></i>Check Out
                                </th>
                                <td>{{ $booking->check_out }}</td>
                            </tr>

                            <tr>
                                <th class="bg-gray-100 text-end">
                                    <i class="fas fa-clock me-2 text-[#fd7792]"></i>Duration
                                </th>
                                <td>{{ $booking->duration_days }} days</td>
                            </tr>

                            <tr>
                                <th class="bg-gray-100 text-end">
                                    <i class="fas fa-dollar-sign me-2 text-[#fd7792]"></i>Price
                                </th>
                                <td>
                                    <strong class="text-[#fd7792]">
                                        ${{ number_format($booking->price, 2) }}
                                    </strong>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-gray-100 text-end">
                                    <i class="fas fa-info-circle me-2 text-[#fd7792]"></i>Status
                                </th>

                                <td>
                                    @if($booking->status === 'confirmed')

                                        <span class="badge bg-success text-white">
                                            {{ ucfirst($booking->status) }}
                                        </span>

                                    @elseif($booking->status === 'pending')

                                        <span class="badge bg-warning text-dark">
                                            {{ ucfirst($booking->status) }}
                                        </span>

                                    @else

                                        <span class="badge bg-danger text-white">
                                            {{ ucfirst($booking->status) }}
                                        </span>

                                    @endif
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        @endforeach

    @endif

</div>
@endsection