<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\Hotel;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('hotel_id')
                    ->label('Hotel')
                    ->options(Hotel::pluck('name', 'id')) 
                    ->searchable()
                    ->required(),

                TextInput::make('name')
                    ->required(),

                FileUpload::make('img')
                    ->label('Image')
                    ->directory('Rooms/images')
                    ->disk('public_uploads')
                    ->image()
                    ->required(),

                TextInput::make('num_person')
                    ->required(),

                TextInput::make('size')
                    ->required(),

                TextInput::make('view')
                    ->required(),

                TextInput::make('num_bed')
                    ->required(),

                TextInput::make('price')
                    ->required(),
            ]);
    }
}
