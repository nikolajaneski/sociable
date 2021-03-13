<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikesController extends Controller
{
    public function store(Post $post) {

        $post->isLikedBy(current_user())
            ? $post->unlike(current_user())
            : $post->like(current_user());
        
        return back();
    }

    public function destroy(Post $post) {
        $post->isDislikedBy(current_user()) 
            ? $post->unlike(current_user())
            : $post->dislike(current_user());
        
        return back();
    }

}
