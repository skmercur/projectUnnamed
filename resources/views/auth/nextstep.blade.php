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
                    <form method="post" action="nextstep" enctype="multipart/form-data">
                    @foreach($listapi as $spi)
                    <select class="form-control">
                       <option>choose your speciality</option>
                       <option value="">{{$spi->namespi}}</option>
                    </select>
                    @endforeach
                    <br>



                    <div class="input-group">
  <div class="custom-file">
  <input type="file" class="custom-file-input" name="image" accept="image/jpeg|image/x-png">
    <label class="custom-file-label" value="{{csrf_token()}}" for="image">Choose file</label>
  </div>
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="submit" name="submit" value="upload">Button</button>
  </div>
</div>
                      <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <input type="hidden" name="user" value="{{ Auth::user()->name }}" />



 
                      

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
