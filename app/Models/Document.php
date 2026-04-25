<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'file_description'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
    protected static function booted()
    {
        static::creating(function ($file) {
            $file->uuid = $file->uuid ?? (string) Str::uuid();
        });
    }
}
