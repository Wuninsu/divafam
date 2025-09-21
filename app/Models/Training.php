<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'project_id',
        'community_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'capacity',
    ];

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
