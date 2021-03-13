<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user) {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user) {

        // $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $attr = request()->validate([
            'username' => [
                'string', 
                'required', 
                'max:255', 
                'alpha_dash', 
                Rule::unique('users')->ignore($user)
            ],
            'name' => ['string', 'required', 'max:255'],
            'description' => ['string', 'max:420'],
            'email' => [
                'string', 
                'required', 
                'max:255', 
                'email', 
                Rule::unique('users')->ignore($user)
            ],
            'avatar' => ['file'],
            'cover' => ['file'],
            'password' => [
                'string', 
                'required', 
                'min:8', 
                'max:255', 
                'confirmed'
            ]
        ]);

        if (request('avatar')) 
            $attr['avatar'] = request('avatar')->store('avatars');

        if (request('cover')) 
            $attr['cover'] = request('cover')->store('covers');

        $user->update($attr);

        return redirect($user->path());
    }
}
