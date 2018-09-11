@extends('layouts.layout')


<style type="text/css">

.overlay {
    height: 100%;
    width: 100%;
    display: none;
    position: fixed !important ;
    z-index: 9999999999 !important;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);


}


.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
    cursor: pointer;
    color: white;
}

.overlay .closebtn:hover {
    color: #ccc;
}


/* Serche */

.overlay input[type="search"] {
  padding-top: 16%;
    width: 100%;
    color: rgb(255, 255, 255);
    background: rgba(0, 0, 0, 0);
    font-size: 60px;
    font-weight: 300;
    text-align: center;
    border: 0px;
    outline: none;
}

.overlay .close {
    position: fixed;
    top: 15px;
    right: 15px;
    color: #fff;
  background-color: limegreen;
  border-color: green;
  opacity: 1;
  padding: 10px 17px;
  font-size: 27px;
}


/* Serche */




/**
*Box-style
**/

.box {
    padding: 50px 30px;
    text-align: center;
    -webkit-box-shadow: 0 0 0 0 #ffffff;
    box-shadow: 0 0 0 0 #ffffff;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    border-radius: 5px;
    -webkit-transform: translateY(0);
    transform: translateY(0)
}

.box:hover {
    -webkit-box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1);
    box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    -webkit-transform: translateY(-5px);
    transform: translateY(-5px)
}

.box h4 {
    text-transform: uppercase;
}

.box .box-icon {
    height: 160px;
    margin-bottom: 20px;
}

