<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'title',
        'report_content',
        'report_date',
    ];

    // Relationships
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
