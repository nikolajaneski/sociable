<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function index() {
        if(Auth::user())
            return view('posts.index', [
                'posts' => auth()->user()->timeline()
            ]);
        else 
            return view('auth.login');
    }

    public function show($id) {
        return view('posts.index', [
            'posts' => Post::where('id', $id)
                            ->withLikes()
                            ->get()
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
