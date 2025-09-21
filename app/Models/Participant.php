<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['training_id', 'name', 'phone', 'gender', 'age', 'notes'];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
