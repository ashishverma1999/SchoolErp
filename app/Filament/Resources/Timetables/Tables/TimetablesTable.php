<?php

namespace App\Filament\Resources\Timetables\Tables;

use App\Models\SchoolClass;
use App\Models\Timetable;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TimetablesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day_of_week')
                    ->label('Day')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                TextColumn::make('period_number')
                    ->label('Period')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('schoolClass.name')
                    ->label('Class')
                    ->sortable(),
                TextColumn::make('section.name')
                    ->label('Section')
                    ->sortable(),
                TextColumn::make('subject_name')
                    ->label('Subject')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('teacher.first_name')
                    ->label('Teacher')
                    ->formatStateUsing(fn (Timetable $record): string => $record->teacher?->full_name ?? 'Unassigned')
                    ->searchable(),
                TextColumn::make('start_time')
                    ->label('Start Time')
                    ->time('h:i A'),
                TextColumn::make('end_time')
                    ->label('End Time')
                    ->time('h:i A'),
            ])
            ->filters([
                SelectFilter::make('day_of_week')
                    ->options([
                        'Monday' => 'Monday',
                        'Tuesday' => 'Tuesday',
                        'Wednesday' => 'Wednesday',
                        'Thursday' => 'Thursday',
                        'Friday' => 'Friday',
                        'Saturday' => 'Saturday',
                    ]),
                SelectFilter::make('class_id')
                    ->label('Class')
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
            ->defaultSort('period_number', 'asc');
    }
}
