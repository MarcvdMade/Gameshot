@extends ('layouts/pagelayout')

@section('content')
    <div>
        <div class="content">
            <div class="d-flex justify-content-center text-center padding-bottom">
                <div class="d-inline-flex flex-column p-2 form-box">
                    <h2>Login</h2>
                    <div>
                        <form>
                            <div class="d-flex flex-column">
                                <label for="username">Username</label>
                                <input class="text-input" type="text" name="username" id="username">
                            </div>
                            <div class="d-flex flex-column">
                                <label for="password">Password</label>
                                <input class="text-input" type="password" name="password" id="password">
                            </div>
                            <div class="mt-3">
                                <input class="submit-input" type="submit" value="Log in">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
