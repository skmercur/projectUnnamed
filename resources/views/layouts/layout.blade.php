<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Free Education</title>

    <!-- Scripts -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" type="text/javascript"> </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" type="text/javascript"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" type="text/javascript"></script>

<script src="{{ asset('assets/js/jquery.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/iziToast.min.js') }}" type="text/javascript"></script>

  <script src="{{asset('assets/js/headroom.min.js')}}"></script>

 <script src="{{asset('assets/js/argon.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- icons -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" >

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('assets/css/simple-sidebar.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/argon.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}" >
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('assets/css/error.css') }}" >




</head>

<body style="background-image:url({{asset('assets/img/doodles.png')}})">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand mb-0 h1" href="/">The Free Education</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
 <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
       <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                        <li class="nav-item dropdown">
                <div class="card-profile-image">
                  <a href="/{{ Auth::user()->username}}">
                    <img class="rounded-circle" src="{{ Auth::user()->imgpath}}" alt="" style="background-color: white;  height: 40px;">
                  </a>
                </div>

                        </li>

                           <li class="nav-item dropdown">

                               <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->lastname }} <span class="caret"></span>
                                 </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color:black;">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </ul>
    @guest

    @else
    <form class="form-inline my-2 my-lg-0 justify-content-center" method="get" action="usearch">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="q">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
       @endguest
  </div>
</nav>




@yield('content')


</body>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<nav class="navbar fixed-bottom navbar-dark bg-dark">
  <a class="navbar-brand" href="/about">About The Free Education</a>
  TeamDZ
</nav>





</html>
