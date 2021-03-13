<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    public function index()
    {
        return view('profiles.explore', [
            'users' => User::paginate(50),
        ]);
    }

    public function search() {
        
        return view('profiles.explore', [
            'users' => User::where('name', 'like', '%'.request()->name.'%')->paginate(50),
        ]);
    }
}
