<?php

namespace App\Filament\Resources\Hotels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class HotelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('img')
                ->label('Image')
                ->directory('hotels/images') // يخزن داخل public/hotels/images
                ->disk('public_uploads')
                ->image()
                ->required(),

                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('location')
                    ->required(),
                
            ]);
    }
}
