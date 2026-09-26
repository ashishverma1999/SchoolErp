<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'student_id',
        'fee_structure_id',
        'title',
        'due_date',
        'amount',
        'paid_amount',
        'status',
    ];

    protected $casts = [
        'due_date' => 'date',
        'amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function feeStructure(): BelongsTo
    {
        return $this->belongsTo(FeeStructure::class, 'fee_structure_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(FeePayment::class, 'fee_invoice_id');
    }

    public function getDueAmountAttribute(): float
    {
        return (float) max(0, $this->amount - $this->paid_amount);
    }

    public function recalculateStatus(): void
    {
        $totalPaid = (float) $this->payments()->sum('amount_paid');
        $this->paid_amount = $totalPaid;

        if ($totalPaid >= (float) $this->amount) {
            $this->status = 'paid';
        } elseif ($totalPaid > 0) {
            $this->status = 'partial';
        } else {
            $this->status = 'unpaid';
        }

        $this->saveQuietly();
    }
}
