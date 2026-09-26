<?php

namespace App\Filament\Resources\Teachers\Tables;

use App\Models\Teacher;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee_id')
                    ->label('Emp. ID')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('first_name')
                    ->label('Teacher Name')
                    ->formatStateUsing(fn (Teacher $record): string => $record->full_name)
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(['first_name']),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),
                TextColumn::make('qualification')
                    ->label('Qualification')
                    ->limit(30)
                    ->toggleable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state)))
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                        'on_leave' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('joining_date')
                    ->label('Joined On')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'on_leave' => 'On Leave',
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
            ->defaultSort('created_at', 'desc');
    }
}
