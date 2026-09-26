<?php

namespace App\Filament\Resources\Students\Tables;

use App\Models\SchoolClass;
use App\Models\Student;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('Photo')
                    ->circular()
                    ->defaultImageUrl(fn (Student $record): string => $record->photo_url),
                TextColumn::make('admission_number')
                    ->label('Admission No.')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),
                TextColumn::make('first_name')
                    ->label('Student Name')
                    ->formatStateUsing(fn (Student $record): string => $record->full_name)
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(['first_name']),
                TextColumn::make('schoolClass.name')
                    ->label('Class')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('section.name')
                    ->label('Section')
                    ->badge()
                    ->color('gray')
                    ->placeholder('Unassigned'),
                TextColumn::make('guardian_name')
                    ->label('Guardian')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),
                TextColumn::make('gender')
                    ->label('Gender')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'male' => 'info',
                        'female' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'graduated' => 'info',
                        'suspended' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('admission_date')
                    ->label('Admitted On')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('class_id')
                    ->label('Class')
                    ->options(SchoolClass::pluck('name', 'id')),
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'graduated' => 'Graduated',
                        'suspended' => 'Suspended',
                    ]),
                SelectFilter::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
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
