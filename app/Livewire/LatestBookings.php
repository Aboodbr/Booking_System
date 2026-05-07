<?php

namespace App\Livewire;

use App\Models\Booking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestBookings extends BaseWidget
{
    protected int|string|array $columnSpan = 'full'; // يأخذ عرض الشاشة كاملاً

    protected static ?string $heading = 'Latest Bookings';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                // 🚀 تحسين الأداء: استخدام with لمنع N+1 وجلب آخر 5 حجوزات فقط
                Booking::query()->with(['user', 'hotel', 'room'])->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Guest Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hotel.name')
                    ->label('Hotel')
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('check_in')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'danger' => 'cancelled',
                        'warning' => 'pending',
                        'success' => 'confirmed',
                    ]),
            ])
            ->paginated(false); // إخفاء ترقيم الصفحات لأنه يعرض آخر 5 فقط
    }
}
