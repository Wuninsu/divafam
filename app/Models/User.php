<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'uuid',
        'custom_id',
        'username',
        'name',
        'phone',
        'email',
        'password',
        'avatar_url',
        'google_id',
        'facebook_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
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

    protected static function booted()
    {
        static::creating(function ($user) {
            $length = 6;
            $prefix = "USR";
            $noLeadingZero = true;

            do {
                if ($noLeadingZero) {
                    $min = (int) pow(10, $length - 1);   // e.g. 10000000
                    $max = (int) pow(10, $length) - 1;   // e.g. 99999999
                    $number = (string) random_int($min, $max);
                } else {
                    $number = str_pad((string) random_int(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
                }

                $finalId = $prefix . $number;
            } while (User::where('custom_id', $finalId)->exists());

            $user->custom_id = $finalId;
        });
    }


    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    // Relations
    public function metas()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'uploaded_by');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
