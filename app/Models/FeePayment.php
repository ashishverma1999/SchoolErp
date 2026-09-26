<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_invoice_id',
        'amount_paid',
        'payment_mode',
        'transaction_id',
        'payment_date',
        'notes',
    ];

    protected $casts = [
        'amount_paid' => 'decimal:2',
        'payment_date' => 'date',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(FeeInvoice::class, 'fee_invoice_id');
    }

    protected static function booted(): void
    {
        static::saved(function (FeePayment $payment) {
            $payment->invoice?->recalculateStatus();
        });

        static::deleted(function (FeePayment $payment) {
            $payment->invoice?->recalculateStatus();
        });
    }
}
