<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Free Education</title>
    <meta name="keywords" content="Free,Education,Files,People" />
<meta name="description" content="The Free Education is a free website where you can share and learn new things with people from the world" />
    <!-- Scripts -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" type="text/javascript"> </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" type="text/javascript"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" type="text/javascript"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('assets/js/jquery.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/iziToast.min.js') }}" type="text/javascript"></script>

  <script src="{{asset('assets/js/headroom.min.js')}}"></script>

 <script src="{{asset('assets/js/argon.js')}}"></script>






 <script src="{{asset('js/yback.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- icons -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" >

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link href="{{ asset('assets/css/simple-sidebar.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/argon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/floating_button.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}" > -->
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
<!-- <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}" >
<link rel="stylesheet" href="{{ asset('assets/css/notifications.css') }}" > -->
  <link href="{{ asset('css/all.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet">
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.min.css" />


<script type="text/javascript" src="{{asset('js/notifications.js')}}"></script>


@if(!empty($user->username))

<meta property="og:title" content ="{{$user->firstname}}, profile on The Free Education"/>
<meta property="og:image" content ="https://www.thefreeedu.com/assets/img/logo1.png"/>
<meta property="og:description" content ="{{$user->bio}}"/>

@endif
@if(!empty(Request::query('share')))
@if(!empty($resault->title))
<meta property="og:title" content ="{{$resault->title}}"/>
<meta property="og:image" content ="https://www.thefreeedu.com/assets/img/logo1.png"/>
<meta property="og:description" content ="{{$resault->description}}"/>
@endif
@endif
</head>
<script>
$("#main").click(function() {
  $("#mini-fab").toggleClass('hidden');
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
$.material.init();
</script>

<body style="background-image:url({{asset('assets/img/doodles.png')}})">







<script>
        $(document).ready(function() {

             var navoffeset=$(".header-main").offset().top;
             $(window).scroll(function(){
                var scrollpos=$(window).scrollTop();
                if(scrollpos >=navoffeset){
                    $(".header-main").addClass("fixed");
                }else{
                    $(".header-main").removeClass("fixed");
                }
             });

        });
        </script>




<!-- -->









<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-top: -0.25%;">
    <div class="header-left">
                            <div class="logo-name text-white">
                                    <a href="/"> <h1>The Free Education</h1>
                                    <!--<img  class="rounded-circle" id="logo" height="120" src="{{asset('assets/img/logo1.png')}}" alt="Logo"/>-->
                                  </a>
                            </div>
                            <!--search-box-->

                         </div>

  <!--<a class="navbar-brand mb-0 h1" href="/">The Free Education</a>-->

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
 <ul class="navbar-nav ml-auto mt-2 mt-lg-0" >
       <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:white;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:white;" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>

                            <form method="post" id="theFormNoti">
                              <input type="hidden" name="_token" value="{{csrf_token()}}" />

                              <input type="hidden" name="searchV" id="searchV" value=""/>
                            </form>

                        @else

<!--
      <li class="header-right profile_details_left dropdown head-dpdn">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="notification_header">
                                                    <h3>You have 3 new messages</h3>
                                                </div>
                                            </li>
                                            <li><a href="#">
                                               <div class="user_img"><img src="images/p4.png" alt=""></div>
                                               <div class="notification_desc">
                                                <p>Lorem ipsum dolor</p>
                                                <p><span>1 hour ago</span></p>
                                                </div>
                                               <div class="clearfix"></div>
                                            </a></li>


                                            <li>
                                                <div class="notification_bottom">
                                                    <a href="#">See all messages</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                            -->


                            <form method="post" id="theFormNoti">
                              <input type="hidden" name="_token" value="{{csrf_token()}}" />
                              <input type="hidden" name="code" value="<?php

   $code = base64_encode(encrypt(Auth::user()->code));
echo $code;
                                ?>" />
                              <input type="hidden" name="username" value="<?php
echo base64_encode(encrypt(Auth::user()->username));
                               ?>
                              " />
                              <input type="hidden" name="searchV" id="searchV" value=""/>
                            </form>
                            <div class="btn-group">
         <li class="header-right profile_details_left dropdown head-dpdn" style="margin-right:5px;">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" onclick="getNotifi()"><i class="fa fa-bell"></i><span id="numberNoti" class="badge blue" style="position:absolute;left:auto;top:auto">0</span></a>
                                        <ul class="dropdown-menu" id="notifications">
                                            <li>
                                                <div class="notification_header">
                                                    <h3>Your notification</h3>
                                                </div>
                                            </li>

                                        </ul>
                                    </li>

           <!--  <li class="header-right profile_details_left dropdown head-dpdn">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">9</span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="notification_header">
                                                    <h3>You have 8 pending task</h3>
                                                </div>
                                            </li>
                                            <li><a href="#">
                                                <div class="task-info">
                                                    <span class="task-desc">Database update</span><span class="percentage">40%</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="progress progress-striped active">
                                                    <div class="bar yellow" style="width:40%;"></div>
                                                </div>
                                            </a></li>


                                            <li>
                                                <div class="notification_bottom">
                                                    <a href="#">See all pending tasks</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
 -->











                        <li class="nav-item dropdown">
                <div class="card-profile-image">
                  <a href="/{{ Auth::user()->username}}">
                    <img class="rounded-circle" src="{{ URL::to(Auth::user()->imgpath)}}" alt="" style="background-color: white;  height: 40px;">
                  </a>
                </div>


                        </li>
</div>

                           <li class="nav-item dropdown">

                               <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->firstname}} <span class="caret"></span>
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
<script type="text/javascript">

        function readThat1(){

                     var query = document.getElementById('navbarsearch1').value;
                     document.getElementById('searchV').value = document.getElementById('navbarsearch1').value;
                       var form = $("#theFormNoti");
                     if(query != '')
                     {
                       $.ajaxSetup({
                         headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                     });
                          $.ajax({
                               url:"/getsugg1",
                               method:"POST",
                              data:form.serialize(),
                               success:function(output)
                               {

                                    $('#countryList1').fadeIn();
                                    $('#countryList1').html(output);
                               }
                          });
                     }

                $(document).on('click', 'li', function(){
                     $('#navbarsearch1').val($(this).text());
                     $('#countryList1').fadeOut();
                });
              }
