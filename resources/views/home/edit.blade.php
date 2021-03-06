@extends ('layouts.pagelayout')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-center padding-bottom">
            <div class="d-inline-flex flex-column p-2 form-box">
                <div class="text-center text-uppercase"><h2>edit post</h2></div>
                <div>
                    <form method="POST" action="{{route('home.post.update', $post->id)}}">
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
                                <select name="tags[]" multiple id="tags">
                                    @foreach($tags as $tag)
                                        <option @if($post->tags->contains($tag->id)) selected @endif value="{{$tag->id}}">{{$tag->name}}</option>
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
                            <div>
                                <input type="hidden" name="hidden" id="hidden" value="{{$post->hidden}}">
                            </div>
                        </div>

                        <div>
                            <div>
                                <input type="hidden" name="user_id" id="user_id" value="{{$post->user_id}}">
                            </div>
                            <div class="mt-3">
                                <input type="submit" name="submit" id="submit" value="edit" class="submit-input">
                            </div>
                        </div>

                    </form>
                    <div class="mt-5 mb-3">
                        <img class="img-fluid" src="{{asset('storage/'.$post->image)}}">
                    </div>
                </div>
                <a href="{{route('home.post', $post->id)}}"><button class="submit-input m-2">Cancel</button></a>
            </div>
        </div>
    </div>
@endsection
