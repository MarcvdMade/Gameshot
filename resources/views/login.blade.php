@extends ('layouts/pagelayout')

@section('content')
    <div>
        <div class="content">
            <div>
                <h2>Login</h2>
                <div>
                    <form>
                        <div>
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username">
                        </div>
                        <div>
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div>
                            <input type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
