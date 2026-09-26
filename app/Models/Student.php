<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_number',
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'class_id',
        'section_id',
        'guardian_name',
        'phone',
        'address',
        'photo',
        'status',
        'admission_date',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'admission_date' => 'date',
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && Storage::disk('public')->exists($this->photo)) {
            return Storage::disk('public')->url($this->photo);
        }

        $name = urlencode($this->full_name);
        return "https://ui-avatars.com/api/?name={$name}&background=f59e0b&color=ffffff&bold=true";
    }

    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    public function feeInvoices(): HasMany
    {
        return $this->hasMany(FeeInvoice::class, 'student_id');
    }

    public function examMarks(): HasMany
    {
        return $this->hasMany(ExamMark::class, 'student_id');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }
}
