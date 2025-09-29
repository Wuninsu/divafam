<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'name', 'phone', 'gender', 'age', 'notes'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
