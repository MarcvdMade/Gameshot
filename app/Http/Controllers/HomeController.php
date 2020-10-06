<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use App\Post;
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
        $post = Post::latest('created_at')->get();
        $genres = Genre::all();
        $games = Game::all();

        return view('home', [
            'post' => $post,
            'genres' => $genres,
            'games' => $games
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if(! $post) {
            abort(404, 'Post not found!');
        }

        return view('home.post', [
            'post' => $post
        ]);
    }

    public function create()
    {
        //shows view to create a new resource
        $genres = Genre::all();
        $games = Game::all();

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
            'image' => ['required', 'image', 'max:3000', 'mimes:jpeg,png,jpg,gif,svg'],
            'genre_id' => 'required',
            'game_id' => 'required',
            'user_id' => 'required',
            'hidden' => 'required'
        ]);
//        persist create form
        $post = new Post();

        $post->title = request('title');
        $post->description = request('description');
        $post->image = request('image')->store('postimage');
        $post->user_id = request('user_id');
        $post->genre_id = request('genre_id');
        $post->game_id = request('game_id');
        $post->hidden = request('hidden');

        $post->save();

        return redirect('home')
            ->with('success', 'You have successfully created a post!');
    }

    public function edit(Post $post)
    {
        $this->authorize('myPost', $post);

        //renders a list of a resource
        $post = Post::find($post->id);
        $genres = Genre::all();
        $games = Game::all();

        //show a view to edit a resource
        return view('home.edit', [
            'post' => $post,
            'genres' => $genres,
            'games' => $games
        ]);
    }

    public function update(Post $post)
    {

        $this->authorize('myPost', $post);
//        dd(\request()->all());
        //persist the edited resource
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => ['required'],
            'genre_id' => 'required',
            'game_id' => 'required',
            'user_id' => 'required',
            'hidden' => 'required'
        ]);

        $post = Post::find($post->id);

        $post->title = request('title');
        $post->description = request('description');
        $post->image = request('image');
        $post->user_id = request('user_id');
        $post->genre_id = request('genre_id');
        $post->game_id = request('game_id');
        $post->hidden = request('hidden');

        $post->save();

        return redirect('home/' .$post->id)
            ->with('success', 'You have successfully edited your post!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('myPost', $post);

        $post = Post::find($post->id);
        $post->delete();
        return redirect('home')
            ->with('success', 'You have successfully deleted your post!');
    }

}
