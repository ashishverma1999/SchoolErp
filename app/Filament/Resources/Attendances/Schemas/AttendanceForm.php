<?php

namespace App\Filament\Resources\Attendances\Schemas;

use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Attendance Record')
                    ->description('Log daily student attendance status')
                    ->columns(3)
                    ->schema([
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
                        DatePicker::make('date')
                            ->label('Attendance Date')
                            ->default(now())
                            ->required(),
                        Select::make('status')
                            ->label('Attendance Status')
                            ->options([
                                'present' => 'Present',
                                'absent' => 'Absent',
                                'late' => 'Late',
                            ])
                            ->default('present')
                            ->required(),
                        Textarea::make('remarks')
                            ->label('Remarks / Reason for Absence or Late Arrival')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
