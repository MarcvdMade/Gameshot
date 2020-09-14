@extends ('layouts/pagelayout')

@section('content')
    <div>
        <div class="content">
            <div>
                <h2>Register</h2>
                <div>
                    <form>
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div>
                            <label for="create-username">Username:</label>
                            <input type="text" name="create-username" id="create-username">
                        </div>
                        <div>
                            <label for="create-password">Password:</label>
                            <input type="password" name="create-password" id="create-password">
                        </div>
                        <div>
                            <input type="submit" value="Create account">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
