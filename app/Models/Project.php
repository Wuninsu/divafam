<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'uuid',
        'user_id',
        'title',
        'slug',
        'short_description',
        'description',
        'cover_image',
        'status', // draft,ongoing,completed,archived,postponed
        'start_date',
        'end_date',
        'location',
        'budget',
        'amount_spent',
        'is_featured',
        'is_active',
        'tags',
        'category_id'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'budget' => 'decimal:2',
        'amount_spent' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];


    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $guarded = ['uuid'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // A project belongs to a user (creator/owner)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A project belongs to a user (creator/owner)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // A project may have many beneficiaries
    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

    // A project can have many communities (through beneficiaries)
    public function communities()
    {
        return $this->hasManyThrough(Community::class, Beneficiary::class);
    }

    // If you normalize tags via pivot instead of JSON
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tag')->withTimestamps();
    }

    public function project()
    {
        return $this->belongsTo(User::class);
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function leads()
    {
        return $this->belongsToMany(User::class, 'project_leads');
    }
}
