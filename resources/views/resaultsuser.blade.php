@extends('layouts.layout')




<div class="container">
	<div class="col-md-9 col-md-pull-3">
        <h1 class="search-results-count" style="margin-top: 7%;margin-left: 50%;">Search Results for {{$value}}</h1>
        <h2> Users : </h2>
        <section class="search-result-item">
      @foreach($users as $user)
      @if($user->username != '')
            <div class="search-result-item-body">
                <div class="row">
                    <div class="col-sm-9">
                        <a href="/{{$user->username}}"><img src="{{$user->imgpath}}" height="80" width="80" /> </a> <h4 class="search-result-item-heading"><a href="/{{$user->username}}">{{$user->firstname}} {{$user->lastname}}</a></h4>
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
        </section>
				<br>
        <h2> Files : </h2>
        <section class="search-result-item">
					<div class="container">
						<div class="row">
				@foreach($resaults as $resault)
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
																	<a href="/login" class="pull-left">
																	<img src="{{$resault->imgpath}}" class="media-photo" height="60" width="60">
																	</a>
																</td>
																<td>
																	<div class="col-md-12 col-md-offset-2">
																	<div class="media-body">
																		<span class="media-meta pull-right" style="font-size:12">{{$resault->created_at}}</span>
																		<h6 class="title">
																			{{$resault->author}}

																		</h6>
																		<p class="summary"><?php if(strlen($resault->description)>200) echo substr($resault->description,0,200)."...";else{
															        echo $resault->description;
															      } ?></p>
																	</div>
																</div>
															</div>
															</td>
															<td>
				<form method="get" action="check" >
					<input type="hidden" value="{{$resault->location}}" name="f">
															<button type="submit" class="btn btn-outline-success" style="margin-left: -8%;" ><i class="fa fa-cloud-download-alt"></i></button></a>
																       <a href=""data-toggle="modal" data-target="#Modal"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: -7%;"></button></a>
				</form>

																      </td>
																    </tr>
																    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
																  <div class="modal-dialog" role="document">
																    <div class="modal-content">
																      <div class="modal-header">
																        <h5 class="modal-title" id="exampleModalLabel">Descrption</h5>
																        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																          <span aria-hidden="true">&times;</span>
																        </button>
																      </div>
																      <div class="modal-body">
																      <p class="description">{{$resault->description}}.</p>
																      </div>
																      <div class="modal-footer">
																        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

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


					</section>
					<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Descrption</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						<p class="description">{{$resault->description}}.</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

						</div>
					</div>
				</div>

				</div>
						  @endforeach
</div>
