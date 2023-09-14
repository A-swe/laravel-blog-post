<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content'];

    public function post() {
        return $this->belongsTo(Post::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
