<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'description',
        'avatar',
        'cover',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value) {
        // return asset($value ? 'storage/'.$value : '/images/default-avatar.png');
        return asset($value ? 'storage/'.$value : "https://i.pravatar.cc/150?u=" . $this->email);
    }

    public function getCoverAttribute($value) {
        return asset($value ? 'storage/'.$value : '/images/default-cover.jpeg');
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline() {
        $follows = $this->follows()->pluck('id');

        return Post::whereIn('user_id', $follows)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->get();
    }

    public function post() {
        return Post::where('post_id', request()->post)
        ->withLikes()
        ->get();
    }

    public function posts() {
        return $this->hasMany(Post::class)->withLikes()->latest();
    }

    public function path($append = '') {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path; 
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->latest();
    }
}
