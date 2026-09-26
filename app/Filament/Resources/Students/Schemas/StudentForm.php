<?php

namespace App\Filament\Resources\Students\Schemas;

use App\Models\SchoolClass;
use App\Models\Section as SectionModel;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Admission & Academic Enrollment')
                    ->description('Assign student registration number, grade class, and status')
                    ->columns(3)
                    ->schema([
                        TextInput::make('admission_number')
                            ->label('Admission / Scholar No.')
                            ->default(fn () => 'ADM-' . date('Y') . '-' . str_pad((string) rand(100, 9999), 4, '0', STR_PAD_LEFT))
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50),
                        DatePicker::make('admission_date')
                            ->label('Date of Admission')
                            ->default(now())
                            ->required(),
                        Select::make('status')
                            ->label('Enrollment Status')
                            ->options([
                                'active' => 'Active',
                                'graduated' => 'Graduated',
                                'suspended' => 'Suspended',
                            ])
                            ->default('active')
                            ->required(),
                        Select::make('class_id')
                            ->label('Class / Grade')
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
                                return SectionModel::where('class_id', $classId)->pluck('name', 'id');
                            })
                            ->searchable()
                            ->preload(),
                    ]),

                Section::make('Student Personal Details')
                    ->description('Basic student identity, demographic details, and photo')
                    ->columns(3)
                    ->schema([
                        TextInput::make('first_name')
                            ->label('First Name')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('last_name')
                            ->label('Last Name')
                            ->required()
                            ->maxLength(100),
                        Select::make('gender')
                            ->label('Gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ])
                            ->required(),
                        DatePicker::make('date_of_birth')
                            ->label('Date of Birth')
                            ->maxDate(now())
                            ->required(),
                        FileUpload::make('photo')
                            ->label('Student Photo')
                            ->image()
                            ->disk('public')
                            ->directory('students/photos')
                            ->columnSpanFull(),
                    ]),

                Section::make('Guardian & Contact Information')
                    ->description('Parent/guardian communication and residential information')
                    ->columns(2)
                    ->schema([
                        TextInput::make('guardian_name')
                            ->label('Parent / Guardian Name')
                            ->required()
                            ->maxLength(150),
                        TextInput::make('phone')
                            ->label('Emergency / Contact Phone')
                            ->tel()
                            ->required()
                            ->maxLength(30),
                        Textarea::make('address')
                            ->label('Residential Address')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
