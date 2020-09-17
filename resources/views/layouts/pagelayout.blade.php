<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gameshot</title>

    <!-- sass -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Styles -->

    <!--color codes -->
    <!--#FF101F bright red -->
    <!--#FF3C38 tart orange -->
    <!--#292D30 darkest dark -->
    <!--#343A40 bit lighter dark -->
    <!--#D3D3D3 light gray -->

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
            background: #FF101F;
        }

        h1 {
            color: #FF101F;
            font-weight: bold;
            text-transform: uppercase;
        }

        footer {
            text-align: center;
        }

        .social-icon {
            font-size: 30px;
            padding: 10px;
        }

        .social-link {
            color: #D3D3D3;
            -webkit-transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
            -moz-transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
            -o-transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
            transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
        }

        .social-link:hover {
            color: #FF3C38;
        }

        .img-home {
            border-bottom: solid 5px #FF101F;
        }

        .text-box {
            background: #FF3C38;
            border-radius: 10px;
            padding: 20px;
        }

        .form-box {
            background: #343a40;
            border-radius: 10px;
            margin: 50px;
        }

        .text-input {
            background: #292d30;
            color: #D3D3D3;
            border-radius: 10px;
            border: none;
        }

        .submit-input {
            background: none;
            color: #FF101F;
            border: #FF101F solid 2px;
            border-radius: 10px;
            text-transform: uppercase;
            font-weight: bold;
            -webkit-transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
            -moz-transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
            -o-transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
            transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
        }

        .submit-input:hover {
            background: #FF101F;
            color: #D3D3D3;
        }

        .link-button {
            background: none;
            color: #ffffff;
            border: #ffffff solid 2px;
            border-radius: 10px;
            text-transform: uppercase;
            font-weight: bold;
            -webkit-transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
            -moz-transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
            -o-transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
            transition: all 200ms cubic-bezier(0.645, 0.045, 0.355, 1.000);
        }

        .link-button:hover {
            background: #ffffff;
            color: #292d30;
        }

        .padding-bottom {
            padding-bottom: 100px;
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
                <h1>Gameshot<i class="fa fa-gamepad" style="color: #FF101F;"></i></h1>
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

        <footer class="card-footer fixed-bottom bg-dark">
            <div class="container">
                <p>Made with <i class="fa fa-heart" style="color:red;"></i> by Marc vd Made - a CMGT student</p>
                <div class="container">
                    <a class="social-link" href="https://www.instagram.com/marcvdmade/?hl=nl"><i class="fa fa-instagram social-icon" style=""></i></a>
                    <a class="social-link" href="https://www.linkedin.com/in/marc-van-der-made-b15914193/"><i class="fa fa-linkedin social-icon"></i></a>
                </div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
