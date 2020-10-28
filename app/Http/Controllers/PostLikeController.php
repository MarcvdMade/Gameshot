<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort(403, 'Not Allowed');
    }


    public function store(Post $post)
    {
        $this->authorize('like');

        $post->like(Auth::user());

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('like');

        $post->dislike(Auth::user());

        return back();
    }
}
