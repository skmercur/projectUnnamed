@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top:3%">

	<div class="card">
		<div class="card-header">
			<div class="col-md-9 col-md-pull-3">
       		 	<h3 class="search-results-count text-center" style="">Search Results for : {{$value}}</h3>
			</div>
		</div>
	</div>

	<div class="card"  style="margin-top: 12%";>

			<div class="card-header">
				<h2> Users : </h2>
			</div>

<div class="container">
<div class="row">

   @foreach($users as $user)

    @if($user->username != '')
		@if($user->username === Auth::user()->username)
	<?php continue; ?>
		@endif
	<div class="col-sm-6 animated fadeInDown" style="padding-top: 12rem;">

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
             <i class="fa mr--8 fa-clock-o"></i>

              <p>{{$user->namespi}}</p>

        </div>

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
<div class="card" style="margin-top: 12%;margin-bottom: 12%">

						<div class="card-header">
        					<h2> Files : </h2>
						</div>

<div class="container">

	<div class="row">

		<?php $i=0; ?>
		   @foreach($resaults as $resault)
			  <?php $i++; ?>



<div class="col-sm-12">

<!-- Card -->
<div class="card">

  <!-- Card image -->
  <div class="card-profile-image animated fadeInDown">
    <a href="/{{$resault->author}}" class="">
    <img height="160" width="160" class="rounded-circle" src="{{$resault->imgpath}}" alt="Card image cap">
 
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body animated fadeInUp">

    <!-- Title -->
    <h4 class="card-title">{{$resault->title}}</h4>
    <hr>
    <!-- Text -->
    <p class="card-text"><?php if(strlen($resault->description)>200){
                              echo substr($resault->description,0,200)."...";
                              }
                             else{
                    echo $resault->description;
                               } ?></p>

  </div>

  <!-- Card footer -->
  <div class="rounded-bottom grey darken-3 text-center pt-3 animated fadeInDown">
    <ul class="list-unstyled list-inline font-small">

      <li class="list-inline-item pr-2 white-text"><i class="fa fa-user-o pr-1"></i>{{$resault->author}}</li>
      <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>{{$resault->created_at}}</li>

      <form method="get" action="check" >

                      <input type="hidden" value="{{$resault->location}}" name="f">

                        <div class="btn-group">
                          <form method="get" action="check" >
                          <input type="hidden" value="{{$resault->location}}" name="f">
                              <a  href="" data-toggle="modal" data-target="#ModalDownloads{{$resault->id}}">
                                <button type="submit" class="btn btn-outline-success fa fa-cloud-download white-text" style="margin-left: -8%;" >
                              </button>
                              </a>

                              <a href="" data-toggle="modal" data-target="#Modal{{$resault->id}}">
                                <button type="button" class="btn btn-outline-warning fa fa-eye white-text " style="margin-left: 1%;"></button>
                              </a>

                              <a href="" data-toggle="modal" data-target="#ModalReport{{$resault->id}}">
                                <button type="button" class="btn btn-outline-danger fa fa-user-times white-text" style="margin-left:2%"></button>
                              </a>
                              <div class="dropdown">
<button class="btn btn-outline-secondary fa fa-share-alt dropdown-toggle white-text" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:2%" >
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<input type="url" class="form-control" style="font-size:8pt" value="https://www.thefreeedu.com/search?share=<?php echo base64_encode(encrypt($resault->id));?>" onClick="this.select();"  >
</div>
</div>
    </ul>
  </div>

</div>
<!-- Card -->

                        <!-- Modal Downloads-->
                  <div class="modal fade" id="ModalDownloads{{$resault->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Download {{$resault->title}}</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <iframe data-aa='986619' src='//acceptable.a-ads.com/986619' scrolling='no' style='border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-success" style="margin-left:5px;" >Download</button>
                                                          </a>
                                                        </div>
                                                      </div>
                                                    </div>
                  </div>

                  <!-- end Modal Downloads -->

						</form>

						</div>

<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="Modal{{$resault->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
             	<h5 class="modal-title" id="exampleModalLabel">Descrption for {{$resault->title}}</h5>
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">



                <div class="md-form ml-0 mr-0">
               		 <p class="description">{{$resault->description}}</p>

                </div>

                <div class="text-center mt-4">

                </div>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login with Avatar Form-->


<!--Modal: modal with report Form-->
<div class="modal fade" id="ModalReport{{$resault->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Report : {{$resault->title}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <form action="reportguest" method="post">
            <div class="modal-body mx-3">




									<input type="hidden" name="_token" value="{{csrf_token()}}" />
									<input type="hidden" name="user" value="<?php echo base64_encode(encrypt($resault->author)); ?>" />


						<ul class="list-group">

								<li class="list-group-item">

										<label for="reportcause">The reason for the Report : </label>

										<div class="form-group">

    											<select class="form-control" id="reportcause">
      													<option value="0">User published something is mine or someone else i know</option>
													<option value="1" style="font-size:12pt">User published something that should not be on The Free Education</option>
													<option value="2">User has an inappropriate username </option>
													<option value="3">User has an inappropriate profile picture </option>
													<option value="2">User has used an inappropriate title or a description </option>
   												</select>
 										</div>
								</li>

						</ul>





                <div class="md-form mb-5">
                  <div class="form-group">
    					<label for="exampleFormControlTextarea1">Explain more : </label>
    					<textarea placeholder="please write detailes to help us deal with the problem" class="form-control" id="exampleFormControlTextarea1" rows="3" name="details"></textarea>
  				  </div>
                </div>



            </div>

            <div class="modal-footer d-flex justify-content-center">
                 <button type="submit" class="btn btn-primary">Report</button>
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </form>
        </div>
    </div>
</div>
<!--Modal: modal with report Form-->

	<br>
	 @if($i == 2)
			<div class="card" style="width:100%;padding:10px;" >

					<p style="color:gray; font-size:12pt;">ads</p>

					<div class="card-body" >
          <iframe data-aa='977909' src='//acceptable.a-ads.com/977909' scrolling='no' style='border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe>
					</div>
			</div>
	<?php $i = 0; ?>

	@endif

</div>

@endforeach

</div>

</div>

</div>

@endsection
