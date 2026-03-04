<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Number of Users', User::count())
                ->description('Total registered users')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success'),

            Stat::make('Number of Rooms', Room::count())
                ->description('Total available rooms')
                ->descriptionIcon('heroicon-o-home')
                ->color('primary'),

            Stat::make('Number of Bookings', Booking::count())
                ->description('Total confirmed bookings')
                ->descriptionIcon('heroicon-o-calendar-days')
                ->color('info'),
            Stat::make('Number of Hotel', Hotel::count())
                ->description('Total Avilable Hotels')
                ->color('warning'),
        ];
    }
}
