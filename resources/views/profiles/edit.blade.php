@extends('layouts/pagelayout')

@section('content')
    <div>
        <div class="d-flex justify-content-center padding-bottom">
            <div class="d-inline-flex flex-column p-2 form-box">
                <div class="text-center text-uppercase">
                    <h2>edit information</h2>
                </div>
                <div>
                    <form method="POST" action="{{$user->path()}}">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="username">Username</label>

                            <div>
                                <input type="text" name="username" id="username" value="{{$user->username}}" required>
                                @error('username')
                                <p>{{$errors->first('username')}}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="name">Name</label>

                            <div>
                                <input type="text" name="name" id="name" value="{{$user->name}}">
                                @error('name')
                                <p>{{$errors->first('name')}}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email">Email</label>

                            <div>
                                <input type="email" name="email" id="email" value="{{$user->email}}" required>
                                @error('email')
                                <p>{{$errors->first('email')}}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password">Password</label>

                            <div>
                                <input type="password" name="password" id="password" value="" required>
                                @error('password')
                                <p>{{$errors->first('password')}}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation">Password Confirmation</label>

                            <div>
                                <input type="password" name="password_confirmation" id="password_confirmation" required>
                            </div>

                            @error('password_confirmation')
                                <p>{{$errors->first('password_confirmation')}}</p>
                            @enderror
                        </div>

                        <div class="pt-3">
                            <input class="submit-input" type="submit" name="submit" id="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
