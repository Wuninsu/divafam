<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    // Define fillable properties
    protected $fillable = [
        'type',
        'title',
        'description',
        'image_1',
        'image_2',
        'steps',
        'community_impact',
        'carousel_items',
    ];

    // Casting fields to array for easy JSON handling
    protected $casts = [
        'steps' => 'array',                // Store "steps" as an array
        'community_impact' => 'array',     // Store "community_impact" as an array
        'carousel_items' => 'array',       // Store "carousel_items" as an array
    ];
}
