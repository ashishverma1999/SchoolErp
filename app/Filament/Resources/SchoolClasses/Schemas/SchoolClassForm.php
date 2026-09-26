<?php

namespace App\Filament\Resources\SchoolClasses\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SchoolClassForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Class / Grade Details')
                    ->description('Define academic classes and grade levels')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Class / Grade Name')
                            ->placeholder('e.g. Class 10, Grade 5, Nursery')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('numeric_grade')
                            ->label('Numeric Grade Level')
                            ->placeholder('e.g. 10, 5, 0 (for kindergarten)')
                            ->numeric()
                            ->required()
                            ->helperText('Used for sorting and academic progressions'),
                        Textarea::make('description')
                            ->label('Description / Syllabus Notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
