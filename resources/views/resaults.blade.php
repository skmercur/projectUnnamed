@extends('layouts.layout')




<div class="container">
	<div class="card-body">
	<div class="col-md-9 col-md-pull-3">
        <h3 class="search-results-count" style="margin-top: 7%;margin-left: 50%;">Search Results for {{$value}}</h3>
			</div>
		</div>

				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- search -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:728px;height:90px"
				     data-ad-client="ca-pub-1253446609392565"
				     data-ad-slot="1840236457"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>




        <section class="search-result-item">




<div class="card">
	<div class="container">
		<div class="row">
@foreach($resaults as $resault)

			<section class="content">
				<div class="card-header">
				<h3>{{$resault->title}}</h3>
			</div>
			<div class="card-body">
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
	<div class="btn-group">
											<button type="submit" class="btn btn-outline-success" style="margin-left: -8%;" ><i class="fa fa-cloud-download-alt"></i></button>
												      </form>
															<a href=""data-toggle="modal" data-target="#Modal{{$resault->id}}"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: 1%;"></button></a>
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
							</div>
						</div>
					</div>


	</section>

		  @endforeach
		</div>
		<br>



      </td>





    </div>
