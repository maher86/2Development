<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>جمعية نحو التنمية</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
            }

            .links > a {
                color: #636b6f;
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
    <body style=" background:url({{asset('storage/uploads/avatars/bg.jpg')}}) no-repeat center center;
            background-size:cover;  

            /* Workaround for some mobile browsers */
            min-height:100%;    
            padding-top: 20px;
            padding-bottom: 20px;
            ">
    <div class="overlay" style="position:fixed;background-color:rgba(36, 70, 105, 0.74);z-index=1;left: 0;
  top: 0;
  right: 0;
  bottom: 0;"></div> 
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color:#ffff;">الرئيسة</a>
                    @else
                        <a href="{{ route('login') }}"style="color:#ffff">تسجيل دخول</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"style="color:#ffff">إنضمام</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="z-index: 1000;color: #ffff;position: relative;">
                   جمعية نحو التنمية
                </div>

                
            </div>
        </div>
    </body>
</html>
