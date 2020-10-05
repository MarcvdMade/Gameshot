@extends ('layouts.pagelayout')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-center padding-bottom">
            <div class="d-inline-flex flex-column p-2 form-box">
                <div class="text-center text-uppercase"><h2>create post</h2></div>
                <div>
                    <form method="POST" action="{{route('home')}}" enctype="multipart/form-data">
                        @csrf


                        <div>
                            <label for="title">Title</label>

                            <div>
                                <input type="text" name="title" id="title" value="{{old('title')}}" required>
                                @error('title')
                                <p>{{$errors->first('title')}}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="description">Description</label>

                            <div>
                                <textarea type="text" name="description" id="description" required>
                                    {{old('description')}}
                                </textarea>
                                @error('description')
                                <p>{{$errors->first('description')}}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="image">Image</label>

                            <div>
                                <input type="file" name="image" id="image" required>
                                @error('image')
                                <p>{{$errors->first('image')}}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="genre_id">Genre</label>

                            <div>
                                <select name="genre_id" id="genre_id">
                                    @foreach($genres as $genre)
                                        <option value="{{$genre->id}}">{{$genre->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="game_id">Game</label>

                            <div>
                                <select name="game_id" id="game_id">
                                    @foreach($games as $game)
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                            </div>
                            <div>
                                <input type="hidden" name="hidden" id="hidden" value="1">
                            </div>
                            <div>
                                <input type="submit" name="submit" id="submit">
                            </div>
                        </div>
                    </form>
                    <a href="{{route('home')}}"><button class="submit-input m-2">Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
