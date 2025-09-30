<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigMeta extends Model
{
    protected $fillable = ['key', 'value'];

    public static function settingData()
    {
        return self::pluck('value', 'key')->toArray();
    }
    public $timestamps = false;

    public $casts = [
        'why_choose_us_points' => 'array',
    ];
}
