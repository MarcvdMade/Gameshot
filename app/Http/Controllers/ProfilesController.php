<?php

namespace App\Http\Controllers;

use App\Game;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
        if (auth()->user() == $user) {
            $posts = Post::where('user_id', $user->id)->latest('created_at')->get();
        } else {
            $posts = Post::where('user_id', $user->id)->latest('created_at')->where('hidden', 1)->get();
        }

        //renders a list of a resource
        $tags = Tag::all();
        $games = Game::all();

        return view('profiles.profile', [
            'user' => $user,
            'posts' => $posts,
            'tags' => $tags,
            'games' => $games
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('edit', $user);

        request()->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user), 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'confirmed'] ,
        ]);

        $user->username = request('username');
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));

        $user->update();

        return redirect($user->path())->with('success', 'You successfully changed your information!');
    }
}
