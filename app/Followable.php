<?php

namespace App;

use App\Models\User;
use App\Notifications\UserFollowed;

trait Followable
{
    public function follows() {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function followers() {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }

    public function follow(User $user) {
        return $this->follows()
                    ->save($user);
    }

    public function unfollow(User $user) {
        return $this->follows()
                    ->detach($user);
    }

    public function toggleFollow(User $user)
    {
        if($this->following($user)) { 
            $user->notify(new UserFollowed([
                'follow' => false,
                'user' => $this->name,
                'user_path' => $this->path(),
                'user_avatar' => $this->avatar,
            ]));

            return $this->unfollow($user); 
        }
        
        $user->notify(new UserFollowed([
            'follow' => true,
            'user' => $this->name,
            'user_path' => $this->path(),
            'user_avatar' => $this->avatar,
        ]));

        return $this->follow($user);
    }

    public function following(User $user) {
        return $this->follows()
                    ->where('following_user_id', $user->id)
                    ->exists();
    }
}
