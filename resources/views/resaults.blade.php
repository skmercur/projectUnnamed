 @extends('layouts.layout')


@section('content')

<div class="container" style="margin-top:3%;">
	<div class="card">
		<div class="card-header">
			<div class="col-md-9 col-md-pull-3">
       		 	<h3 class="search-results-count text-center" style="">Search Results for : {{$value}}</h3>
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
		@if( $count == 0)
	<h4>No file was found </h4>
		@endif

		<?php $i=0; ?>
		@foreach($resaults as $resault)

		<?php $i++; ?>

								<div class="col-lg-12 col-xs-12" style="margin-bottom:2%" >





<<<<<<< HEAD
	<div class="btn-group">
	<a href=""data-toggle="modal" data-target="#ModalDownload{{$resault->id}}"> <button type="button" class="btn btn-outline-success " style="margin-left: auto;" >Download <i class="fa fa-cloud-download-alt"></i></button></a>
															<a href="" data-toggle="modal" data-target="#Modal{{$resault->id}}"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: 2%; margin-right:2%;">View </button></a>
														<a href="" data-toggle="modal" data-target="#ModalReport{{$resault->id}}"><button type="button" class="btn btn-outline-danger" style="margin-left:2%">Report</button></a>
=======


                          <div class="row" style="margin-bottom:2%">
                            <div class="col" style="text-align:left" >
                              <h3 style="font-size: 5.0vh">
{{$resault->title}}</h3>
>>>>>>> 13268532d68f951f689eeea01397eaf0852cbc49
</div>
</div>
<div class="container" style="text-align:left">

                              <div class="row">



<div class="col-sm-3 col-xs-3">

<div class="row">
  <div class="col">
																	<a href="/{{$resault->author}}" class="pull-left">
																		<img src="{{$resault->imgpath}}" class="media-photo" height="60" width="60">
																	</a>
</div>

                                </div>
                                <br>
                                <div class="row">
  <div class="col-xs-1">
        <small >    published by : <a href="/{{$resault->author}}">{{$resault->author}}</a></small>
        </div>

        <div class="col-xs-3">
          <br>

                                    <small style="font-size:1.8vh">{{$resault->created_at}}</small>
                                  </div>
</div>








</div>
<div class="col-sm-6 col-xs-5">
  <p>Descrption : </p>
																		<p>
										<?php if(strlen($resault->description)>200){
														echo substr($resault->description,0,200)."...";
											}
											  else{
																        echo $resault->description;
																      } ?></p>




															</div>


															<div  class="col-sm-3 col-xs-3">
                                <div class="row-fluid">
					<form method="get" action="check" >
						<input type="hidden" value="{{$resault->location}}" name="f">
																<div class="btn-group">
										<a href="" data-toggle="modal" data-target="#ModalDownloads{{$resault->id}}">
										<button type="button" class="btn btn-outline-success" style="margin-left: -8%;" >
										<i class="fa fa-cloud-download-alt"></i></button>
										</a>

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
                                                        <iframe data-aa='977909' src='//acceptable.a-ads.com/977909' scrolling='no' style='border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe>
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



													<a href="" data-toggle="modal" data-target="#Modal{{$resault->id}}">
													   <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: 1%;"></button>
													</a>

                          </div>
                          <div class="row-fluid" style="margin-top:2%">


													<a href="" data-toggle="modal" data-target="#ModalReport{{$resault->id}}">
													<button type="button" class="btn btn-outline-danger fa fa-user-times" style="margin-left:-2%"></button>
													</a>
                          <div class="dropdown">
  <button class="btn btn-outline-secondary fa fa-share-alt dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:1%" >
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <input type="url" class="form-control" style="font-size:8pt" value="https://www.thefreeedu.com/search?share=<?php echo $resault->id;?>" onClick="this.select();"  >
  </div>
</div>






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
			<textarea class="form-control" placeholder="Description" name="details" type="text" maxlength="250" required ></textarea>
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


</div>
<<<<<<< HEAD

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
=======
</div>
</div>

													<br>
													 @if($i == 2)
													<div class="card" style="width:auto;padding:10px;" >

													<p style="color:gray; font-size:12pt;">ads</p>

													<div class="card-body" >
											<iframe data-aa='984814' src='//acceptable.a-ads.com/984814' scrolling='no' style='border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe>		</div>
													</div>
													<?php $i = 0; ?>
													@endif
												</div>
											</div>

                    <br>
			</div>

	@endforeach

	</section>
	</div>
	</div>
	</div>
</div>
</div>


	@endsection
>>>>>>> 13268532d68f951f689eeea01397eaf0852cbc49
