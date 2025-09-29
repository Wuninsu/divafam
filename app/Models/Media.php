<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';

    protected $fillable = ['filename', 'type', 'path', 'alt_text', 'uploaded_by', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
