<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        $post->like(Auth::user());

        return back();
    }

    public function destroy(Post $post)
    {
        $post->dislike(Auth::user());

        return back();
    }
}
