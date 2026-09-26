<?php

namespace App\Filament\Resources\FeeInvoices\Schemas;

use App\Models\FeeStructure;
use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeeInvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Fee Invoice & Billing Details')
                    ->description('Issue student fee demands, track due dates, and monitor dues')
                    ->columns(3)
                    ->schema([
                        TextInput::make('invoice_number')
                            ->label('Invoice Number')
                            ->default(fn () => 'INV-' . date('Ymd') . '-' . str_pad((string) rand(1, 9999), 4, '0', STR_PAD_LEFT))
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50),
                        Select::make('student_id')
                            ->label('Student')
                            ->options(function () {
                                return Student::with('schoolClass')->get()->mapWithKeys(function ($student) {
                                    $className = $student->schoolClass?->name ?? 'No Class';
                                    return [$student->id => "[{$student->admission_number}] {$student->full_name} ({$className})"];
                                });
                            })
                            ->searchable()
                            ->required(),
                        Select::make('fee_structure_id')
                            ->label('Applicable Fee Head')
                            ->options(function () {
                                return FeeStructure::with('schoolClass')->get()->mapWithKeys(function ($fee) {
                                    $className = $fee->schoolClass?->name ?? 'General';
                                    return [$fee->id => "{$className} - " . ucfirst($fee->fee_head) . " (₹" . number_format($fee->amount, 2) . ")"];
                                });
                            })
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(function ($state, Set $set) {
                                if ($state) {
                                    $fee = FeeStructure::find($state);
                                    if ($fee) {
                                        $set('amount', $fee->amount);
                                        $set('title', ucfirst($fee->fee_head) . ' Fee');
                                    }
                                }
                            }),
                        TextInput::make('title')
                            ->label('Invoice Title / Description')
                            ->placeholder('e.g. Term 1 Tuition Fee - April 2026')
                            ->maxLength(150)
                            ->columnSpan(2),
                        DatePicker::make('due_date')
                            ->label('Payment Due Date')
                            ->default(now()->addDays(15))
                            ->required(),
                        TextInput::make('amount')
                            ->label('Total Bill Amount (INR)')
                            ->numeric()
                            ->prefix('₹')
                            ->required(),
                        TextInput::make('paid_amount')
                            ->label('Amount Received (INR)')
                            ->numeric()
                            ->prefix('₹')
                            ->default(0.00)
                            ->required(),
                        Select::make('status')
                            ->label('Payment Status')
                            ->options([
                                'paid' => 'Paid in Full',
                                'partial' => 'Partially Paid',
                                'unpaid' => 'Unpaid / Due',
                            ])
                            ->default('unpaid')
                            ->required(),
                    ]),
            ]);
    }
}
