@extends('layouts.layout')


<br>
<div class="container" style="margin-top:3%">
	<div class="card">
	<div class="card-header">
	<div class="col-md-9 col-md-pull-3">
        <h3 class="search-results-count" style="margin-top: 7%;margin-left: 50%;">Search Results for : {{$value}}</h3>
			</div>
		</div>
		</div>
		<br>
	<div class="card"  style="margin-top: 12%";>
			<div class="card-header">
		<h2> Users : </h2>
	</div>

	<div class="card-body">
        <section class="search-result-item">
					<div class="row">
      @foreach($users as $user)
      @if($user->username != '')
            <div class="search-result-item-body">
                <td>
                    <div class="col-sm-9">
                        <a href="/{{$user->username}}"><img src="{{$user->imgpath}}" height="80" width="80" /> </a> <h5 class="search-result-item-heading"><a href="/{{$user->username}}">{{$user->firstname}} {{$user->lastname}}</a></h4>
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
        </section>
			</div>
		</div>
				<br>
				<div class="card">
					<div class="card-header">
        <h2> Files : </h2>
			</div>
			<div class="card-body">
        <section class="search-result-item">
					<div class="container">
						<div class="row">
							<?php $i=0; ?>
				@foreach($resaults as $resault)
				<?php $i++; ?>
							<section class="content">
								<h3>{{$resault->title}}</h3>
								<div class="col-md-8 col-md-offset-2">
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
																</td>
																<td style="width:700px">
																	<div class="col-md-12 col-md-offset-10">
																	<div class="media-body">
																		<span class="media-meta pull-right" style="font-size:12">{{$resault->created_at}}</span>
																		<h6 class="title">
																			published by : <a href="/{{$resault->author}}">{{$resault->author}}</a>

																		</h6>
																		<p class="summary"><?php if(strlen($resault->description)>200) echo substr($resault->description,0,200)."...";else{
															        echo $resault->description;
															      } ?></p>
																	</div>
																</div>
															</div>
															</td>
															<td>

					<div class="btn-group">
					<a href=""data-toggle="modal" data-target="#ModalDownload{{$resault->id}}"> <button type="button" class="btn btn-outline-success " style="margin-left: auto;" >Download <i class="fa fa-cloud-download-alt"></i></button></a>
																			<a href=""data-toggle="modal" data-target="#Modal{{$resault->id}}"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: 2%; margin-right:2%;">View </button></a>
																		<a href=""data-toggle="modal" data-target="#ModalReport{{$resault->id}}"><button type="button" class="btn btn-outline-danger" style="margin-left:2%">Report</button></a>
				</div>

																			</td>
																		</tr>

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


																<!-- download modal -->

																												<div class="modal fade" id="ModalDownload{{$resault->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
																											<div class="modal-dialog" role="document">
																												<div class="modal-content">
																													<div class="modal-header">
																														<h5 class="modal-title" id="exampleModalLabel">Download {{$resault->title}}</h5>
																														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																															<span aria-hidden="true">&times;</span>
																														</button>
																													</div>
																													<div class="modal-body">
																												 <script data-cfasync="false" type="text/javascript" src="https://www.predictivdisplay.com/a/display.php?r=2100275"></script>
																													</div>
																													<div class="modal-footer">

																														<form method="get" action="check" >
																															<input type="hidden" value="{{$resault->location}}" name="f">
																															<a href="{{$resault->location}}"><button type="submit" class="btn btn-success" style="margin-left: -8%;" >Download</button><a>
																																      </form>
																														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

																													</div>
																												</div>
																											</div>
																										</div>

																										<!-- /download modal -->

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
											</div>
											  <div class="col-md-6 mb-3">
													<label for="reportcause">
														Explain more : </label>
														<textarea name="details" placeholder="please write detailes to help us deal with the problem">
														</textarea>
												</div>



											</ul>

																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-primary">Report</button>
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

																	</div>
																</form>
																</div>
																</div>
																</div>




										</td>
														</tr>

													</tbody>
												</table>
												<!-- @if($i == 2)
												<div class="card" style="width:800px;">

												<p style="color:gray; font-size:12pt;">ads</p>

												<div class="card-body" >
												<script data-cfasync="false" type="text/javascript" src="https://www.predictivdisplay.com/a/display.php?r=2100271"></script>


												</div>
												</div>
												<?php $i=0; ?>
												@endif -->
											</div>
										</div>
									</div>


					</section>

@endforeach
				</div>

</div>
</div>
</div>
</div>
