<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #073a63;
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                /* background-image: url("https://www.dachser.pe/images/Corporate/DGI_003542_zugeschnitten_rdax_65.jpg"); */
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
            }

            .title {
                font-size: 84px;
                color: white;
                text-shadow: #000000
            }

            .links > a {
                color: rgb(0, 0, 0);
                padding: 1px 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color: rgb(255, 255, 255);
            }

            .links > a:hover {
                color: rgb(255, 255, 255);
                background-color: rgb(0, 0, 0);
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" >

            <div class="content " >
                <div class="title m-b-md ">
                    ITMEEC S.A.C.
                </div>
                <small>Sistema de Gestión de Almacén</small>

                <div class="links">
                    @if (Route::has('login'))
                        
                        @auth
                            <a href="{{ url('/home') }}">DASHBOARD</a>
                        @else
                            <a href="{{ route('login') }}">LOGIN</a>

                        @endauth
                        
                    @endif
                    
                </div>
            </div>
        </div>
    </body>
</html>