.box .box-icon img {
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.box:hover .box-icon img {
    -webkit-filter: grayscale(0);
    filter: grayscale(0)
}

.timeline-cover{
  background: url("{{asset('assets/img/pexels-photo.jpg')}}") no-repeat;
  background-position: center;
  background-size: cover;
  min-height: 360px;
  border-radius: 0 0 4px 4px;
  position: relative;
}

/*Timeline Menu for Large Screens*/

.timeline-cover .timeline-nav-bar{
 
  width: 100%;
  position: relative;

}

.timeline-cover .timeline-nav-bar .profile-info{


  text-align: center;
  z-index: 999;
}

.timeline-cover .timeline-nav-bar .profile-info img.profile-photo{
  height: 200px;
  width: 200px;
  border-radius: 50%;
  border: 10px solid #fff;
}

.timeline-cover .timeline-nav-bar ul.profile-menu{
  margin: 0;
  display: table;
}

.timeline-cover .timeline-nav-bar .profile-menu li{
  display: table-cell;
  vertical-align: middle;
  padding: 15px 0;
}

.timeline-cover .timeline-nav-bar .profile-menu li a{
  color: #fff;
  padding: 15px;
  text-decoration: none;
}
.btn-circle.btn-xl {
  width: 100px;
  height: 100px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 75px;
}
</style>

@section('content')

    @guest


<div class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                  <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
                  <h3>Sarah Cruiz</h3>
                  <p class="text-muted">Creative Director</p>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="timeline.html" class="active">Timeline</a></li>
                  <li><a href="timeline-about.html">About</a></li>
                  <li><a href="timeline-album.html">Album</a></li>
                  <li><a href="timeline-friends.html">Friends</a></li>
                </ul>
                <ul class="follow-me list-inline">
                  <li>1,299 people following her</li>
                  <li><button class="btn-primary">Add Friend</button></li>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
              <h4>Sarah Cruiz</h4>
              <p class="text-muted">Creative Director</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="timline.html" class="active">Timeline</a></li>
                <li><a href="timeline-about.html">About</a></li>
                <li><a href="timeline-album.html">Album</a></li>
                <li><a href="timeline-friends.html">Friends</a></li>
              </ul>
              <button class="btn-primary">Add Friend</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>


    <form action="search" style="margin-top: 15px;" method="get">
     <div class="container">
        <div class="row">
        <div class="col-sm-12">
                <img src="{{asset('assets/img/logo1.png')}}" class="img-fluid" style="margin-left: auto;
  margin-right: auto;
  display: block;max-height: 260px;">
        </div>
      <div class="input-group mb-12 center">

          <div class="col-sm-12 col-xs-6">
                    <input name="q" type="text" id="navbarsearch1" onkeydown="readThat1()" placeholder="Search for documents" autocomplete="off" >
                    <input id="search_submit" value="Rechercher" type="submit">
         </div>
         <div class="col-sm-12" style="margin-top: 12vh;background-color:#FFF;">
                  <div id="countryList1" style="width:80%;float:left"></div>

            </div>


      </div>
       </div>
  </div>
  </form>

  <section style="margin-top: 4%;margin-bottom: 10%;" class="gray-bg section-padding" id="feature-page">
        <div class="container">

            <div class="row">

                          @foreach($spec as $s)



                              <div class="col-xs-12 col-sm-6 col-md-4">
                                  <a href="/search?new=<?php echo base64_encode(encrypt($s->namespi)); ?>">
                                  <div class="box">
                                        <div class="box-icon">
                                      <img src="assets/img/{{$s->imspi}}" alt="">
                                        </div>
                                      <h3>{{$s->namespi}}</h3>
                                      <ul  class="list-group" >
                                        <?php $i=1; ?>
                                      @foreach($s->files as $ss)
                                      <li class="list-group-item"><?php echo $i."- "; ?>{{$ss->title}}</li>
                                      <?php $i++; ?>
                                      @endforeach
                                      </ul>
                                  </div>

                                </a>
                              </div>
                          @endforeach
            </div>
        </div>
    </section>

@else





     
<div class="timeline-cover" >

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
          
   <div class="col-sm-12 fadeIn" >
                <img src="{{asset('assets/img/logo1white.png')}}" class="img-fluid animated fadeIn" style="margin-left: auto;
  margin-right: auto;
  display: block;max-height: 370px;">
        </div>
              <div class="col-md-12">
                <div class="profile-info">
                <button onclick="openSearch()" class="btn btn-default btn-circle btn-xl animated pulse infinite"><i class="fa fa-search"></i></button>

                </div>
                 
              </div>
               
             
       

            </div>
</div><!--Timeline Menu for Large Screens End-->

 
     <!--Timeline Menu for Small Screens End-->


<div id="myOverlay" class="animated zoomIn faster overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>

  <div class="container">
  <div class="row">
    <div class=" col-sm-12">
       <form action="usearch" method="get">
        
    <input name="q" type="search" id="navbarsearch" onkeydown="readThat()" placeholder="Search for people and documents" autocomplete="off" list="navbarsearchDataList" id="navbarsearch" >

      </div>

                <div class="col-sm-12 pre-scrollable" style="">
                       <div id="countryList"  style="">
                         
                       </div>

                  </div>

      <div class="col-sm-12">
    </div>

    </div>
        </form>
  </div>
</div>

</div>

</div>



 <section style="margin-top: 10%;margin-bottom: 10%;" class="gray-bg section-padding" id="feature-page">
        <div class="container">

            <div class="row">

            @foreach($spec as $s)

                <div class="animated zoomIn col-xs-12 col-sm-6 col-md-4">
                    <a href="/search?new=<?php echo base64_encode(encrypt($s->namespi)); ?>">
                    <div class="box">
                          <div class="box-icon">
                        <img src="assets/img/{{$s->imspi}}" alt="">
                          </div>
                        <h3>{{$s->namespi}}</h3>
                        <ul  class="list-group" >
                          <?php $i=1; ?>
                        @foreach($s->files as $ss)

                        <li class="list-group-item"><?php echo $i."- "; ?>{{$ss->title}}</li>
                        <?php $i++; ?>
                        @endforeach
                        </ul>
                    </div>

                  </a>
                </div>
            @endforeach
            </div>
        </div>
    </section>
 
<script>

function openSearch() {
    document.getElementById("myOverlay").style.display = "block";
}

function closeSearch() {
    document.getElementById("myOverlay").style.display = "none";
}
</script>



@endguest
@endsection
