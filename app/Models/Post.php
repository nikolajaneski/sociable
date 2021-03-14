<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Likable;
use App\Notifications\PostCommented;

class Post extends Model
{
    use HasFactory, Likable;
    
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->oldest();
    }

    public function commented($user = null, $attr) {
        $this->user->notify(new PostCommented([
            'post_id' => $this->id,
            'user_name' => $user ? $user->name : auth()->user()->name,
            // this should be improved
            'user_path' => $user ? $user->path() : auth()->user()->path(),
            'user_avatar' => $user ? $user->avatar : auth()->user()->avatar,
        ]));

        return $this->comments()->create([
            'user_id' => $user ? $user->id : auth()->id(),
            'post_id' => $this->id,
            'body' => $attr['body']
        ]); 
    }

}
