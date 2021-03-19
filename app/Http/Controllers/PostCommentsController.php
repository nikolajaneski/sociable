<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post) {

        $attr = request()->validate([
            'body' => 'required|max:255'
        ]);

        $post->commented(current_user(), $attr);

        return back();
    }

    public function destroy(Post $post, $id) {
        $post->deleteComment($id);
        
        return back();
    }
}
