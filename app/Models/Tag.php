<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'is_active'];


    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags')->withTimestamps();
    }
}
