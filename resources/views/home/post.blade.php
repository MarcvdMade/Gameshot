@extends('layouts.pagelayout')

@section('content')
    <div class="container-fluid no-gutters">
        <div class="row justify-content-md-center">
            <div class="post-div">
                <p>{{$post->title}}</p>
                <p>{{$post->user->name}}</p>
                <p>{{$post->description}}</p>
                <p>{{$post->game->name}}</p>
                <p>{{$post->game->developer}}</p>
                <p>{{$post->genre->name}}</p>
                <img class="img-fluid" src={{$post->image}}>
            </div>
        </div>
        <div class="row justify-content-md-center padding-bottom">
            <a href="{{route('home')}}"><button class="submit-input">Go back</button></a>
        </div>
    </div>
@endsection
