@extends ('layouts/pagelayout')

@section('content')
    <div>
        <div class="content">
            <div class="d-flex justify-content-center text-center padding-bottom">
                <div class="d-inline-flex flex-column p-2 form-box">
                    <h2>Register</h2>
                    <div>
                        <form>
                            <div class="d-flex flex-column">
                                <label for="reg-email">Email</label>
                                <input class="text-input" type="email" name="reg-email" id="reg-email">
                            </div>
                            <div class="d-flex flex-column">
                                <label for="reg-username">Username</label>
                                <input class="text-input" type="text" name="reg-username" id="reg-username">
                            </div>
                            <div class="d-flex flex-column">
                                <label for="reg-password">Password</label>
                                <input class="text-input" type="password" name="reg-password" id="reg-password">
                            </div>
                            <div class="mt-3">
                                <input class="submit-input" type="submit" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
