<?php

namespace App\Filament\Resources\Sections\Schemas;

use App\Models\SchoolClass;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Section Information')
                    ->description('Assign section divisions, room assignments, and seat capacities')
                    ->columns(2)
                    ->schema([
                        Select::make('class_id')
                            ->label('Class')
                            ->options(SchoolClass::orderBy('numeric_grade')->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('name')
                            ->label('Section Name')
                            ->placeholder('e.g. A, B, Science, Commerce')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('room_number')
                            ->label('Room Number / Hall')
                            ->placeholder('e.g. Room 102, Block B')
                            ->maxLength(50),
                        TextInput::make('capacity')
                            ->label('Student Capacity')
                            ->numeric()
                            ->default(40)
                            ->required(),
                    ]),
            ]);
    }
}
