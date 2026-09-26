<?php

namespace App\Filament\Resources\FeeStructures\Schemas;

use App\Models\SchoolClass;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeeStructureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Fee Structure Head')
                    ->description('Set up fees, tuition, and term frequency per grade class')
                    ->columns(2)
                    ->schema([
                        Select::make('class_id')
                            ->label('Class / Grade Level')
                            ->options(SchoolClass::orderBy('numeric_grade')->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('fee_head')
                            ->label('Fee Head / Type')
                            ->options([
                                'tuition' => 'Tuition Fee',
                                'transport' => 'Transport / Bus Fee',
                                'lab' => 'Computer / Science Lab Fee',
                                'library' => 'Library Fee',
                                'admission' => 'Admission / Registration Fee',
                                'examination' => 'Examination Fee',
                                'other' => 'Other / Miscellaneous Fee',
                            ])
                            ->required(),
                        TextInput::make('amount')
                            ->label('Fee Amount (INR)')
                            ->numeric()
                            ->prefix('₹')
                            ->required(),
                        Select::make('frequency')
                            ->label('Billing Frequency')
                            ->options([
                                'monthly' => 'Monthly',
                                'quarterly' => 'Quarterly',
                                'annually' => 'Annually',
                            ])
                            ->default('monthly')
                            ->required(),
                    ]),
            ]);
    }
}
