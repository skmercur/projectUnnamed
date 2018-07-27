@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))

                    @endif

                    @if(Auth::user()->name !== '')
                    <form method="post" action="nextstep" enctype="multipart/form-data">

                    <select class="form-control" name="namesp">
                    <option>choose your speciality</option>
                    @foreach($spec as $spi)

                       <option value="{{$spi->namespi}}">{{$spi->namespi}}</option>
                       @endforeach
                    </select>

                    <br>



                    <div class="input-group">
  <div class="custom-file">
  <input type="file" class="custom-file-input" name="image">
    <label class="custom-file-label" value="{{csrf_token()}}" for="image">Choose file</label>
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
    window.location = "/login";//here double curly bracket
</script>
@endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
