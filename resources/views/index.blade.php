@extends('layouts.layout')

@section('content')

<div style="margin-top: 6em;" class="section" id="carousel">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 ml-auto mr-auto">
							<div class="card page-carousel">
								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								    <ol class="carousel-indicators">
    								    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    								    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    								    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
												<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
												<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
													<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>

								    </ol>
                                    <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="moving-clouds d-block img-fluid" src="{{asset('assets/img/01.jpg')}} " alt="First slide">
                                    	<div class="carousel-caption d-none d-md-block">
                                      <!-- /header-text -->
                                     <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h1 style=" font-family: lato; font-size: 30pt;" >
                              Welcome to The Free Education
                            </h1>
                            <br>
                            <h4>
                              <span>The Free Education is the right place where you can share your knowledge with the world and you can learn from other people on The Free Education</span>
															  <span>All accounts and files are monitored by The Free Education team to ensure you security</span>

                            </h4>
															<span><small style="color:black;">We are also counting on you to help us make The Free Education a better place</small><span>
                            <br>
                             <div class="btn-wrapper">
              <!-- <a href="./examples/login.html" class="btn btn-success">Login Page</a>
              <a href="./examples/register.html" class="btn btn-white">Register Page</a> -->
            </div>
                        </div>
                    </div><!-- /header-text -->
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="moving-clouds d-block img-fluid" src="{{asset('assets/img/01.jpg')}}" alt="Second slide">
                                    	<div class="carousel-caption d-none d-md-block">
                                    	  <!-- /header-text -->
                                     <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>First step in The Free Education <br>
                                 </span>
                            </h2>
                            <br>
                            <h3>
                              <span>Would you like to proceed with this tutorial to learn how to add a file on The Free Education ? </span>
                            </h3>
                            <br>
                               <div class="btn-wrapper">
              <!-- <a href="./examples/login.html" class="btn btn-success">Login Page</a>
              <a href="./examples/register.html" class="btn btn-white">Register Page</a> -->
							  <a href="/" class="btn btn-warning">Skip</a>
            </div>
                        </div>
                    </div><!-- /header-text -->
                                    	</div>
                                    </div>
                                    <!-- <div class="carousel-item">
                                        <img class="d-block img-fluid" src="{{asset('assets/img/01.jpg')}}" alt="Third slide">
                                    	<div class="carousel-caption d-none d-md-block">
                                    	 <!-- /header-text -->

        <!-- <div class="row row-grid justify-content-between align-items-center">
          <div class="col-lg-6">
            <h2 class="display-2 text-black">A <strong>Beautiful</strong> Design System
              <span class="text-black">You can registre or login if you have already an account</span>
            </h2>

            <div class="btn-wrapper">
              <a href="./examples/login.html" class="btn btn-success">Login Page</a>
              <a href="./examples/register.html" class="btn btn-white">Register Page</a>
            </div>
          </div>
          <div class="col-lg-5 mb-lg-auto">
            <div class="transform-perspective-right">
              <div class="card bg-secondary shadow border-0">

                <div class="card-body px-lg-5 py-lg-5">
                  <div class="text-center text-muted mb-4">
                    <small>Or sign in with credentials</small>
                  </div>
                  <form role="form">
                    <div class="form-group mb-3">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Email" type="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Password" type="password">
                      </div>
                    </div>
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id=" customCheckLogin2" type="checkbox">
                      <label class="custom-control-label" for=" customCheckLogin2">
                        <span>Remember me</span>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="button" class="btn btn-primary my-4">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      <!-- /header-text -->


			<div class="carousel-item">
					<img class="moving-clouds d-block img-fluid" src="{{asset('assets/img/01.jpg')}}" alt="third slide">
				<div class="carousel-caption d-none d-md-block">
					<!-- /header-text -->
			 <div class="header-text hidden-xs">
			<div class="col-md-12 text-center">
			<h3>
			<span>Once you are logged in on The Free Education
				click on profile image to go to your profile
			</span>
		</h3>
			<br>
			<img src="{{asset('assets/img/slides/slide1.png')}}" style="max-height:200px" />
			<br>
			<div class="btn-wrapper">
			<!-- <a href="./examples/login.html" class="btn btn-success">Login Page</a>
			<a href="./examples/register.html" class="btn btn-white">Register Page</a> -->

			</div>
			</div>
			</div><!-- /header-text -->
				</div>
			</div>

			<div class="carousel-item">
					<img class="moving-clouds d-block img-fluid" src="{{asset('assets/img/01.jpg')}}" alt="fourth slide">
				<div class="carousel-caption d-none d-md-block">
					<!-- /header-text -->
			 <div class="header-text hidden-xs">
			<div class="col-md-12 text-center">
			<h3>
			<span>Now click on the button as shown on the picture
			</span>
		</h3>
			<br>
			<img src="{{asset('assets/img/slides/slide2.png')}}" style="max-height:200px" />
			<br>
			<div class="btn-wrapper">
			<!-- <a href="./examples/login.html" class="btn btn-success">Login Page</a>
			<a href="./examples/register.html" class="btn btn-white">Register Page</a> -->

			</div>
			</div>
			</div><!-- /header-text -->
				</div>
			</div>
			<div class="carousel-item">
					<img class="moving-clouds d-block img-fluid" src="{{asset('assets/img/01.jpg')}}" alt="fifth slide">
				<div class="carousel-caption d-none d-md-block">
					<!-- /header-text -->
			 <div class="header-text hidden-xs">
			<div class="col-md-12">


<div class="container">
    <div class="row">
        <div class="col-xs-6">

				<ol style="color:black; margin-right:1%" >
  <li >Type carfully the Title and description of your file</li>
  <li >and then click on the select file to select your file</li>
  <li >Then click on upload</li>
</ol>

	</div>
	<div class="col-xs-6">
			<img src="{{asset('assets/img/slides/slide3.png')}}" style="max-height:300px" />
		</div>
	</div>
</div>
			<br>
			<div class="btn-wrapper">
			<!-- <a href="./examples/login.html" class="btn btn-success">Login Page</a>
			<a href="./examples/register.html" class="btn btn-white">Register Page</a> -->

			</div>
			</div>
			</div><!-- /header-text -->
				</div>
			</div>

			<div class="carousel-item">
					<img class="moving-clouds d-block img-fluid" src="{{asset('assets/img/01.jpg')}}" alt="seventh slide">
				<div class="carousel-caption d-none d-md-block">
					<!-- /header-text -->
			 <div class="header-text hidden-xs">
			<div class="col-md-12">
<h3>Congratulation you have learned how to add a file on The Free Education now click on the button below to begin </h3>

			<div class="btn-wrapper">
			<!-- <a href="./examples/login.html" class="btn btn-success">Login Page</a> -->
			<a href="/" class="btn btn-white">Start</a>

			</div>
			</div>
			</div><!-- /header-text -->
				</div>
			</div>


                                    	</div>
                                    </div>
                                    </div>

                                    <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="fa fa-angle-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="fa fa-angle-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



@endsection
