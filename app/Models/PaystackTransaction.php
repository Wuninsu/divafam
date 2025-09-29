<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaystackTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'status',
        'currency',
        'amount',
        'customer_email',
        'customer_phone',
        'gateway_response',
        'channel',
        'bank',
        'card_type',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class, 'reference', 'payment_reference');
    }

}
