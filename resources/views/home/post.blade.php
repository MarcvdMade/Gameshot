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
            <div class="post-div text-wrap">
                <div>
                    <div class="post-title">
                        <h2>{{$post->title}}</h2>
                    </div>
                    <img class="img-fluid post-img" src={{asset('storage/'.$post->image)}}>
                    <p class="ml-1">Posted by <a href="{{route('profile', $post->user->username)}}"><i class="fa fa-user" style="color: #FF101F"></i> {{$post->user->username}}</a></p>
                    <p class="ml-1">{{$post->description}}</p>
                    <div class="row">
                        <div class="col ml-1">
                            <p>Game: {{$post->game->name}}</p>
                        </div>
                        <div class="col">
                            <p>Developer: {{$post->game->developer}}</p>
                        </div>
                    </div>
                    <div class="mb-3 ml-1">
                        @foreach($post->tags as $tag)
                        <a class="tag" href="{{ route('home', ['tag' => $tag->name]) }}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                    @can('like', auth()->user())
                    <div class="d-flex justify-content-start ml-1 mb-3">
                        <div>
                            <form method="POST" action="{{route('home.post.like', $post['id'])}}">
                                @csrf
                                <button type="submit">
                                    <i class="fa fa-thumbs-up" style="color:{{ $post->isLikedBy(Auth::user()) ? "#FF101F" : "#3D3D3D"}};"></i>
                                    <span>{{$post->likes ?: 0}}</span>
                                </button>
                            </form>
                        </div>
                        <div class="ml-2">
                            <form method="POST" action="{{route('home.post.like', $post['id'])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fa fa-thumbs-down" style="color:{{ $post->isDislikedBy(Auth::user()) ? "#FF101F" : "#3D3D3D"}};"></i>
                                    <span>{{$post->dislikes ?: 0}}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center padding-bottom">
            @can('myPost', $post)
                <div>
                    <form method="POST" action="{{route('home.post.hide', $post->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="row">
                                <input type="hidden" id="hidden" name="hidden" value="{{$post->hidden}}">
                            </div>
                            <div class="row justify-content-md-center pt-2">
                                <input type="submit" value="@if($post->hidden === 1) hide @else show @endif" class="submit-input">
                            </div>
                        </div>
                    </form>
                </div>
            @endcan
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

