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

    public function makeAdmin()
    {

    }
}
