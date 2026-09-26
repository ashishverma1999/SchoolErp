<?php

namespace App\Filament\Resources\Sections\Tables;

use App\Models\SchoolClass;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('schoolClass.name')
                    ->label('Class')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('name')
                    ->label('Section Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('room_number')
                    ->label('Room Number')
                    ->searchable()
                    ->placeholder('N/A'),
                TextColumn::make('capacity')
                    ->label('Max Capacity')
                    ->sortable(),
                TextColumn::make('students_count')
                    ->counts('students')
                    ->label('Enrolled Students')
                    ->badge()
                    ->color('success'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('class_id')
                    ->label('Filter by Class')
                    ->options(SchoolClass::pluck('name', 'id')),
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
