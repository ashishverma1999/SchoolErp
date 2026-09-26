<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamMark extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'student_id',
        'subject_name',
        'marks_obtained',
        'max_marks',
        'grade',
        'remarks',
    ];

    protected $casts = [
        'marks_obtained' => 'decimal:2',
        'max_marks' => 'decimal:2',
    ];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    protected static function booted(): void
    {
        static::saving(function (ExamMark $mark) {
            if (empty($mark->grade) && $mark->max_marks > 0) {
                $percentage = ($mark->marks_obtained / $mark->max_marks) * 100;
                $mark->grade = match (true) {
                    $percentage >= 90 => 'A+',
                    $percentage >= 80 => 'A',
                    $percentage >= 70 => 'B+',
                    $percentage >= 60 => 'B',
                    $percentage >= 50 => 'C',
                    $percentage >= 40 => 'D',
                    default => 'F',
                };
            }
        });
    }
}
