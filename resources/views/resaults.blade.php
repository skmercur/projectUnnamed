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

				<h3>{{$resault->title}}</h3>

						<div class="col-sm-12">

										<a href="/{{$resault->author}}" class="pull-left">
											<img src="{{$resault->imgpath}}" class="media-photo" height="60" width="60">
										</a>
						</div>

						<div class="col-sm-12">

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
						   							   } ?>

						   				  </p>

						</div>


						<div class="col-sm-12">

						<form method="get" action="check" >

											<input type="hidden" value="{{$resault->location}}" name="f">

												<div class="btn-group">
                          <form method="get" action="check" >
                          <input type="hidden" value="{{$resault->location}}" name="f">
															<a  href="" data-toggle="modal" data-target="#ModalDownloads{{$resault->id}}">
																<button type="submit" class="btn btn-outline-success" style="margin-left: -8%;" >
															<i class="fa fa-cloud-download-alt"></i></button>
															</a>

															<a href="" data-toggle="modal" data-target="#Modal{{$resault->id}}">
															 	<button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: 1%;"></button>
															</a>

															<a href="" data-toggle="modal" data-target="#ModalReport{{$resault->id}}">
																<button type="button" class="btn btn-outline-danger fa fa-user-times" style="margin-left:2%"></button>
															</a>
                              <div class="dropdown">
<button class="btn btn-outline-secondary fa fa-share-alt dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:2%" >
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<input type="url" class="form-control" style="font-size:8pt" value="https://www.thefreeedu.com/search?share=<?php echo base64_encode(encrypt($resault->id));?>" onClick="this.select();"  >
</div>
</div>
												</div>






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
