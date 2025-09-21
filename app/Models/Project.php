<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'cover_image', 'is_active', 'user_id'];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function project()
    {
        return $this->belongsTo(User::class);
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
}
