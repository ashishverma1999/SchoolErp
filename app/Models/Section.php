<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'name',
        'room_number',
        'capacity',
    ];

    protected $casts = [
        'capacity' => 'integer',
    ];

    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'section_id');
    }

    public function timetables(): HasMany
    {
        return $this->hasMany(Timetable::class, 'section_id');
    }

    public function getFullSectionNameAttribute(): string
    {
        $className = $this->schoolClass?->name ?? 'Class';
        return "{$className} - Section {$this->name}";
    }
}
