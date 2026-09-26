<?php

namespace App\Filament\Resources\FeePayments\Tables;

use App\Models\FeePayment;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FeePaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('payment_date')
                    ->label('Receipt Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('invoice.invoice_number')
                    ->label('Invoice #')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('invoice.student.first_name')
                    ->label('Student Name')
                    ->formatStateUsing(fn (FeePayment $record): string => $record->invoice?->student?->full_name ?? 'N/A')
                    ->searchable(),
                TextColumn::make('amount_paid')
                    ->label('Amount Paid')
                    ->money('INR')
                    ->weight('bold')
                    ->color('success')
                    ->sortable(),
                TextColumn::make('payment_mode')
                    ->label('Mode')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => strtoupper($state))
                    ->color(fn (string $state): string => match ($state) {
                        'cash' => 'gray',
                        'upi' => 'success',
                        'card' => 'primary',
                        'bank' => 'info',
                        default => 'warning',
                    })
                    ->sortable(),
                TextColumn::make('transaction_id')
                    ->label('Txn ID')
                    ->searchable()
                    ->copyable()
                    ->placeholder('-'),
                TextColumn::make('notes')
                    ->label('Notes')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('payment_mode')
                    ->options([
                        'cash' => 'Cash',
                        'upi' => 'UPI',
                        'card' => 'Card',
                        'bank' => 'Bank',
                        'cheque' => 'Cheque',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('payment_date', 'desc');
    }
}
