<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{

    use HasFactory;

    protected $fillable = [
        'donor_id',
        'amount',
        'currency',
        'donation_type',
        'item_description',
        'donation_date',
        'notes',
        'payment_reference',
    ];

    protected $casts = [
        'donation_date' => 'date',
        'amount' => 'float',
        'is_donor' => 'boolean',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function transaction()
    {
        return $this->hasOne(PaystackTransaction::class, 'reference', 'payment_reference');
    }

}
