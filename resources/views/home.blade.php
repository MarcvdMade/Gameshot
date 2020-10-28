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
                <a href="{{route('your-posts')}}"><button class="submit-input">Show all your posts</button></a>
            </div>
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
                            <input id="game-filter" type="submit">
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
                            <input type="submit">
                        </div>
                    </form>
                    <form type="POST" action="{{route('search')}}">
                        @csrf

                        <div>
                            <div class="flex-row">
                                <label for="game">Search</label>
                                <input type="text" name="search" id="search" value="">
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
                    <p class="ml-1">Posted by {{$post->user->username}}</p>
                    <p class="ml-1">Game: {{$post->game->name}}</p>
                    <div class="mb-3 ml-1">
                        @foreach($post->tags as $tag)
                            <a class="tag" href="{{ route('tag', ['tag' => $tag->name]) }}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <div class="flex ml-1">
                        <div>
                            <i class="fa fa-thumbs-up" style="color:{{ $post->isLikedBy(Auth::user()) ? "#FF101F" : "#D3D3D3"}};"></i>
                            <span>{{$post->likes ?: 0}}</span>
                        </div>
                        <div>
                            <i class="fa fa-thumbs-down" style="color:{{ $post->isDislikedBy(Auth::user()) ? "#FF101F" : "#D3D3D3"}};"></i>
                            <span>{{$post->dislikes ?: 0}}</span>
                        </div>
                    </div>
                    <a href="{{route('home.post', $post['id'])}}"><button class="submit-input">Show full post</button></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

