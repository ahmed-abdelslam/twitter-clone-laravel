<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show_demo', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(20)
            ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'string|required|max:255',
            'email' => 'string|required|email|max:255|unique:users,email,'.$user->id,
            'profile_photo_path' => 'file',
            'password' => 'string|required|min:8|max:255|confirmed'
        ]);

        if (request('profile_photo_path')) {
            $attributes['profile_photo_path'] = request('profile_photo_path')->store('avatars');
        }
        $user->update($attributes);

        return redirect('/'.$user->name);
    }
}
