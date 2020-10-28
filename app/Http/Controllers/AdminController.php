<?php

namespace App\Http\Controllers;

use App\Game;
use App\Tag;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();
        $games = Game::all();
        $users = User::all();

        return view('admin', [
            'posts' => $posts,
            'tags' => $tags,
            'games' => $games,
            'users' => $users
        ]);
    }

    public function errorHandler()
    {
        abort(403, 'Not Allowed');
    }

    public function makeAdmin()
    {
        request()->validate([
            'user' => 'required'
        ]);

        $user = User::find(request('user'));

        $user->assignRole(1);

        return back();
    }

    public function destroy()
    {
        request()->validate([
            'user' => 'required'
        ]);

        $user = User::find(request('user'));

        $user->delete();
        return redirect('admin')
            ->with('success', 'You have successfully deleted the user!');
    }
}
