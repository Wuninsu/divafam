<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'subject',
        'position',
        'image',
        'message',
        'status',
        'responded',
    ];

    protected $casts = [
        'status' => 'boolean',
        'responded' => 'boolean',
    ];
}
