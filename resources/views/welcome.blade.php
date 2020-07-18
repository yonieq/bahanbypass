<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<div class="bg-image">    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Informasi Pendakian Gunung Slamet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                color: #FFFFFF;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
            }

            a { color:white;
            }

            * {
                box-sizing: border-box;
            }

            div.bg-image{
                background-image: url('https://i.ytimg.com/vi/Mo1rW10hRSY/maxresdefault.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                background-color: #fff;
                height: 100%;
            }
            
            div.transbox {
            margin: 30px;
            background-color: #ffffff;
            border: 1px solid black;
            opacity: 0.8;
            }

            div.transbox p {
            font-weight: bold;
            color: #000000;
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
                background-color: rgb(0,0,0);
                background-color: rgba(0,0,0, 0.4);
                color: white;
                font-weight: bold;
                border: 3px solid #f1f1f1;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
                width: 80%;
                padding: 20px;
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
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

            <div class="content">
                <h2>Hallo, Selamat datang di</h2>
                <h1>Sistem Informasi Pendakian Gunung Slamet</h1>
            </div>
        </div>
    </body>
    </div>
</html>
