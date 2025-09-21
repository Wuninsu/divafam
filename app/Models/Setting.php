<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'type', 'status'];

    public static function settingData()
    {
        return self::pluck('value', 'key')->toArray();
    }
    public $timestamps = false;
}
