@extends('layouts.pagelayout')

@section('content')
<div class="container-fluid no-gutters">
    <div class="container-fluid no-gutters">
        @if($message = Session::get('success'))
            <div class="alert alert-success mt-3 text-center">
                <strong>{{$message}}</strong>
            </div>
        @endif
        <div class=" action-row row justify-content-md-center mt-5 pt-3">
            <div class="col">
                <div>
                    <form type="POST" action="{{route('game')}}">
                        @csrf

                        <div>
                            <label for="game">Game</label>
                            <select id="game" name="game">
                                <option value="0" hidden disabled selected> -- Select a game -- </option>
                                @foreach($games as $game)
                                    <option value="{{$game->name}}">{{$game->name}}</option>
                                @endforeach
                            </select>
                            <input class="submit-input" id="game-filter" type="submit" value="filter">
                        </div>
                    </form>
                    <form class="tags" type="POST" action="{{route('tag-filter')}}">
                        @csrf

                        <div>
                            <label for="tag">Tag</label>
                            <select name="tag">
                                <option hidden disabled selected> -- Select a tag -- </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            <input class="submit-input" type="submit" value="filter">
                        </div>
                    </form>
                    <form type="POST" action="{{route('search')}}">
                        @csrf

                        <div>
                            <div class="flex-row">
                                <label for="game">Search</label>
                                <input class="mb-2" type="text" name="search" id="search" value="">
                                <input type="submit" name="submit" class="submit-input" value="search">
                            </div>
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
                @foreach($posts as $post)
                    @php /** @var App\Post $post */ @endphp
                <div class=" card post-div">
                    <div class="post-title">
                        <h2>{{$post->title}}</h2>
                    </div>
                    <img class="img-fluid post-img" src={{asset('storage/'.$post->image)}}>
                    <p class="ml-1">Posted by <a href="{{route('profile', $post->user->username)}}"><i class="fa fa-user" style="color: #FF101F"></i> {{$post->user->username}}</a></p>
                    <p class="ml-1">Game: {{$post->game->name}}</p>
                    <div class="mb-3 ml-1">
                        @foreach($post->tags as $tag)
                            <a class="tag" href="{{ route('tag', ['tag' => $tag->name]) }}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <a class="ml-1 mb-3" href="{{route('home.post', $post['id'])}}"><button class="submit-input">Show full post</button></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

