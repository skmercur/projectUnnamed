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
								    </ol>
                                    <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="moving-clouds d-block img-fluid" src="{{asset('assets/img/01.jpg')}} " alt="First slide">
                                    	<div class="carousel-caption d-none d-md-block">
                                      <!-- /header-text -->
                                     <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h1 style=" font-family: lato; font-size: 72pt;" >
                                <span>Do You <strong>need</strong> Any <strong>Files</strong> ? </span>
                            </h1>
                            <br>
                            <h3>
                              <span>The free edu is companies specialiser on sharing data between student and none students  </span>
                            </h3>
                            <br>
                             <div class="btn-wrapper">
              <a href="./examples/login.html" class="btn btn-success">Login Page</a>
              <a href="./examples/register.html" class="btn btn-white">Register Page</a>
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
                                <span>You can registre <br>
                                login if you have already an account </span>
                            </h2>
                            <br>
                            <h3>
                              <span>The free edu is companies specialiser on sharing data between student and none students  </span>
                            </h3>
                            <br>
                               <div class="btn-wrapper">
              <a href="./examples/login.html" class="btn btn-success">Login Page</a>
              <a href="./examples/register.html" class="btn btn-white">Register Page</a>
            </div>
                        </div>
                    </div><!-- /header-text -->
                                    	</div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="{{asset('assets/img/01.jpg')}}" alt="Third slide">
                                    	<div class="carousel-caption d-none d-md-block">
                                    	 <!-- /header-text -->
                     
        <div class="row row-grid justify-content-between align-items-center">
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
        </div>
      <!-- /header-text -->
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

