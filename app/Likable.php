<?php

namespace App;

use App\Models\User;
use App\Models\Like;
use Illuminate\Database\Eloquent\Builder;
use App\Notifications\PostLiked;

trait Likable
{

    public function scopeWithLikes(Builder $query) {
        $query->leftJoinSub(
            'select post_id, sum(liked) likes, sum(!liked) dislikes from likes group by post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );
    }

    public function like($user = null, $liked = true) {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'liked' => $liked
        ]); 

        $this->user->notify(new PostLiked([
            'post' => $this->id,
            'liked' => $liked,
            'user' => $user ? $user->name : auth()->user()->name,
            'user_path' => $user ? $user->path(): auth()->user()->path(),
            'user_avatar' => $user ? $user->avatar : auth()->user()->avatar,

        ]));
    }

    public function dislike($user = null) {
        return $this->like($user, false);
    }

    public function unlike($user = null) {
        return $this->likes()
                    ->delete($user ? $user->id : auth()->id());
    }

    public function isLikedBy(User $user) {
        return (bool) $user->likes
                            ->where('post_id', $this->id)
                            ->where('liked', true)
                            ->count();
    }

    public function isDislikedBy(User $user) {
        return (bool) $user->likes
                            ->where('post_id', $this->id)
                            ->where('liked', false)
                            ->count();
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}