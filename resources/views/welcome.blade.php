@extends('layouts.layout')


<style type="text/css">
  input[type="text"] {
  height: 60px;
  font-size: 30px;
  display: inline-block;
  font-family: "Lato";
  font-weight: 100;
  border: none;
  outline: none;
  color: black;
  padding: 3px;
  padding-right: 60px;
  width: 0px;
  position: absolute;
  top: 0;
  right: 20%;
  background: none;
  z-index: 3;
  transition: width .4s cubic-bezier(0.000, 0.795, 0.000, 1.000);
  cursor: pointer;
}

input[type="text"]:focus:hover {
  border-bottom: 1px solid #BBB;
}

input[type="text"]:focus {
  width: 70%;
  margin-left: auto;
  z-index: 1;
  border-bottom: 1px solid #BBB;
  cursor: text;
}
input[type="submit"] {
  height: 67px;
  width: 63px;
  display: inline-block;
  color:red;
  float: right;
  background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAADNQTFRFU1NT9fX1lJSUXl5e1dXVfn5+c3Nz6urqv7+/tLS0iYmJqampn5+fysrK39/faWlp////Vi4ZywAAABF0Uk5T/////////////////////wAlrZliAAABLklEQVR42rSWWRbDIAhFHeOUtN3/ags1zaA4cHrKZ8JFRHwoXkwTvwGP1Qo0bYObAPwiLmbNAHBWFBZlD9j0JxflDViIObNHG/Do8PRHTJk0TezAhv7qloK0JJEBh+F8+U/hopIELOWfiZUCDOZD1RADOQKA75oq4cvVkcT+OdHnqqpQCITWAjnWVgGQUWz12lJuGwGoaWgBKzRVBcCypgUkOAoWgBX/L0CmxN40u6xwcIJ1cOzWYDffp3axsQOyvdkXiH9FKRFwPRHYZUaXMgPLeiW7QhbDRciyLXJaKheCuLbiVoqx1DVRyH26yb0hsuoOFEPsoz+BVE0MRlZNjGZcRQyHYkmMp2hBTIzdkzCTc/pLqOnBrk7/yZdAOq/q5NPBH1f7x7fGP4C3AAMAQrhzX9zhcGsAAAAASUVORK5CYII=) center center no-repeat;
  text-indent: -10000px;
  border: none;
  position: absolute;
  top: 0;
  right: 20%;
  z-index: 2;
  cursor: pointer;
  opacity: 1;
  cursor: pointer;
  transition: opacity .4s ease;
}

input[type="submit"]:hover {
  opacity: 0.8;
}
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

</style>

@section('content')

    @guest
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
            <?php $o=0; ?>
            @foreach($spec as $s)
                <?php $o++; ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <a href="/search?new=<?php echo base64_encode(encrypt($s->namespi)); ?>">
                    <div class="box">
                          <div class="box-icon">
                          <img src="assets/img/portfolio-icon-<?php echo $o ?>.png" alt="">
                        <h3>{{$s->namespi}}</h3>

                    </div>
                </div>
              </a>
              </div>
            @endforeach
            </div>
        </div>
    </section>

@else

    <form action="usearch" style="margin-top: 15px;" method="get">
     <div class="container">
        <div class="row">
        <div class="col-sm-12">
                <img src="{{asset('assets/img/logo1.png')}}" class="img-fluid" style="margin-left: auto;
  margin-right: auto;
  display: block;max-height: 260px;">
        </div>

       <div class="input-group mb-12 center">



  <div class="row">
      <div class="col-xs-8 center-block">
            <div class="col-xs-6">

                    <input  name="q" type="text" id="navbarsearch" onkeydown="readThat()" placeholder="Search for people and documents" autocomplete="off" list="navbarsearchDataList" id="navbarsearch" >

                    <input id="search_submit" value="Rechercher" type="submit">
            </div>

     </div>

  </div>




        </div>
         <div class="col-sm-12" style="margin-top: 12vh;background-color:#FFF;">
                  <div id="countryList" style="width:80%;float:left"></div>

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

@endguest
@endsection
