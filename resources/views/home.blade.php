@extends('layouts.pagelayout')

@section('content')
<div class="container no-gutters">
    <div class="">
        <h2>Welcome, {{Auth::user()->name}}</h2>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div>
        <ul>
        @foreach($posts as $post)
            @php /** @var App\Posts $post */ @endphp
            <li>
                <h3>{{$post->title}}</h3>
                <h4>{{$post->user->name}}</h4>
                <p>{{$post->description}}</p>
                <p>{{$post->game->name}}</p>
                <p>{{$post->game->developer}}</p>
                <p>{{$post->genre->name}}</p>
                <img src={{$post->image}}>
            </li>
        @endforeach
        </ul>
    </div>
</div>
@endsection
