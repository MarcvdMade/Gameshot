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
                                <option></option>
                            </select>
                        </div>
                        <div>
                            <label for="genre">Genre</label>
                            <select name="genre">
                                <option></option>
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
                @foreach($posts as $post)
                    @php /** @var App\Posts $post */ @endphp
                <div class=" card post-div">
                    <a href="/home/{{$post->id}}"><p>{{$post->title}}</p></a>
                    <p>{{$post->user->name}}</p>
                    <img class="img-fluid" src={{$post->image}}>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
