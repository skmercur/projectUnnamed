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
<style type="text/css">
/*--header main start here--*/
.page-container {
  min-width: 1260px;
  position: relative;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  margin: 0px auto;
}
.left-content {
    float: right;
        width: 86.5%;
}
.page-container.sidebar-collapsed {
  transition: all 100ms linear;
  transition-delay: 300ms;

}
.page-container.sidebar-collapsed .left-content {
   float: right;
   width: 96%;
}
.page-container.sidebar-collapsed-back {
    transition: all 100ms linear;
}
.page-container.sidebar-collapsed-back .left-content {
  transition: all 100ms linear;
  -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    transition: all 0.3s ease;
    float: right;
    width:86%;
}
.page-container.sidebar-collapsed .sidebar-menu {
  width: 65px;
  transition: all 100ms ease-in-out;
  transition-delay: 300ms;
}

.page-container.sidebar-collapsed-back .sidebar-menu {
  width: 230px;
  transition: all 100ms ease-in-out;
}

.page-container.sidebar-collapsed .sidebar-icon {
   transition: all 300ms ease-in-out;
       color: #fff;
    background:#68AE00;

}
.page-container.sidebar-collapsed .logo {
  box-sizing: border-box;
  transition: all 100ms ease-in-out;
  transition-delay: 300ms;
      left: 18px;
    
}
.page-container.sidebar-collapsed-back .logo {
  width: 100%;
  height:60px;
  box-sizing: border-box;
  transition: all 100ms ease-in-out;
}

.page-container.sidebar-collapsed #logo {
    opacity: 0;
    transition: all 200ms ease-in-out;
    display: none;
}
.page-container.sidebar-collapsed .down {
    display: none;
}
.page-container.sidebar-collapsed-back #logo {
  opacity: 1;
  transition: all 200ms ease-in-out;
  transition-delay: 300ms;
}

.page-container.sidebar-collapsed #menu span {
  opacity: 0;
  transition: all 50ms linear;
  
}

.page-container.sidebar-collapsed-back #menu span {
  opacity: 1;
  transition: all 200ms linear;
  transition-delay: 300ms;
}
.sidebar-menu {
  position: absolute;
  float: left;
  width: 220px;
  top: 0px;
  left:0px;
  bottom: 0;
  background-color:#202121;
  color: #aaabae;
  z-index: 999;
}
#menu {
  list-style: none;
  margin: 0;
  padding: 0;
  margin-bottom: 20px;
}
#menu li {
  position: relative;
  margin: 0;
  font-size: 12px;
  padding: 0;
}
#menu li ul {
  opacity: 0;
  height: 0px;
}
#menu li a {
    position: relative;
    display: block;
    padding: 13px 20px;
    color: #FFFFFF;
    white-space: nowrap;
    z-index: 2;
    font-size: 1.12em;
        text-align: center;
    font-family: 'Carrois Gothic', sans-serif;
}
#menu li a:hover {
  color:#fdbb30;
  transition: color 250ms ease-in-out, background-color 250ms ease-in-out;
}
#menu li.active > a {
  background-color: #2b303a;
  color: #ffffff;
}
#menu ul li { background-color:#202121; }
#menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
#menu li ul {
  position: absolute;
  visibility: hidden;
  left: 100%;
  top: 20px;
  background-color: #2b303a;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
  opacity: 0;
  transition: opacity 0.1s linear;
  border-top: 1px solid rgba(69, 74, 84, 0.7);
}
#menu li:hover > ul {
  visibility: visible;
  opacity: 1;
}
#menu li li ul {
  right: 100%;
  visibility: hidden;
  top: -1px;
  opacity: 0;
  transition: opacity 0.1s linear;
}
#menu li li:hover ul {
  visibility: visible;
  opacity: 1;
}
#menu .fa {
    margin-bottom: 10px;
    font-size: 1.5em;
    display: block;
}
.menu {
    padding:4.2em 0em 0em 0em;
}
/*----*/
.page-container.sidebar-collapsed .left-content .fixed {
    width: 97%;
}
/*----*/
.logo {
  width:22%;
  box-sizing: border-box;
  position: absolute;
   top: 20px;
   left: 170px;
}
.sidebar-icon {
    position: relative;
    float: left;
    text-align: center;
    line-height: 1;
    font-size: 18px;
    padding: 6px 8px;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius:3px;
    -o-border-radius:3px;
    color: #FFF;
    background-clip: padding-box;
    background:#68AE00;
}
.sidebar-icon:hover{
     color: #FFF;
}
.fa-html5 {
  color: #fff;
  margin-left: 50px;
}
/*--nav strip start here--*/
.header-main {
    background:#fff;
    padding: 1em 2em;
    box-shadow: 0 1px 3px rgba(0,0,0,0.15);
}
.header-right {
    float: right;
    width: 50%;
}
.header-left {
    float: left;
    width: 45%;
}
.logo-name {

    /*background-color: white;*/
    position: absolute;
    border-radius: 50%;
    float: left;
    margin: -1% 0% 0% 0%;
    /* width: 30%; */
}
.logo-name h1 {
    font-size: 15pt;
    color: white;
    
    font-weight: 700;
    text-decoration: none;
}
.logo-name  h1 a{
     color: white;
}
.logo-name a {
    display:inline-block;
}
.nav > li > a:hover, .nav > li > a:focus {
    background: none !important;
}
span.logo-clr{
    color:#fdbb30;
}
.page-container.sidebar-collapsed-back #menu span.fa.fa-angle-right{
    position: absolute;
    top: 0px;
    right: 20px;
}

