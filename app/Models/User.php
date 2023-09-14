<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function getItselfAttribute()
    {
        return $this->id === \Auth::user()->id;
    }
    public function getFullNameAttribute()
    {
        $prefix_name = $this->gender == 1 ? 'Mr' : 'Mrs';
        return $prefix_name . '.' . $this->name;
    }

    public function findOrAbort($id)
    {
        $user = static::find($id);
        if (empty($user)) {
            abort(400);
        };

        return $user;
    }
}