</script>
    @else
    <script type="text/javascript">
  function readThat(){

               var query = document.getElementById('navbarsearch').value;
               document.getElementById('searchV').value = document.getElementById('navbarsearch').value;
                 var form = $("#theFormNoti");
               if(query != '')
               {
                 $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
                    $.ajax({
                         url:"/getsugg",
                         method:"POST",
                        data:form.serialize(),
                         success:function(output)
                         {

                              $('#countryList').fadeIn();
                              $('#countryList').html(output);
                         }
                    });
               }

          $(document).on('click', 'li', function(){
               $('#navbarsearch').val($(this).text());
               $('#countryList').fadeOut();
          });
        }







     </script>
    <form class="form-inline my-2 my-lg-0 justify-content-center" method="get" action="usearch">
      <input class="form-control mr-sm-2"    type="search"  placeholder="Search" autocomplete="off" name="q">

</input>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.js"></script>
  <script type="text/javascript">
  function check(){
  if((document.getElementById("x").value >= 0) && (document.getElementById("y").value >= 0) && (  document.getElementById("w").value == document.getElementById("h").value) && (document.getElementById("h").value >0)){
document.getElementById("useredit").submit();
  }else{
    alert('Error while cropping please try again');
  }
}
function LaunchCropper() {
  var image = document.getElementById('output_image');
  var button =  document.getElementById('edit_btn');
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


},
  });
}
 </script>
<!-- data table -->

<script src="{{asset('assets/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/DataTables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/DataTables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/DataTables/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/DataTables/jszip.min.js')}}"></script>
<script src="{{asset('assets/DataTables/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/DataTables/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/DataTables/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/DataTables/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/DataTables/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/DataTables/datatables-init.js')}}"></script>
<!-- data tabel -->

</html>
