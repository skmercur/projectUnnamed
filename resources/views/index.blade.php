@extends('layouts.layout')

@section('content')

<div style="z-index: -99; width: 100%; height: 50vh">
     <iframe frameborder="0" height="100%" width="100%"
       src="https://youtube.com/embed/fwLaEBPB5fw?autoplay=1&controls=0&showinfo=0&autohide=1">
     </iframe>
</div>

    <!-- <div id="carouselContent" class="carousel slide" data-ride="carousel" data-pause="hover">
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active text-center p-4">
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
            </div>
            <div class="carousel-item text-center p-4">

							<h3>
								<span>Would you like to proceed with this tutorial to learn how to add a file on The Free Education ? </span>
							</h3>
							<br>
								 <div class="btn-wrapper">
<a href="./examples/login.html" class="btn btn-success">Login Page</a>
<a href="./examples/register.html" class="btn btn-white">Register Page</a> -->
	<!-- <a href="/" class="btn btn-warning">Skip</a> -->

            <!-- </div>
						<div class="carousel-item text-center p-4">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/fwLaEBPB5fw?rel=0&loop=1&autoplay=1&playlist=fwLaEBPB5fw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

						</div>
        </div>
        <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> -->






	<div class="card"  style="margin-top: 1%">

			<div class="card-header">
        @if(!empty(Request::query('q')))

				<h3>People that share the same speciality as you : </h3>
        @else
        <script type="text/javascript">
            window.location.href = "/";
        </script>
        @endif
			</div>


      <div class="container" style="margin-bottom:5%">
      <div class="row">

         @foreach($users as $user)

          @if($user->username != '')
      		@if($user->username === Auth::user()->username)
      	<?php continue; ?>
      		@endif
      	<div class="col-sm-6" style="padding-top: 12rem;">

              <div class="card card-profile shadow">

                <div class="px-4">

                  <div class="row justify-content-center">


                    <div class="col-lg-3 order-lg-2">
                      <div class="card-profile-image">
                        <a href="/{{$user->username}}">
                          <img style="width: 60px; height: 60px;" src="{{$user->imgpath}}" class="rounded-circle">
                        </a>
                      </div>
                    </div>


                    <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">

                      <div class="card-profile-actions">
                      	@if($user->username !== Auth::user()->username)
      									<?php
      											$followers = explode(',',$user->followers);
      									 ?>
      								@if(in_array(Auth::user()->username,$followers))
      								 <form method="post" action="rmf" >

      								                  <button type="submit" class="btn btn-sm btn-danger float-right">Unfollow</button>

      								                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
      																	<input type="hidden" name="useru" value="<?php echo base64_encode(encrypt($user->username)); ?>" />
      		                              <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
      		             </form>
      								                  @else
      								  <form action="newf" method="post">

      												  <button type="submit" class="btn btn-sm btn-default float-right">Follow</button>

      								                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
      																	<input type="hidden" name="useru" value="<?php echo base64_encode(encrypt($user->username)); ?>" />
       	                               <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
       	              </form>
      												  @endif
      												  @endif
                      </div>

                    </div>


                    <div class="col-lg-4 order-lg-1">
                      <div class="card-profile-stats d-flex justify-content-center">

                      </div>
                    </div>

                  </div>



                  <div class="text-center mt-4">

                    <a href="/{{$user->username}}">
                    <h3>{{$user->firstname}}  {{$user->lastname}}</h3>
                    </a>

                  </div>

                   <div class="text-center">
                   <i class="fab mr--8 fa-clock-o"></i>

                    <p>{{$user->namespi}}</p>

              </div>

              </div>

          </div>

          @else
                  <div class="search-result-item-body">
                      <div class="row">
                          <div class="col-sm-9">
                          <h4>no user was found</h4>
                          </div>
                      </div>
                  </div>
          @endif
      @endforeach

      </div>
      </div>
      </div>
</div>
</div>



@endsection
