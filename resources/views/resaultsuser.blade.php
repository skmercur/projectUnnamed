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

	<div class="card"  style="margin-top: 12%">

			<div class="card-header">
				<h2> Users : </h2>
			</div>
<div class="container">
<div class="row">
	@if( $countu == 0)
<h4>No user was found </h4>
	@endif
   @foreach($users as $user)

    @if($user->username != '')

	<div class="col-sm-6" style="padding-top: 12rem; margin-bottom:2%;">

        <div class="card card-profile shadow">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="/{{$user->username}}">
                    <img style="width: 60px;" src="{{$user->imgpath}}" class="rounded-circle">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
								@if($user->username !== Auth::user()->username)
                <div class="card-profile-actions py-4 mt-lg-0">
									<?php
$followers = explode(',',$user->followers);
									 ?>
								@if(in_array(Auth::user()->username,$followers))
								  <form method="post" action="rmf" >
								                  <button type="submit" class="btn btn-sm btn-danger float-right">Unfollow</button>
								                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
								                  <input type="hidden" name="useru" value="{{$user->username}}" />
								                  <input type="hidden" name="username" value="{{ Auth::user()->username }}" />
								                </form>
								                  @else
								                  <form action="newf" method="post">
								<button type="submit" class="btn btn-sm btn-default float-right">Follow</button>

								                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
								                  <input type="hidden" name="useru" value="{{$user->username}}" />
								                  <input type="hidden" name="username" value="{{ Auth::user()->username }}" />
								                </form>
																 @endif
                </div>
								@endif
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">

                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <a href="/{{$user->username}}"><h3>{{$user->firstname}}  {{$user->lastname}}
                <span class="font-weight-light"><small>, {{$user->namespi}}</small></span>
              </h3></a>


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

<div class="card-body">

<div class="container">
		<div class="row">
			@if( $count == 0)
		<h4>No file was found </h4>
			@endif
<section class="search-result-item">


	<?php $i=0; ?>
	@foreach($resaults as $resault)
	<?php $i++; ?>

							<section class="content">

								<h3>{{$resault->title}}</h3>

								<div class="col-md-12 col-md-offset-2">

									<div class="panel panel-default">

										<div class="panel-body">

											<div class="pull-right">

											</div>

											<div class="table-container">
												<table class="table table-filter">
													<tbody>

														<tr data-status="pagado">

															<td>

																<div class="ckbox">
																	<label for="checkbox1"></label>
																</div>

															</td>

															<td>

															</td>

															<td>

												<div class="media">

																<a href="/{{$resault->author}}" class="pull-left">
																	<img src="{{$resault->imgpath}}" class="media-photo" height="60" width="60">
																</a>
												</div>
															</td>

															<td style="width:700px">

																<div class="col-md-12 col-md-offset-10">
																	<div class="media-body">

																		<span class="media-meta pull-right" style="font-size:12">{{$resault->created_at}}</span>

																		<h6 class="title">
																			published by : <a href="/{{$resault->author}}">{{$resault->author}}</a>

																		</h6>

																		<p class="summary">
									<?php if(strlen($resault->description)>200){
													echo substr($resault->description,0,200)."...";
										}
										  else{
															        echo $resault->description;
															      } ?></p>


																	</div>
																</div>
															</td>


															<td>
				<form method="get" action="check" >
					<input type="hidden" value="{{$resault->location}}" name="f">
															<div class="btn-group">
									<a href="">
									<button type="submit" class="btn btn-outline-success" style="margin-left: -8%;" >
									<i class="fa fa-cloud-download-alt"></i></button>
									</a>
				</form>

												<a href="" data-toggle="modal" data-target="#Modal{{$resault->id}}">
												   <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: 1%;"></button>
												</a>
												<a href="" data-toggle="modal" data-target="#ModalReport{{$resault->id}}">
												<button type="button" class="btn btn-outline-danger" style="margin-left:2%">Report</button>
												</a>






<div class="modal fade" id="Modal{{$resault->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="exampleModalLabel">Descrption for {{$resault->title}}</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																			<p class="description">{{$resault->description}}</p>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

																			</div>
																		</div>
																	</div>
</div>

<div class="modal fade" id="ModalReport{{$resault->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" style="height:auto;width:auto;">

													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">

																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel">Report : {{$resault->title}}</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>

												<div class="modal-body p-0">
													<div class="card bg-secondary shadow border-0">

														<div class="card-body px-lg-5 py-lg-5">



					<form action="reportguest" method="post">
									<input type="hidden" name="_token" value="{{csrf_token()}}" />
									<input type="hidden" name="user" value="{{$resault->author}}" />

									<div class="form-group">
										<p>The reason for the Report : </p>

										<div class="input-group input-group-alternative">



							  <select class="form-control" name="reportcause" id="reportcause" >

					<option value="0">User published something is mine or someone else i know</option>
					<option value="1" style="font-size:12pt">User published something that should not be on The Free Education</option>
					<option value="2">User has an inappropriate username </option>
					<option value="3">User has an inappropriate profile picture </option>
					<option value="2">User has used an inappropriate title or a description </option>

						</select>

</div>
</div>

<div class="form-group">
	<div class="input-group input-group-alternative">
		<div class="input-group-prepend">
			<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
		</div>
		<textarea class="form-control" placeholder="Description" name="description" type="text" maxlength="250" required ></textarea>
	</div>
</div>




																	<div class="modal-footer">
																		<div class="btn-group">
																		<button type="submit" class="btn btn-primary" style="margin-left:2%; margin-right:2%">Report</button>
																		<button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:2%; margin-right:2%">Close</button>
</div>
																	</div>

					</form>
				</div>
			</div>
				</div>


																</div>
												</div>
</div>


										</td>
														</tr>

													</tbody>
												</table>

												<br>
												 @if($i == 2)
												<div class="card" style="width:800px;padding:10px;" >

												<p style="color:gray; font-size:12pt;">ads</p>

												<div class="card-body" >
											<iframe data-aa='984814' src='//acceptable.a-ads.com/984814' scrolling='no' style='border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe>
												</div>
												</div>
												<?php $i = 0; ?>
												@endif
											</div>
										</div>
									</div>


</div>

		</section>
@endforeach

</section>
</div>
</div>
</div>
</div>
@endsection
