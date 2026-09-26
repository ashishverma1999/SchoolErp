<?php

namespace App\Filament\Resources\FeeInvoices\Tables;

use App\Models\FeeInvoice;
use App\Models\FeePayment;
use App\Models\SchoolClass;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FeeInvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_number')
                    ->label('Invoice #')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),
                TextColumn::make('student.first_name')
                    ->label('Student Name')
                    ->formatStateUsing(fn (FeeInvoice $record): string => $record->student?->full_name ?? 'N/A')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('student', function ($q) use ($search) {
                            $q->where('first_name', 'like', "%{$search}%")
                              ->orWhere('last_name', 'like', "%{$search}%")
                              ->orWhere('admission_number', 'like', "%{$search}%");
                        });
                    }),
                TextColumn::make('student.schoolClass.name')
                    ->label('Class')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Fee Description')
                    ->limit(25)
                    ->toggleable(),
                TextColumn::make('amount')
                    ->label('Total Bill')
                    ->money('INR')
                    ->sortable(),
                TextColumn::make('paid_amount')
                    ->label('Paid')
                    ->money('INR')
                    ->sortable(),
                TextColumn::make('due_balance')
                    ->label('Due Balance')
                    ->state(fn (FeeInvoice $record): float => $record->due_amount)
                    ->money('INR')
                    ->weight('bold')
                    ->color(fn (float $state): string => $state > 0 ? 'danger' : 'success'),
                TextColumn::make('due_date')
                    ->label('Due Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'partial' => 'warning',
                        'unpaid' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'paid' => 'Paid in Full',
                        'partial' => 'Partially Paid',
                        'unpaid' => 'Unpaid / Due',
                    ]),
                SelectFilter::make('class_id')
                    ->label('Filter by Class')
                    ->options(SchoolClass::pluck('name', 'id'))
                    ->query(function (Builder $query, array $data): Builder {
                        if (empty($data['value'])) {
                            return $query;
                        }
                        return $query->whereHas('student', fn ($q) => $q->where('class_id', $data['value']));
                    }),
                Filter::make('overdue')
                    ->label('Overdue Unpaid Invoices')
                    ->query(fn (Builder $query): Builder => $query->where('status', '!=', 'paid')->where('due_date', '<', today())),
            ])
            ->recordActions([
                Action::make('collect_payment')
                    ->label('Collect')
                    ->icon('heroicon-o-currency-rupee')
                    ->color('success')
                    ->visible(fn (FeeInvoice $record): bool => $record->status !== 'paid')
                    ->form([
                        TextInput::make('amount_paid')
                            ->label('Amount to Pay (INR)')
                            ->numeric()
                            ->prefix('₹')
                            ->default(fn (FeeInvoice $record) => $record->due_amount)
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
                            ->default('upi')
                            ->required(),
                        TextInput::make('transaction_id')
                            ->label('Transaction / UTR Reference No.')
                            ->placeholder('e.g. UPI-123456789'),
                        DatePicker::make('payment_date')
                            ->label('Receipt Date')
                            ->default(now())
                            ->required(),
                    ])
                    ->action(function (FeeInvoice $record, array $data): void {
                        FeePayment::create([
                            'fee_invoice_id' => $record->id,
                            'amount_paid' => $data['amount_paid'],
                            'payment_mode' => $data['payment_mode'],
                            'transaction_id' => $data['transaction_id'] ?? null,
                            'payment_date' => $data['payment_date'],
                        ]);

                        Notification::make()
                            ->title('Payment Received')
                            ->success()
                            ->body("Recorded payment of ₹" . number_format($data['amount_paid'], 2) . " for Invoice #{$record->invoice_number}.")
                            ->send();
                    }),
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('due_date', 'desc');
    }
}
