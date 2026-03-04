<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\HotelRepositoryInterface;
use App\Repositories\HotelRepository;
use App\Interfaces\RoomRepositoryInterface;
use App\Repositories\RoomRepository;
use App\Interfaces\BookingRepositoryInterface;
use App\Repositories\BookingRepository;
use App\Interfaces\PaymentServiceInterface;
use App\Services\PaypalService;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(HotelRepositoryInterface::class, HotelRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(PaymentServiceInterface::class, PaypalService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
