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
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</head>
<body  style="background-image:url({{asset('assets/img/2270.jpg')}})">
<div id="app">

<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
<div class="container">
      <a class="navbar-brand" href="#">The Free Education</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


              <ul class="navbar-nav ml-auto">
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
<a href="/{{ Auth::user()->username}}">
<img src="{{ Auth::user()->imgpath}}" alt="" style="height: 40px;">
</a>


                          </li>


                            <li class="nav-item dropdown">




                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->lastname }},{{ Auth::user()->firstname }}   <span class="caret"></span>
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



    </nav>
    </div>
    <hr>
    <hr>
    @guest
    <form action="search"style="margin-top: 300px;" method="get">

    <div class="input-group mb-12 center">
  <input type="text" class="form-control form-control-lg" style="margin-left: 15%;margin-right: 15%;" placeholder="Recherche" name="q">
<!-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> -->



</div>
<br>
  <br>
<div class="input-group" >
    <button class="form-control btn btn-success" style="margin-left: 30%;margin-right: 30%;" type="submit" id="button-addon2">Search</button>
  </div>



</form>
@else
<form action="usearch"style="margin-top: 300px;" method="get">

<div class="input-group mb-12 center">
<input type="text" class="form-control form-control-lg" style="margin-left: 15%;margin-right: 15%;" placeholder="Recherche" name="q">
<!-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> -->



</div>
<br>
<br>
<div class="input-group" >
<button class="form-control btn btn-success" style="margin-left: 30%;margin-right: 30%;" type="submit" id="button-addon2">Search</button>
</div>



</form>
@endguest


    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="/about">About The Free Education</a>


        </ul>
      </div>
      ©
    </nav>

    </body>
</html>
