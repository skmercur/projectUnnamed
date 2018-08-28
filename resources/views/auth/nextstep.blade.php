@extends('layouts.app')

@section('content')

@if(!empty(Request::query('v')))
<?php
$va = Request::query('v');
switch($va){

case 1:{

?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oups!</strong>there was an error please retry
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
break;
}
} ?>
@endif

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Image and Speciality selection</div>

                <div class="card-body">

@if(Auth::user() == '')
<script type="text/javascript">
window.location = "/login";
</script>
@else


                    @if((Auth::user()->username !== '') && (Auth::user()->status === 0))

                    <form method="post" action="nextstep"  enctype="multipart/form-data">
                      @csrf

                    <select class="form-control" data-live-search="true" id="namesp"name="namesp" onchange="run()">
                    <option value="other">other</option>
                    @foreach($spec as $spi)

                       <option value="{{$spi->namespi}}">{{$spi->namespi}}</option>
                       @endforeach
                    </select>
                    <small><a href="#" style="float:right;"  data-toggle="modal" data-target="#ModalRequestSpeciality"> i didn't find what i was looking for</a></small>
                    <script type="text/javascript" >
                    function run() {
                      var s = document.getElementById("spec");
                           s.innerHTML = document.getElementById("namesp").value;

                       }


                    </script>
                    <br>


<div class="card"  style="width: auto;">
  <div class="container-fluid">
  <div class="row">
        <div class="col-xs-6">
          <div class="container1">
         <img id="output_image" src="{{asset('assets/img/profil.png')}}" style="width:220px;height:220px;max-width:100%">
</div>

</div>
<input type="hidden" id="x" name="x" value="0" />
<input type="hidden" id="y" name="y" value="0" />
<input type="hidden" id="h" name="h" value="0" />
<input type="hidden" id="w" name="w" value="0" />

    <div class="col-xs-6" style="margin-left:2%">
  <h4 ><strong>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</strong></h4>
  <h5 ><strong>{{Auth::user()->email}}</strong></h5>
  <h6 ><p id="spec"></p></h6>
</div>

</div>
</div>
  <div class="card-body">
  <div class="input-group">
  <label class="btn btn-outline-primary" style="height:auto; min-width:150px" for="image">
  <input type="file" style="display:none" name="image" id="image" onchange="loadFile(event)"  accept="image/jpeg,image/x-png,image/gif">
  <script>
  var loadFile = function(event) {
    var output = document.getElementById('output_image');
    output.src = URL.createObjectURL(event.target.files[0]);
    LaunchCropper();
  };
</script>
  Change image</label>
  <input type="hidden" name="_token" value="{{csrf_token()}}" />

  <input type="hidden" name="user" value="{{ Auth::user()->username }}" />
    <button class="btn btn-outline-success" type="submit" name="submit" value="upload" style="margin-Left:50%;">Upload</button>
  </div>
</div>
  </div>
</td>


</div>










                    </form>
                    <div class="modal fade" id="ModalRequestSpeciality" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Request a Speciality</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h5>Please write down the Speciality you would like to add on the list</h5>
                          <form action="requestSpeciality" method="post" id="requestSpecialityForm" >
                                  @CSRF
<input type="hidden" name="user" value="{{ Auth::user()->username }}" />
                                  <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                      <label>Message</label>
                                      <textarea class="form-control" id="message" rows="5" placeholder="Type your message here" required="required" name="text" data-validation-required-message="Please enter a message."></textarea>
                                      <p class="help-block text-danger"></p>
                                    </div>
                                  </div>
                                  <br>
                                  <div></div>


                          </div>

                          <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <button type="button" onclick="form_submit()" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
                                    </form>

                                    <script type="text/javascript" >

                                    function form_submit() {

                                      $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    var form = $("#requestSpecialityForm");
                                               $.ajax({

                                                  type:'POST',
                                                  url:'/requestSpeciality',
                                                  data:form.serialize(),
                                                  success:function(data){

                                                  $('#ModalRequestSpeciality').modal('hide');

                                                }
                                               });
                                    }
                                    </script>
                          </div>
                        </div>
                      </div>
                    </div>


                    @else
                    <script type="text/javascript">
                    window.location = "/";
                    </script>
                    @endif

@endif




                </div>
            </div>
        </div>
    </div>
</div>

@endsection
