@extends('layouts.pagelayout')

@section('content')
<div class="container-fluid no-gutters">
    <div class="">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="container-fluid no-gutters">
        @if($message = Session::get('success'))
            <div class="alert alert-success mt-3 text-center">
                <strong>{{$message}}</strong>
            </div>
        @endif
        <div class=" action-row row justify-content-md-center mt-5 pt-3">
            <div class="col">
                <a href=""><button class="submit-input">Profile</button></a>
            </div>
            <div class="col">
                <div>
                    <form>
                        <div>
                            <label for="game">Game</label>
                            <select name="game">
                                <option hidden disabled selected> -- Select a game -- </option>
                                @foreach($games as $game)
                                    <option value="{{$game->id}}">{{$game->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="tag">Tag</label>
                            <select name="tag">
                                <option hidden disabled selected> -- Select a tag -- </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <div class="flex-row">
                                <label for="game">Search</label>
                                <input type="text" name="search" id="search">
                            </div>
                        </div>
                        <div>
                            <input type="submit" name="submit" class="submit-input" value="search">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                <a href="{{route('create')}}"><button class="submit-input">Create a post</button></a>
            </div>
        </div>
        <div class="row post-holder justify-content-md-center">
            <div class="row justify-content-md-center">
                @foreach($post as $post)
                    @php /** @var App\Post $post */ @endphp
                <div class=" card post-div">
                    <div class="post-title">
                        <h2>{{$post->title}}</h2>
                    </div>
                    <img class="img-fluid" src={{asset('storage/'.$post->image)}}>
                    <p>Posted by {{$post->user->username}}</p>
                    <p>Game: {{$post->game->name}}</p>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('home', ['tag' => $tag->name]) }}">{{$tag->name}}</a>
                    @endforeach
                    <a href="{{route('home', $post['id'])}}"><button class="submit-input">Show full post</button></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
