@extends('layouts.layout')
@section('content')
@guest
<h3>error , it seeams that you are not connected  </h3>
@else
@if($user->username != Auth::user()->username)
<br>
<div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Toggle Menu</a>
            </div>
        </div>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 lead">User profile<hr></div>
          </div>
          <div class="row">
			<div class="col-md-4 text-center">
              <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
              display:block; height: 140px; margin:auto;" src="{{ $user->imgpath}}" style="">
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="only-bottom-margin">{{$user->firstname}}{{$user->lastname}}</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <span class="text-muted">Email:</span> {{$user->email}}<br>
                  <span class="text-muted">Birth date:</span> 01.01.2001<br>
                  <span class="text-muted">Gender:</span> male<br><br>
                  <small class="text-muted">Created: {{$user->created_at}} </small>
                </div>
                <div class="col-md-6">
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-comment text-muted"></i> 500
                  </div>
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-thumbs-up text-muted"></i> 1500
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>
</div>
@else
<br>
<div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Toggle Menu</a>
            </div>
        </div>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 lead">User profile<hr></div>
          </div>
          <div class="row">
			<div class="col-md-4 text-center">
              <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
              display:block; height: 140px; margin:auto;" src="{{ Auth::user()->imgpath}}" style="">
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="only-bottom-margin">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <span class="text-muted">Email:</span> {{Auth::user()->email}}<br>
                  <span class="text-muted">Birth date:</span> 01.01.2001<br>
                  <span class="text-muted">Gender:</span> male<br><br>
                  <small class="text-muted">Created: {{Auth::user()->created_at}}</small>
                </div>
                <div class="col-md-6">
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-comment text-muted"></i> 500
                  </div>
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-thumbs-up text-muted"></i> 1500
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <hr>
              <hr>
              <button class="btn btn-outline-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
            </div>
          </div>

        </div>
        <hr>
        <br>
        <form action="" method="GET">
          <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Title</span>
  </div>
  <input type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
</div>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Description</span>
  </div>
  <textarea class="form-control" aria-label="Description"></textarea>
</div>
<br>
<div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input input-group-prepend" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Submit</button>
  </div>
</div>
</div>
</form>
      </div>
      <hr>
      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>test</td>
      <td>This is test description</td>
      <td><button type="button" class="btn btn-outline-success">Download</button> <button type="button" class="btn btn-outline-warning">View</button></td>
    </tr>
   
  </tbody>
</table>
    </div>
    
  </div>
  
</div>


@endif
@endguest
@endsection
