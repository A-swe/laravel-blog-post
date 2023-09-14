<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $t = 'posts';

    protected $fillable = ['title', 'message', 'type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getTypeIconAttribute()
    {
        return $this->type == 1 ? 'fa-globe' : 'fa-lock';
    }

    public function getPostedTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getCanEditAttribute()
    {
        return $this->user->id === \Auth::user()->id;
    }

    public function getCanDeleteAttribute()
    {
        return $this->user->id === \Auth::user()->id;
    }


}
