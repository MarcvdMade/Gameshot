@extends ('layouts/pagelayout')

@section('content')
    <div>
        <div class="content">
            <div class="container-fluid p-0 img-home">
                <img src="{{asset('img/pressstart.gif')}}" class="img-fluid" alt="game image">
            </div>
            <div class="container-fluid w-75 mx-auto m-4">
                <div class="text-box">
                    <h2 class="text-center">Welcome to Gameshot!</h2>
                    <div class="container">
                        <p class="text-center">This is a platform for sharing your in game experiences with fellow gamers.
                            My hope is that this platform will grow to a social platform for gamers to share all their game
                            memories and make new friends to share those memories with. Screenshots in games are a good way
                            to eternalize those memories.
                        </p>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row m-5 padding-bottom">
                    <div class="col-md-4 mb-5 text-box">
                        <h2>Wanna join the community?</h2>
                        <p>You can join our community by pressing this button.</p>
                        <a href="{{route('register')}}"><button class="link-button">Register</button></a>
                        <p>If you already have an account you can sign in here.</p>
                        <a href="{{route('login')}}"><button class="link-button">Log in</button></a>
                    </div>
                    <div class="col-md-4 mb-5 ml-auto text-box">
                        <h2>About</h2>
                        <p>This platform is a school project. I started working on this to complete my programming 5 lessons.</p>
                        <a href="{{route('about')}}"><button class="link-button">read more here</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
