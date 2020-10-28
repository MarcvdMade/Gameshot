@extends ('layouts/pagelayout')

@section('content')
    <div class="container-fluid padding-bottom">
        <div>
            <h2>Welcome, admin {{Auth::user()->name}}</h2>
        </div>
        <div>
            <button id="user-button">Users table</button>
            <button id="post-button">Posts table</button>
            <button id="games-button">Games table</button>
        </div>
        <div class="row hide" id="user-table">
            <h3>User table</h3>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody class="bg-light">
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td class="text-wrap">{{$user->username}}</td>
                    <td class="text-wrap">{{$user->name}}</td>
                    <td class="text-wrap">{{$user->email}}</td>
                    <td>
                        @if($user->hasRole('admin'))
                            Is already admin.
                            @else
                            <form method="POST" action="{{route('admin.make')}}">
                                @csrf
                                @method("POST")
                                <input type="hidden" id="user" name="user" value="{{$user->id}}">
                                <button type="submit" name="make-admin" id="make-admin">Make admin</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{route('admin.delete')}}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" id="user" name="user" value="{{$user->id}}">
                            <button type="submit" name="delete" id="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row hide" id="post-table">
            <h3>Posts table</h3>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">User</th>
                    <th scope="col">Game</th>
                </tr>
                </thead>
                <tbody class="bg-light">
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td><img class="img-fluid table-img" src={{asset('storage/'.$post->image)}}></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->game->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row hide" id="games-table">
            <h3>Games table</h3>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Developer</th>
                </tr>
                </thead>
                <tbody class="bg-light">
                @foreach($games as $game)
                    <tr>
                        <th scope="row">{{$game->id}}</th>
                        <td>{{$game->name}}</td>
                        <td>{{$game->developer}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#user-button").click(function () {
            $("#user-table").toggle();
            $("#post-table").hide();
            $("#games-table").hide();
        });

        $("#post-button").click(function () {
            $("#post-table").toggle();
            $("#user-table").hide();
            $("#games-table").hide();
        });

        $("#games-button").click(function () {
            $("#games-table").toggle();
            $("#post-table").hide();
            $("#user-table").hide();
        });
    })
</script>
