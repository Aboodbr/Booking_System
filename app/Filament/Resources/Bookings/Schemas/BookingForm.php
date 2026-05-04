<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('hotel_id')
                    ->relationship('hotel', 'name')
                    ->required(),
                Select::make('room_id')
                    ->relationship('room', 'name')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                DatePicker::make('check_in')
                    ->required(),
                DatePicker::make('check_out')
                    ->required(),
                TextInput::make('duration_days')
                    ->required()
                    ->numeric(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('status')
                    ->required(),
                TextInput::make('payment_method')
                    ->required()
                    ->default('cash'),
            ]);
    }
}
