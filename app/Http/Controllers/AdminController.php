<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $genres = Genre::all();
        $games = Game::all();
        $users = User::all();

        return view('admin', [
            'posts' => $posts,
            'genres' => $genres,
            'games' => $games,
            'users' => $users
        ]);
    }

    public function makeAdmin()
    {

    }
}
