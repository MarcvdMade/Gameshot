<?php

namespace App\Http\Controllers;

use App\Games;
use App\Genre;
use App\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //renders a list of a resource
        $posts = Posts::latest('created_at')->get();
        $genres = Genre::all();
        $games = Games::all();

        return view('home', [
            'posts' => $posts,
            'genres' => $genres,
            'games' => $games
        ]);
    }

    public function show($id)
    {
        $post = Posts::find($id);

        return view('home.post', [
            'post' => $post
        ]);
    }

    public function create()
    {
        //shows view to create a new resource
        $genres = Genre::all();
        $games = Games::all();

        return view('home.create', [
            'genres' => $genres,
            'games' => $games
        ]);
    }

    public function store()
    {
//        dd(\request()->all());
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => ['required'],
            'genre_id' => 'required',
            'game_id' => 'required',
            'user_id' => 'required',
            'hidden' => 'required'
        ]);
//        persist create form
        $post = new Posts();

        $post->title = request('title');
        $post->description = request('description');
        $post->image = request('image');
        $post->user_id = request('user_id');
        $post->genre_id = request('genre_id');
        $post->game_id = request('game_id');
        $post->hidden = request('hidden');

        $post->save();

        return redirect('home')
            ->with('succes', 'You have successfully created a post!');
    }

    public function edit()
    {
        //show a view to edit a resource

    }

    public function update()
    {
        //persist the edited resource

    }

    public function destroy($id)
    {
//        $this->authorize('delete-post');
        $post = Posts::find($id);
        $post->delete();
        return redirect('home');
    }

}
