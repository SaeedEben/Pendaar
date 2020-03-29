<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<?php $rand = rand(1, 3) ?>
<!-- Styles -->
    <style>
        html, body {
            color: #fff;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            width: 100%;
            height: 100vh;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        .bg-image {
            /* The image used */
        {{--background-image: url({{asset("img/1.jpg")}});--}}

        /* Add the blur effect */
            filter: blur(2px);
            -webkit-filter: blur(2px);

            /* Full height */
            width: 100%;
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            z-index: 2;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #1b1e21;
            background-color: rgba(0, 0, 0, 0.8);
        }


        .title {
            font-size: 84px;
        }

        .links > a {
            color: #b0b9a9;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    <img class="bg-image" src="{{asset("img/{$rand}.jpg")}}">

    <div class="content">
        <div class="title m-b-md">
            Pen DaaR
        </div>

        @if (Route::has('login'))
            <div class="flex-center links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <h3 class="text-body">This is a practice for your English writing</h3>
    </div>
</div>

</body>
</html>
