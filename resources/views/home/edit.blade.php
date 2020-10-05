@extends ('layouts.pagelayout')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-center padding-bottom">
            <div class="d-inline-flex flex-column p-2 form-box">
                <div class="text-center text-uppercase"><h2>edit post</h2></div>
                <div>
                    <form method="POST" action="../{{$post->id}}">
                        @csrf
                        @method('PUT')


                        <div>
                            <label for="title">Title</label>

                            <div>
                                <input type="text" name="title" id="title" value="{{$post->title}}" required>
                                @error('title')
                                <p>{{$errors->first('title')}}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description">Description</label>

                            <div>
                                <textarea type="text" name="description" id="description" required>
                                    {{$post->description}}
                                </textarea>
                                @error('description')
                                <p>{{$errors->first('description')}}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <input type="hidden" name="image" id="image" value="{{$post->image}}">
                        </div>

                        <div>
                            <label for="genre_id">Genre</label>

                            <div>
                                <select name="genre_id" id="genre_id">
                                    @foreach($genres as $genre)
                                        <option @if($post->genre_id == $genre->id) selected="selected" @endif value="{{$genre->id}}">{{$genre->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="game_id">Game</label>

                            <div>
                                <select name="game_id" id="game_id">
                                    @foreach($games as $game)
                                        <option @if($post->game_id == $game->id) selected="selected" @endif value="{{$game->id}}">{{$game->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="hidden">hide post</label>

                            <div>
                                <select name="hidden" id="hidden">
                                    <option value="1">Show</option>
                                    <option value="0">Hide</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <div>
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                            </div>
                            <div>
                                <input type="submit" name="submit" id="submit">
                            </div>
                        </div>

                    </form>
{{--                    <a href="{{route('home'.$post->id)}}"><button class="submit-input m-2">Cancel</button></a>--}}
                    <div class="mt-5 mb-3">
                        <img class="img-fluid" src="{{asset('storage/'.$post->image)}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
