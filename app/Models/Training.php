<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Training extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'slug',
        'project_id',
        'community_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'capacity',
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
