@extends('layouts.pagelayout')

@section('content')
    <div class="container-fluid no-gutters">
        <div class="row justify-content-md-center">
            <div class="post-div text-wrap">
                <p>{{$post->title}}</p>
                <p>{{$post->user->name}}</p>
                <p>{{$post->description}}</p>
                <p>{{$post->game->name}}</p>
                <p>{{$post->game->developer}}</p>
                <p>{{$post->genre->name}}</p>
                <img class="img-fluid" src={{$post->image}}>
            </div>
        </div>
        <div class="d-flex justify-content-center padding-bottom">
            @can('myPost', $post)
                <a href="/home/{{$post->id}}/edit"><button class="submit-input m-2">Edit post</button></a>
            @endcan
            <a href="{{route('home')}}"><button class="submit-input m-2">Go back</button></a>
            @can('myPost', $post, $post->user_id)
            <form method="POST" action="">
                @csrf
                @method('DELETE')

                <button type="submit" class="submit-input m-2">Delete post</button>
            </form>
            @endcan
        </div>
    </div>
@endsection
