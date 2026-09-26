<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Examination Term Details')
                    ->description('Set exam schedule, academic term, and year')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Examination Name / Title')
                            ->placeholder('e.g. Mid-Term Assessment 2026, Annual Final Exam')
                            ->required()
                            ->maxLength(150),
                        Select::make('term')
                            ->label('Academic Term')
                            ->options([
                                'Term 1' => 'Term 1 / First Terminal',
                                'Term 2' => 'Term 2 / Half-Yearly',
                                'Final' => 'Final / Annual Examination',
                                'Unit Test' => 'Unit Test / Monthly Assessment',
                            ])
                            ->required(),
                        TextInput::make('academic_year')
                            ->label('Academic Year')
                            ->default(date('Y') . '-' . (date('Y') + 1))
                            ->placeholder('e.g. 2025-2026')
                            ->required()
                            ->maxLength(20),
                        DatePicker::make('start_date')
                            ->label('Commencement Date')
                            ->default(now())
                            ->required(),
                        DatePicker::make('end_date')
                            ->label('Conclusion Date')
                            ->afterOrEqual('start_date'),
                    ]),
            ]);
    }
}
