<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

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


    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }


    function friendsOfMine()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')->whereNull('friends.deleted_at');
    }

    // friendship that I was invited to
    function friendOf()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')->whereNull('friends.deleted_at');
    }


    public function mergeFriends()
    {
        return $this->friendsOfMine()->get()->merge($this->friendOf()->get());
    }

}
