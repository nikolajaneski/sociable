<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => auth()->user()->timeline()
        ]);
    }

    public function show() {
        return view('posts.index', [
            'posts' => auth()->user()->post()
        ]);
    }
    
    public function store(Request $request) {

        $attributes = request()->validate([
            'body' => 'required|max:255'
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect('/posts');
    }
    
    public function destroy(Post $post) {
        
        $post->delete();
        
        return back();
    }
}
