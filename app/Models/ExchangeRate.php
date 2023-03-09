<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExchangeRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'added_by',
        'name',
        'first',
        'second',
        'rate',
        'first_to_second',
        'second_to_first'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function firstCurrency() {
        return $this->belongsTo(Currency::class, 'first');
    }

    public function secondCurrency() {
        return $this->belongsTo(Currency::class, 'second');
    }
}
