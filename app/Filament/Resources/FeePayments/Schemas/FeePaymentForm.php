<?php

namespace App\Filament\Resources\FeePayments\Schemas;

use App\Models\FeeInvoice;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeePaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Fee Payment Receipt')
                    ->description('Record transaction receipt against student invoice')
                    ->columns(3)
                    ->schema([
                        Select::make('fee_invoice_id')
                            ->label('Invoice / Student')
                            ->options(function () {
                                return FeeInvoice::with('student')->get()->mapWithKeys(function ($inv) {
                                    $studentName = $inv->student?->full_name ?? 'N/A';
                                    return [$inv->id => "#{$inv->invoice_number} - {$studentName} (Due: ₹" . number_format($inv->due_amount, 2) . ")"];
                                });
                            })
                            ->searchable()
                            ->required(),
                        TextInput::make('amount_paid')
                            ->label('Amount Received (INR)')
                            ->numeric()
                            ->prefix('₹')
                            ->required(),
                        Select::make('payment_mode')
                            ->label('Payment Mode')
                            ->options([
                                'cash' => 'Cash',
                                'upi' => 'UPI / QR Code',
                                'card' => 'Debit / Credit Card',
                                'bank' => 'Bank Transfer / NEFT',
                                'cheque' => 'Cheque',
                            ])
                            ->default('cash')
                            ->required(),
                        TextInput::make('transaction_id')
                            ->label('Transaction ID / UTR / Cheque No.')
                            ->placeholder('e.g. UTR-987654321')
                            ->maxLength(100),
                        DatePicker::make('payment_date')
                            ->label('Payment Date')
                            ->default(now())
                            ->required(),
                        Textarea::make('notes')
                            ->label('Payment Remarks / Ledger Notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
