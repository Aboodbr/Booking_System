<?php

namespace App\Filament\Resources\Hotels;

use App\Filament\Resources\Hotels\Pages\CreateHotel;
use App\Filament\Resources\Hotels\Pages\EditHotel;
use App\Filament\Resources\Hotels\Pages\ListHotels;
use App\Filament\Resources\Hotels\Schemas\HotelForm;
use App\Filament\Resources\Hotels\Tables\HotelsTable;
use App\Models\Hotel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return HotelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HotelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHotels::route('/'),
            'create' => CreateHotel::route('/create'),
            'edit' => EditHotel::route('/{record}/edit'),
        ];
    }

    // 🚀 دالة تحسين الأداء (Eager Loading)
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with([
            // الكود الحالي لا يحتوي على علاقات في الجدول، ولكن عندما تضيف
            // علاقة (مثل city أو category)، ضع اسمها هنا لمنع مشكلة N+1 Queries
            // 'city',
        ]);
    }
}
