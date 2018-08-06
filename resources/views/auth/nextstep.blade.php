@extends('layouts.app')

@section('content')
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


                    @if(Auth::user()->username !== '')

                    <form method="post" action="nextstep"  enctype="multipart/form-data">
                      @csrf

                    <select class="form-control" data-live-search="true" id="namesp"name="namesp" onchange="run()">
                    <option value="other">other</option>
                    @foreach($spec as $spi)

                       <option value="{{$spi->namespi}}">{{$spi->namespi}}</option>
                       @endforeach
                    </select>
                    <script type="text/javascript" >
                    function run() {
                      var s = document.getElementById("spec");
                           s.innerHTML = document.getElementById("namesp").value;
                           alert(k);
                       }


                    </script>
                    <br>


<div class="card"  style="width: auto;">
  <div class="container-fluid">
  <div class="row">
        <div class="col-xs-6">
  <img class="img-fluid img-thumbnail" src="{{asset('assets/img/profil.png')}}" id="output_image" style="margin-top:  1%;margin-left: 25px;max-height:160px; max-width:160px;">
</div>
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
  <input type="file" style="display:none" name="image" id="image"  accept="image/jpeg,image/x-png,image/gif" onchange="preview_image(event)">
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
