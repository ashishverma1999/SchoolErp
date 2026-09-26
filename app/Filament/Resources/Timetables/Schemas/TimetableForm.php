<?php

namespace App\Filament\Resources\Timetables\Schemas;

use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Teacher;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Schemas\Components\Section as FormSection;
use Filament\Schemas\Schema;

class TimetableForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FormSection::make('Class Schedule Information')
                    ->description('Assign period timings, subjects, and teachers to classes & sections')
                    ->columns(3)
                    ->schema([
                        Select::make('class_id')
                            ->label('Class')
                            ->options(SchoolClass::orderBy('numeric_grade')->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required(),
                        Select::make('section_id')
                            ->label('Section')
                            ->options(function (Get $get) {
                                $classId = $get('class_id');
                                if (! $classId) {
                                    return [];
                                }
                                return Section::where('class_id', $classId)->pluck('name', 'id');
                            })
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('day_of_week')
                            ->label('Day of Week')
                            ->options([
                                'Monday' => 'Monday',
                                'Tuesday' => 'Tuesday',
                                'Wednesday' => 'Wednesday',
                                'Thursday' => 'Thursday',
                                'Friday' => 'Friday',
                                'Saturday' => 'Saturday',
                            ])
                            ->default('Monday')
                            ->required(),
                        TextInput::make('period_number')
                            ->label('Period Number')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(12)
                            ->default(1)
                            ->required(),
                        TextInput::make('subject_name')
                            ->label('Subject')
                            ->placeholder('e.g. Mathematics, English, Physics')
                            ->required()
                            ->maxLength(100),
                        Select::make('teacher_id')
                            ->label('Assigned Teacher')
                            ->options(function () {
                                return Teacher::where('status', 'active')->get()->mapWithKeys(function ($teacher) {
                                    return [$teacher->id => "{$teacher->full_name} ({$teacher->employee_id})"];
                                });
                            })
                            ->searchable()
                            ->preload(),
                        TimePicker::make('start_time')
                            ->label('Start Time')
                            ->seconds(false)
                            ->default('08:00')
                            ->required(),
                        TimePicker::make('end_time')
                            ->label('End Time')
                            ->seconds(false)
                            ->default('08:45')
                            ->required(),
                    ]),
            ]);
    }
}
