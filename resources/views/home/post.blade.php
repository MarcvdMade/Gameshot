@extends('layouts.pagelayout')

@section('content')
    <div class="container-fluid no-gutters">
        @if($message = Session::get('success'))
            <div class="alert alert-success mt-3 text-center">
                <strong>{{$message}}</strong>
            </div>
        @endif
        <div class="row justify-content-md-center">
            @if($post)
            <div class="post-div">
                <div class="text-wrap">
                    <h2 class="post-title">{{$post->title}}</h2>
                    <img class="img-fluid" src={{asset('storage/'.$post->image)}}>
                    <p>Posted by {{$post->user->username}}</p>
                    <p>{{$post->description}}</p>
                    <p>Game: {{$post->game->name}}</p>
                    <p>Developer: {{$post->game->developer}}</p>
                    @foreach($post->tags as $tag)
                        <p>{{$tag->name}}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center padding-bottom">
            @can('myPost', $post)
                <a href="{{route('home.post.edit', $post['id'])}}"><button class="submit-input m-2">Edit post</button></a>
            @endcan
            <a href="{{route('home')}}"><button class="submit-input m-2">Go back</button></a>
            @can('myPost', $post, $post->user_id)
            <form method="POST" action="">
                @csrf
                @method('DELETE')

                <button type="submit" class="submit-input m-2">Delete post</button>
            </form>
            @endcan
            @else
                <h2>Post not found!</h2>
                @endif
        </div>
    </div>
@endsection
