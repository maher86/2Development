<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>جمعية نحو التنمية</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('dashboard/dist/fonts/fonts-fa.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background: url(http://localhost:8000/storage/uploads/avatars/bg.jpg) no-repeat center center;
    background-size: cover;
    min-height: 100%;
    padding-top: 20px;
    padding-bottom: 20px;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm"style="direction:rtl;margin-top:-20px;background-color:rgba(0,0,0,0.5)">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#fff">
                    جمعية نحو التنمية
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:#fff">{{ __('تسجيل دخول') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:#fff">{{ __('الإنضمام') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffff"v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
    function doAfterSelectImage(input){
      //readURL(input);
      uploadUserAvatar();
    }
    function readURL(input){
      if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#user-avatar').attr('src', e.target.result );
        };
        // $('#user-avatar').attr('src', input.value );
        reader.readAsDataURL(input.files[0]);      
      }
    }
    function uploadUserAvatar(){
      let myform = document.getElementById('register-form');
      let formData = new FormData(myform);
      $.ajax({
        type:'post',
        data:formData,
        dataType:'JSON',
        contentType:false,
        cache:false,
        processData:false,        
        url:'{{ route('register') }}',
        success:function(response){
          if(response== 200){
            $('#notifDiv').fadeIn();
            $('#notifDiv').css('background','green');
            $('#notifDiv').text('your Avatar is updated');
            setTimeout(() => {
              $('#notifDiv').fadeOut();
            }, 3000);
          }else if (response == 700){
            $('#notifDiv').fadeIn();
            $('#notifDiv').css('background','red');
            $('#notifDiv').text('there is wrong');
            setTimeout(() => {
              $('#notifDiv').fadeOut();
            }, 3000);

          }
        }
      })
    }
    
    </script>
</body>
</html>
