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

	<div class="col-sm-6" style="padding-top: 12rem;">

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
                <span class="font-weight-light">, {{$user->namespi}}</span>
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
<section class="search-result-item">



				@foreach($resaults as $resault)

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
												<div class="modal-dialog" role="document">

																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel">Report : {{$resault->title}}</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>

												<div class="modal-body" style="height:60%;width:70%">

				<div class="form-group row">
					<form action="reportguest" method="post">
									<input type="hidden" name="_token" value="{{csrf_token()}}" />
									<input type="hidden" name="user" value="{{$resault->author}}" />
						<ul class="list-group">

					<li class="list-group-item">
							<label for="reportcause">The reason for the Report : </label>
						<select name="reportcause" id="reportcause" style="font-size:10pt">

					<option value="0">User published something is mine or someone else i know</option>
					<option value="1" style="font-size:12pt">User published something that should not be on The Free Education</option>
					<option value="2">User has an inappropriate username </option>
					<option value="3">User has an inappropriate profile picture </option>
					<option value="2">User has used an inappropriate title or a description </option>

						</select>
					</li>



											 <div class="col-md-6 mb-3">
													<label for="reportcause">
														Explain more : </label>
														<textarea name="details" placeholder="please write detailes to help us deal with the problem">
														</textarea>
											</div>

						</ul>


																	<div class="modal-footer">
																		<button type="submit" class="btn btn-primary">Report</button>
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

																	</div>

					</form>
				</div>

												</div>
																</div>
												</div>
</div>


										</td>
														</tr>

													</tbody>
												</table>
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
