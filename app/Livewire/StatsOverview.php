<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;

class StatsOverview extends BaseWidget
{
    // تحديث الإحصائيات كل 60 ثانية لحماية الأداء
    protected ?string $pollingInterval = '60s';

    protected function getStats(): array
    {
        // استخدام الكاش لمدة 5 دقائق (300 ثانية) لتخفيف الضغط على الداتابيز
        $totalRevenue = Cache::remember('stats.total_revenue', 300, function () {
            // نجمع الأرباح للحجوزات المؤكدة فقط
            return Booking::where('status', 'confirmed')->sum('price');
        });

        $totalBookings = Cache::remember('stats.total_bookings', 300, function () {
            return Booking::count();
        });

        $totalRooms = Cache::remember('stats.total_rooms', 300, function () {
            return Room::count();
        });

        return [
            Stat::make('Total Revenue', '$'.number_format($totalRevenue, 2))
                ->description('From confirmed bookings')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]), // رسم بياني مصغر للزينة

            Stat::make('Total Bookings', $totalBookings)
                ->description('All time bookings')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('primary')
                ->chart([3, 5, 4, 8, 5, 9, 10]),

            Stat::make('Total Rooms', $totalRooms)
                ->description('Across all hotels')
                ->descriptionIcon('heroicon-m-home-modern')
                ->color('warning'),
        ];
    }
}
