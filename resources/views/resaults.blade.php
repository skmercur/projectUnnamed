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





        <section class="search-result-item">




<div class="card"  style="margin-top: 12%";>
	<div class="container">
			<div class="table-responsive">
		<div class="row">
			<?php $i=0; ?>
@foreach($resaults as $resault)
<?php $i++; ?>
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

								<table class="table">
									<tbody>
										<tr data-status="pagado">
											<td>
												<div class="media">
													<a href="/login" class="pull-left">
													<img src="{{$resault->imgpath}}" class="media-photo" height="60" width="60">
													</a>
												</td>
												<td style="width:700px;">
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
														<ul class="list-group" style="padding-left: 12px;">
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
<br>
<!-- @if($i == 2)
<div class="card" style="width:800px;">

<p style="color:gray; font-size:12pt;">ads</p>

<div class="card-body" >
<script data-cfasync="false" type="text/javascript" src="https://www.predictivdisplay.com/a/display.php?r=2100271"></script>


</div>
</div>
<?php $i = 0; ?>
@endif -->
							</div>
						</div>
					</div>


	</section>

		  @endforeach
</div>
		<br>



      </td>





    </div>
		  </div>
			  </div>
				  </div>
						</section>
</div>
<a href="" class="float" id="menu-share" data-toggle="modal" data-target="#ModalContact">
<i class="fa fa-comment my-float "></i>
</a>

<div class="modal fade" id="ModalContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Contact Us</h5>
		<form action="reportguest" method="post" style="margin-left: 59%;">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<button type="submit" class="btn btn-outline-danger fa fa-flag"></button>
		</form>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="sendcontact" method="post" id="contactForm" >
              @CSRF

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" name="text" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div></div>

            </form>
      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
      </div>
    </div>
  </div>
</div>
@endsection
