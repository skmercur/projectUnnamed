@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

@if(Auth::user() == '')
<script type="text/javascript">
window.location = "/login";
</script>
@else

                    @if(Auth::user()->username !== '')

                    <form method="post" action="nextstep" enctype="multipart/form-data">

                    <select class="form-control" data-live-search="true" name="namesp">
                    <option>choose your speciality</option>
                    @foreach($spec as $spi)

                       <option value="{{$spi->namespi}}">{{$spi->namespi}}</option>
                       @endforeach
                    </select>

                    <br>



                    <div class="input-group">
  <div class="custom-file">
  <input type="file" class="custom-file-input" name="image"  accept="image/jpeg,image/x-png,image/gif">
    <label class="custom-file-label" value="{{csrf_token()}}" for="image">Choose an image for your profile</label>
  </div>
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="submit" name="submit" value="upload">Upload</button>
  </div>
</div>
                      <input type="hidden" name="_token" value="{{csrf_token()}}" />

                      <input type="hidden" name="user" value="{{ Auth::user()->username }}" />






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
