<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_mobile',
        'status',
        'total',
        'currency',
        'reference'
    ];

    /**
     * @return HasOne
     */
    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }

    public function canRetryPayment(): bool
    {
        return $this->status !== 'PAYED' &&
            isset($this->transaction->request_url) &&
            now()->lessThanOrEqualTo($this->transaction->expiration_date ?? '');
    }
}