/*--- Progress Bar ----*/
.meter {
    position: relative;
}
.meter > span {
    display: block;
    height: 100%;
       
    position: relative;
    overflow: hidden;
}
.meter > span:after, .animate > span > span {
    content: "";
    position: absolute;
    top: 0; left: 0; bottom: 0; right: 0;
    
    overflow: hidden;
}

.animate > span:after {
    display: none;
}

@-webkit-keyframes move {
    0% {
       background-position: 0 0;
    }
    100% {
       background-position: 50px 50px;
    }
}

@-moz-keyframes move {
    0% {
       background-position: 0 0;
    }
    100% {
       background-position: 50px 50px;
    }
}

.red > span {
    background-color: #65CEA7;
}

.nostripes > span > span, .nostripes > span:after {
    -webkit-animation: none;
    -moz-animation: none;
    background-image: none;
}
/*--- User Panel---*/
.profile_details_left {
    float: left;
        width: 50%;
}
.dropdown-menu {
    box-shadow: 2px 3px 4px rgba(0, 0, 0, .175);
    -webkit-box-shadow: 2px 3px 4px rgba(0, 0, 0, .175);
    -moz-box-shadow: 2px 3px 4px rgba(0, 0, 0, .175);
    border-radius: 0;
}
li.dropdown.head-dpdn {
    display: inline-block;
    padding: 1em 0;    
    float: left;
}
li.dropdown.head-dpdn a.dropdown-toggle {
   margin: 0.5em 1em;
}
ul.dropdown-menu li {
    margin-left: 0;
    width: 100%;
    padding: 0;
    background: #fff;
}
.user-panel-top ul{
    padding-left:0;
}
.user-panel-top li{
    float:left;
    margin-left:15px;
    position:relative;
}
.user-panel-top li span.digit{
    font-size:11px;
    font-weight:bold;
    color:#FFF;
    background:#e64c65;
    line-height:20px;
    width:20px;
    height:20px;
    border-radius:2em;
    -webkit-border-radius:2em;
    -moz-border-radius:2em;
    -o-border-radius:2em;   
    text-align:center;
    display: inline-block;
    position: absolute;
    top: -3px;
    right: -10px;
}
.user-panel-top li:first-child{
    margin-left:0;
}
.sidebar .nav-second-level li a.active ,.sidebar ul li a.active{
    color: #F2B33F;
}
li.active a i, .act a i {
    color: #F2B33F;
}
.custom-nav > li.act > a, .custom-nav > li.act > a:hover, .custom-nav > li.act > a:focus {
    background-color: #353f4f;
    color:#8BC34A;
}
.user-panel-top li a{
    display: block;
    padding: 5px;
    text-decoration:none;
}
.header-right i.fa.fa-envelope{
    color:rgb(255, 255, 255);
}
i.fa.fa-bell{
    color:rgb(255, 255, 255);
}
i.fa.fa-tasks{
    color:rgb(255, 255, 255);
}
.user-panel-top li a:hover{
    border-color:rgba(101, 124, 153, 0.93);
}
.user-panel-top li a i{
    width:24px;
    height:24px;
    display: block;
    text-align:center;
    line-height:25px;
}
.user-panel-top li a i span{
    font-size:15px;
    color:#FFF;
}
.user-panel-top li a.user{
    background:#667686;
}
.user-panel-top li span.green{
    background:#a88add;
}
.user-panel-top li span.red{
    background:#b8c9f1;
}
.user-panel-top li span.yellow{
    background:#bdc3c7;
}
/***** Messages *************/
.notification_header{
    background-color:#FAFAFA;
    padding: 10px 15px;
    border-bottom:1px solid rgba(0, 0, 0, 0.05);
    margin-bottom: 8px;
}
.notification_header h3{    
    color:#6A6A6A;
    font-size:12px;
    font-weight:600;
    margin:0;
}
.notification_bottom {
    background-color:rgba(93, 90, 88, 0.07);
    padding: 4px 0;
    text-align: center;
    margin-top: 5px;
}
.notification_bottom a {
    color: #6F6F6F;
     font-size: 1em;
}
.notification_bottom a:hover {
    color:#6164C1;
}
.notification_bottom h3 a{  
    color: #717171;
    font-size:12px;
    border-radius:0;
    border:none;
    padding:0;
    text-align:center;
}
.notification_bottom h3 a:hover{    
    color:#4A4A4A;
    text-decoration:underline;
    background:none;
}
.user_img{
    float:left;
    width:19%;
}
.user_img img{
    max-width:100%;
    display:block;
    border-radius:2em;
    -webkit-border-radius:2em;
    -moz-border-radius:2em;
    -o-border-radius:2em;
}
.notification_desc{
    float:left;
    width:70%;
    margin-left:5%;
}
.notification_desc p{
    color:#757575;
    font-size:13px;
    padding:2px 0;
}
.wrapper-dropdown-2 .dropdown li a:hover .notification_desc p{
    color:#424242;
}
.notification_desc p span{
    color:#979797 !important;
    font-size:11px;
}
/*---bages---*/
.header-right span.badge {
    font-size: 10px;
    font-weight: bold;
    color: #FFF;
    background:#FC8213;
    line-height: 10px;
    width: 15px;
    height: 15px;
    border-radius: 2em;
    -webkit-border-radius: 2em;
    -moz-border-radius: 2em;
    -o-border-radius: 2em;
    text-align: center;
    display: inline-block;
    position: absolute;
        top: 20%;
    padding: 2px 0 0;
    left: 54%;
}
.header-right span.blue{
    background-color:#337AB7;
}
.header-right span.red{
    background-color:#ef553a;
}
.header-right span.blue1{
    background-color:#68AE00;
}
i.icon_1{
  float: left;
  color: #00aced;
  line-height: 2em;
  margin-right: 1em;
}
i.icon_2{
  float: left;
  color:#ef553a;
  line-height: 2em;
  margin-right: 1em;
  font-size: 20px;
}
i.icon_3{
  float: left;
  color:#9358ac;
  line-height: 2em;
  margin-right: 1em;
  font-size: 20px;
}
.avatar_left {
  float: left;
}
i.icon_4{
  width: 45px;
  height: 45px;
  background: #F44336;
  float: left;
  color: #fff;
  text-align: center;
  font-size: 1.5em;
  line-height: 44px;
  font-style: normal;
  margin-right: 1em;
}
i.icon_5{
  background-color: #3949ab;
}
i.icon_6{
  background-color: #03a9f4;
}
.blue-text {
  color: #2196F3 !important;
  float:right;
}
/*---//bages---*/
/*--Progress bars--*/
.progress {
    height: 10px;
    margin: 7px 0;
    overflow: hidden;
    background: #e1e1e1;
    z-index: 1;
    cursor: pointer;
}
.task-info .percentage{
    float:right;
    height:inherit;
    line-height:inherit;
}
.task-desc{
    font-size:12px;
}
.wrapper-dropdown-3 .dropdown li a:hover span.task-desc {
    color:#65cea7;
}
.progress .bar {
        z-index: 2;
        height:15px; 
        font-size: 12px;
        color: white;
        text-align: center;
        float:left;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        -ms-box-sizing: content-box;
        box-sizing: content-box;
        -webkit-transition: width 0.6s ease;
          -moz-transition: width 0.6s ease;
          -o-transition: width 0.6s ease;
          transition: width 0.6s ease;
    }
