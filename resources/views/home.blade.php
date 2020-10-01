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
    <div class="container-fluid">
        <div class="row justify-content-md-center mt-5">
            <h2>Here would be the filter system</h2>
        </div>
        <div class="row post-holder justify-content-md-center">
            <div class="row justify-content-md-center">
                @foreach($posts as $post)
                    @php /** @var App\Posts $post */ @endphp
                <div class=" card post-div">
                    <p>{{$post->title}}</p>
                    <p>{{$post->user->name}}</p>
                    <p>{{$post->description}}</p>
                    <p>{{$post->game->name}}</p>
                    <p>{{$post->game->developer}}</p>
                    <p>{{$post->genre->name}}</p>
                    <img class="img-fluid" src={{$post->image}}>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
