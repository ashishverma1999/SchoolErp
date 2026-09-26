<?php

namespace App\Filament\Resources\FeeStructures\Tables;

use App\Models\SchoolClass;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FeeStructuresTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('schoolClass.name')
                    ->label('Class')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('fee_head')
                    ->label('Fee Head')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'tuition' => 'info',
                        'transport' => 'warning',
                        'lab', 'library' => 'primary',
                        'admission' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('INR')
                    ->weight('bold')
                    ->sortable(),
                TextColumn::make('frequency')
                    ->label('Billing Frequency')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color('gray')
                    ->sortable(),
                TextColumn::make('invoices_count')
                    ->counts('feeInvoices')
                    ->label('Invoices Generated')
                    ->badge(),
            ])
            ->filters([
                SelectFilter::make('class_id')
                    ->label('Class')
                    ->options(SchoolClass::pluck('name', 'id')),
                SelectFilter::make('fee_head')
                    ->options([
                        'tuition' => 'Tuition',
                        'transport' => 'Transport',
                        'lab' => 'Lab',
                        'library' => 'Library',
                        'admission' => 'Admission',
                        'examination' => 'Examination',
                    ]),
                SelectFilter::make('frequency')
                    ->options([
                        'monthly' => 'Monthly',
                        'quarterly' => 'Quarterly',
                        'annually' => 'Annually',
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
            ->defaultSort('class_id', 'asc');
    }
}
