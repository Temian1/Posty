<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use Laravel\Sanctum\HasApiTokens;
use Rennokki\Befriended\Traits\Block;
use Rennokki\Befriended\Traits\Follow;
use Illuminate\Notifications\Notifiable;
use Rennokki\Befriended\Contracts\Following;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rennokki\Befriended\Contracts\Blocking;
use Rennokki\Befriended\Contracts\Liker;
use Rennokki\Befriended\Traits\CanLike;

class User extends Authenticatable implements Following, Blocking, Liker
{
    use HasApiTokens, HasFactory, Notifiable;
    use Follow, Block, CanLike;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $fillable = [
        'name',
        'member_id',
        'birthday',
        'gender',
        'username',
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

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function totalLikes() {
        return $this->hasManyThrough(Like::class, Post::class);
    }
}
