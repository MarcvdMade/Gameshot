@extends('layouts.pagelayout')

@section('content')
    <div class="container-fluid no-gutters">
        <div class="container-fluid no-gutters">
            @if($message = Session::get('success'))
                <div class="alert alert-success mt-3 text-center">
                    <strong>{{$message}}</strong>
                </div>
            @endif
            <div class="container-fluid action-row mt-3">
                <div class="justify-content-md-center text-center">
                    <h2>Profile of {{$user->username}}</h2>
                    @can('edit', $user)
                        <a href="{{$user->path('edit')}}"><button class="submit-input">Edit Profile</button></a>
                    @endcan
                </div>
            </div>
            <div class="row post-holder justify-content-md-center">
                <div class="row justify-content-md-center">
                    @forelse($posts as $post)
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
                    @empty
                        <h2 class="mt-3">No posts yet!</h2>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
