<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hotel.name')
                    ->label('Hotel')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('room.name')
                    ->label('Room')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Customer')
                    ->description(fn ($record) => $record->email) // يعرض الإيميل تحت الاسم لشكل أرتب
                    ->sortable(),

                TextColumn::make('check_in')
                    ->date('M d, Y') // تنسيق التاريخ بشكل أوضح
                    ->sortable(),

                TextColumn::make('duration_days')
                    ->label('Days')
                    ->badge() // وضع عدد الأيام داخل بادج
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('price')
                    ->money('USD')
                    ->sortable()
                    ->weight('bold'), // جعل السعر بخط عريض

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'confirmed',
                        'warning' => 'pending',
                        'danger' => 'cancelled',
                    ]),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Booked At')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // يمكنك إضافة فلاتر هنا لاحقاً
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
