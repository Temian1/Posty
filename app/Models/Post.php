<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Rennokki\Befriended\Contracts\Likeable;
use Spatie\ModelStatus\HasStatuses;
use Illuminate\Database\Eloquent\Model;
use Rennokki\Befriended\Traits\CanBeLiked;
use Spatie\Comments\Models\Concerns\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model implements Likeable
{
    use HasFactory, HasStatuses;
    use CanBeLiked;
    protected $fillable = [
        'body',
        'is_anon',
    ];

    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
