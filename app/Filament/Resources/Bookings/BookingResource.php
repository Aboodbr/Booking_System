<?php

namespace App\Filament\Resources\Bookings;

use App\Filament\Resources\Bookings\Pages\CreateBooking;
use App\Filament\Resources\Bookings\Pages\EditBooking;
use App\Filament\Resources\Bookings\Pages\ListBookings;
use App\Filament\Resources\Bookings\Schemas\BookingForm;
use App\Filament\Resources\Bookings\Tables\BookingsTable;
use App\Models\Booking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table; //

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar-days'; // أيقونة للقائمة الجانبية

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BookingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        // هنا نقوم باستدعاء الإعدادات من الملف الخارجي ليبقى الكود نظيفاً
        return BookingsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBookings::route('/'),
            'create' => CreateBooking::route('/create'),
            'edit' => EditBooking::route('/{record}/edit'),
        ];
    }
}