.progress-striped .yellow{
    background:#f0ad4e;
} 
.progress-striped .green{
    background:#5cb85c;
} 
.progress-striped .light-blue{
    background:#4F52BA;
} 
.progress-striped .red{
    background:#d9534f;
} 
.progress-striped .blue{
    background:#428bca;
} 
.progress-striped .orange {
    background:#e94e02;
}
.progress-striped .bar {
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  -webkit-background-size: 40px 40px;
  -moz-background-size: 40px 40px;
  -o-background-size: 40px 40px;
  background-size: 40px 40px;
}
.progress.active .bar {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
  -moz-animation: progress-bar-stripes 2s linear infinite;
  -ms-animation: progress-bar-stripes 2s linear infinite;
  -o-animation: progress-bar-stripes 2s linear infinite;
  animation: progress-bar-stripes 2s linear infinite;
}
@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@-moz-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@-ms-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@-o-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
@keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
/*--Progress bars--*/
/********* profile details **********/
ul.dropdown-menu.drp-mnu i.fa {
    margin-right: 0.5em;
}
ul.dropdown-menu {
    padding: 0;
    min-width: 230px;
    top:101%;
}
.dropdown-menu > li > a {
    padding: 3px 15px;
    font-size: 1em;
}
.profile_details {
    float: right;
}
.profile_details_drop .fa.fa-angle-up{
    display:none;
}
.profile_details_drop.open .fa.fa-angle-up{
    display:block;
}
.profile_details_drop.open .fa.fa-angle-down{
    display:none;
}
.profile_details_drop a.dropdown-toggle {
    display:block;
    padding:0em 3em 0 1em;
}
.profile_img span.prfil-img{
    float:left;
}
.user-name{
     float:left;
     margin-top:7px;
     margin-left:11px;
     height:35px;
}
.profile_details ul li{
    list-style-type:none;
    position:relative;
}
.profile_details li a i.fa.lnr {
    position: absolute;
    top: 34%;
    right: 8%;
    color: #68AE00;
    font-size: 1.6em;
}
.profile_details ul li ul.dropdown-menu.drp-mnu {
    padding: 1em;
    min-width: 190px;
    top: 122%;
    left:0%;
}
ul.dropdown-menu.drp-mnu li {
    list-style-type: none;
    padding: 3px 0;
}
.user-name p{
    font-size:1em;
    color:#FC8213;
    line-height:1em;
    font-weight:700;
}
.user-name span {
    font-size: .75em;
    font-style: italic;
    color: #424f63;
    font-weight: normal;
    margin-top: .3em;
}
.profile_details ul {
    padding: 0px;
}

</style>



</head>

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









<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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

         <li class="header-right profile_details_left dropdown head-dpdn">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="notification_header">
                                                    <h3>You have 3 new notification</h3>
                                                </div>
                                            </li>
                                            <li><a href="#">
                                                <div class="user_img"><img src="images/p5.png" alt=""></div>
                                               <div class="notification_desc">
                                                <p>Lorem ipsum dolor</p>
                                                <p><span>1 hour ago</span></p>
                                                </div>
                                              <div class="clearfix"></div>  
                                             </a></li>
                                   
                                             <li>
                                                <div class="notification_bottom">
                                                    <a href="#">See all notifications</a>
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
