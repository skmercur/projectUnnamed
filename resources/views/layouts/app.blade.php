<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Free Education</title>

    <!-- Scripts -->
  <script src="{{asset('assets/js/jquery.js')}}"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/headroom.min.js')}}"></script>
    <script src="{{asset('assets/js/argon.js')}}"></script>
  <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('assets/css/argon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nucleo.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.min.css" />

    <meta property="og:title" content ="Register on The Free Education"/>
    <meta property="og:image" content ="https://www.thefreeedu.com/assets/img/logo1.png"/>

    <style>
body{ margin:0px; padding:0px; font-family:helvetica; background:url(image.png); }

#wrapper{ text-align:center; margin:70px auto; }

#output_image{ width:200px; height:200px; border:4px solid #000; }
.container1 {
      max-width: 640px;
      margin: 20px auto;
    }
</style>



<script type='text/javascript'>

// function preview_image(event)
// {
//  var reader = new FileReader();
//  reader.onload = function()
//  {
//   var output = document.getElementById('output_image');
//   output.src = reader.result;
//  }
//  reader.readAsDataURL(event.target.files[0]);

</script>

</head>
<!-- <body style="background-image:url({{asset('assets/img/connectwork.png')}})"> -->
<body style="background-image:url({{asset('assets/img/doodles.png')}})" >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:black;">
                    The Free Education
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:black;">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color:black;">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:black;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.js"></script>
      <script type="text/javascript">
      function check(){
      if((document.getElementById("x").value >= 0) && (document.getElementById("y").value >= 0) && (  document.getElementById("w").value == document.getElementById("h").value) && (document.getElementById("h").value >0)){
      document.getElementById("useredit").submit();
      }else{
        document.getElementById("uploadbtn").disabled = true;
      }
      }
    function LaunchCropper() {
      var image = document.getElementById('output_image');
      var cropper = new Cropper(image, {
        dragMode: 'crop',
        aspectRatio: 1 / 1,
        autoCropArea: 0.65,
        restore: false,
        guides: false,
        center: true,
        highlight: false,
        cropBoxMovable: true,
        cropBoxResizable: true,
        toggleDragModeOnDblclick: false,
        crop(event) {
          document.getElementById("x").value = Math.ceil(event.detail.x);
          document.getElementById("y").value = Math.ceil(event.detail.y);
          document.getElementById("w").value = Math.ceil(event.detail.width);
          document.getElementById("h").value = Math.ceil(event.detail.height);
  if((document.getElementById("x").value >= 0) && (document.getElementById("y").value >= 0) && (  document.getElementById("w").value == document.getElementById("h").value) && (document.getElementById("h").value >0)){
        document.getElementById("uploadbtn").disabled = false;
  }else{
      document.getElementById("uploadbtn").disabled = true;
  }
  },
      });
    }
     </script>
</body>
</html>
