<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gameshot</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #292d30;
            color: #D3D3D3;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        header {
            background: aqua;
        }

        h1 {
            color: aqua;
            font-weight: bold;
            text-transform: uppercase;
        }

        footer {
            text-align: center;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px; /* Set the fixed height of the footer here */
            line-height: 60px; /* Vertically center the text there */
            background-color: #343a40;
            color: white;
        }

        /*.full-height {*/
        /*    height: 100vh;*/
        /*}*/

        /*.flex-center {*/
        /*    align-items: center;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*}*/

        /*.position-ref {*/
        /*    position: relative;*/
        /*}*/

        /*.top-right {*/
        /*    position: absolute;*/
        /*    right: 10px;*/
        /*    top: 18px;*/
        /*}*/

        /*.content {*/
        /*    text-align: center;*/
        /*}*/

        /*.title {*/
        /*    !*margin-top: 10%;*!*/
        /*    font-size: 84px;*/
        /*}*/


        /*.links > a {*/
        /*    color: #636b6f;*/
        /*    padding: 0 25px;*/
        /*    font-size: 13px;*/
        /*    font-weight: 600;*/
        /*    letter-spacing: .1rem;*/
        /*    text-decoration: none;*/
        /*    text-transform: uppercase;*/
        /*}*/

        /*.m-b-md {*/
        /*    margin-bottom: 30px;*/
        /*}*/
    </style>
</head>
    <body>
        <header>
            <div class="container-fluid bg-dark">
                <h1>Gameshot<i class="fa fa-gamepad" style="color:aqua;"></i></h1>
            </div>
            <div>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('about')}}">About</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        @yield ('content')

        <footer class="footer">
            <div class="container">
                <span>Made with <i class="fa fa-heart" style="color:red;"></i> by Marc - a CMGT student</span>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
