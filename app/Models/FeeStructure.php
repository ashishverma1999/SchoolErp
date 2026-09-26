<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'fee_head',
        'amount',
        'frequency',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function feeInvoices(): HasMany
    {
        return $this->hasMany(FeeInvoice::class, 'fee_structure_id');
    }
}
