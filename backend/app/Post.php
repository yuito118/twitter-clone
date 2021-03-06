<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;
use App\Like;

class Post extends Model
{
    protected $fillable = [
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        // return dd($this->belongsToMany(User::class, "likes"));
        
        return $this->hasMany(Like::class);
    }

    public function isPostOwner(User $user): bool
    {
        return $this->user_id === $user->id ? true : false;
    }

    public function findLikeId(User $user)
    {
        return $this->likes->where('user_id', $user->id)->first();
    }
}
