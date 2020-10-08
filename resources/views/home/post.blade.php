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
                    <div class="post-title">
                        <h2>{{$post->title}}</h2>
                    </div>
                    <img class="img-fluid" src={{asset('storage/'.$post->image)}}>
                    <p class="ml-1">Posted by {{$post->user->username}}</p>
                    <p class="ml-1">{{$post->description}}</p>
                    <div class="row ml-1">
                        <p>Game: {{$post->game->name}}</p>
                        <p class="ml-2">Developer: {{$post->game->developer}}</p>
                    </div>
                    <div class="mb-3 ml-1">
                        @foreach($post->tags as $tag)
                        <a class="tag" href="{{ route('home', ['tag' => $tag->name]) }}">{{$tag->name}}</a>
                        @endforeach
                    </div>
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
