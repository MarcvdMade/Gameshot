@extends ('layouts/pagelayout')

@section('content')
    <div>
        <div class="content padding-bottom">
            <div class="container">
                <div class="text-box m-5">
                    <h2>About</h2>
                    <p>My project plan was building an webapp to share game screenshots. I called it Gameshot.
                        The goal is to create a social media for gamers. They can share their in-game memory here using screenshots.
                    </p>
                    <p>
                     The goal is that people share their screenshots with game and genre tags. By doing this you can filter posts
                     on game title and genre.
                    </p>
                    <p>
                     Their needed to be different rolls. So i decided that there are users and admins. The admins are here to insure
                        that the platform is not miss used. The admin can also add new games and tags to the platform. And users can not edit
                        other users post. If that happens the admin is there to fix this problem.
                    </p>
                    <p>
                        An other part of the project is to create an log in and registration system. This also includes validation.
                    </p>
                    <p>
                        Users can create, change, remove and hide posts. They can also like posts. After creating a post you can like other peoples posts.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
