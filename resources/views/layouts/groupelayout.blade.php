<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>The Free Education|Groupe</title>

    <!-- Stylesheets
    ================================================= -->
		
    <link rel="stylesheet" href="{{asset('assets/groupe/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/groupe/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/all.css')}}">	
    <link rel="stylesheet" href="{{asset('assets/groupe/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('assets/groupe/css/font-awesome.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/css/selectpage.css')}}">
    
    
    
	</head>

    <body style="background-image: url({{asset('/assets/img/doodles.png')}});">    
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
                                    <a class="dropdown-item" href="/groupcreator" style="color:black;">Create a groupe</a>

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


      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>


       @endguest
  </div>
</nav>
    @yield('content')

     
    
	</body>
       <!-- Scripts
    ================================================= -->
    <script src="{{asset('assets/groupe/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/selectpage.min.js')}}"></script>
    <script src="{{asset('assets/groupe/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/groupe/js/jquery.appear.min.js')}}"></script>
        <script src="{{asset('assets/groupe/js/jquery.incremental-counter.js')}}"></script>
    <script src="{{asset('assets/groupe/js/script.js')}}"></script>
</html>
