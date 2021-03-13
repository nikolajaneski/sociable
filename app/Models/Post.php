<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Likable;

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
        return $this->comments()->create([
            'user_id' => $user ? $user->id : auth()->id(),
            'post_id' => $this->id,
            'body' => $attr['body']
        ]); 
    }

}
