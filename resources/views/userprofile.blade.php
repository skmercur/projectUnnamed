@extends('layouts.layout')
@section('content')
@guest
<h3>error , it seeams that you are not connected  </h3>
@else
@if($user->username != Auth::user()->username)

<br>
<!-- <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Toggle Menu</a>
            </div>
        </div> -->
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
                  <h1 class="only-bottom-margin">{{$user->firstname}} {{$user->lastname}}</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                <span class="text-muted fa fa-envelope"> :</span> {{Auth::user()->email}}<br>
                  <span class="text-muted fa fa-male"> :</span> male<br><br>>
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
<table class="table table-hover" style="margin-top: 10%;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  <tbody>
    @foreach($files as $file)
    <tr>
      <th scope="row">{{$file->id}}</th>
      <td>{{$file->title}}</td>
      <td><?php if(strlen($file->description)>200) echo substr($file->description,0,200)."...";else{
        echo $file->description;
      } ?></td>
      <td>

<a href ="{{$file->location}}"><button type="button" class="btn btn-outline-success" style="margin-left: -8%;" ><i class="fa fa-cloud-download-alt"></i></button></a>
       <a href=""data-toggle="modal" data-target="#Modal"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: -7%;"></button></a>


      </td>
    </tr>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Descrption</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p class="description">{{$file->description}}.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
@endforeach
  </tbody>
</table>


@else
@if($user->status == 0)
<script type="text/javascript">
    window.location.href = "/confirm";
</script>
@endif
<br>
<!-- <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Toggle Menu</a>
            </div>
        </div> -->
<br>
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 lead"><h3>User Profile</h3><hr></div>
          </div>
          <div class="row">
			<div class="col-md-4 text-center">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- userprofile -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1253446609392565"
     data-ad-slot="7624838184"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
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
                <span class="text-muted fa fa-envelope"> </span> {{Auth::user()->email}}<br>
                  <span class="text-muted fa fa-male"> </span> {{Auth::user()->gender}}<br><br>
                  <small class="text-muted">Created: {{Auth::user()->created_at}}</small>
                  <div class="progress">
   <div class="progress-bar" role="progressbar" aria-valuenow="{{ceil(($user->tsize * 100)/100) }}"
   aria-valuemin="0" aria-valuemax="100" style="width:{{ceil(($user->tsize * 100)/100) }}%">
     <span class="sr-only"></span>
   </div>
  </div>
  <br>
  <div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="{{ceil(($user->nfiles * 100)/100) }}"
aria-valuemin="0" aria-valuemax="100" style="width:{{ceil(($user->nfiles * 100)/100) }}%">
<span class="sr-only"></span>
</div>
</div>
                </div>

                <div class="col-md-6">
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-comment text-muted"></i> You have uploaded {{100 - $user->nfiles}} files
                  </div>
                  <div class="activity-mini">
                    <?php $i=0; ?>

                    <i class="glyphicon glyphicon-thumbs-up text-muted"></i> You have {{$downloads}} downloads
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <br>
              <hr>
              <br>
              <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"><i class="glyphicon glyphicon-pencil"></i> Edit</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="edit" method="post" enctype="multipart/form-data" id="useredit">

          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label">Photo profil:</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/x-png,image/gif">
          </div>
          <div class="form-group">
            <label for="pass" class="col-form-label">new password:</label>
            <input type="password" class="form-control" id="pass" name="npass">
          </div>
          <div class="form-group">
            <label for="confirme-pass" class="col-form-label">Confirme Password:</label>
            <input type="password" class="form-control" id="confirm-pass" name="cnpass">
            <input type="hidden" value="{{Auth::user()->username}}" name="username" />
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" onclick="form_submit()" type="submit">Edit</button>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
  function form_submit() {
    document.getElementById("search_form").submit();
   }
  </script>

            </div>
          </div>

        </div>
        <br>
        <hr>
        <br>

        <form action="" method="POST" enctype="multipart/form-data">
          <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Title</span>
  </div>
  <input type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1" name="title">
</div>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Description</span>
  </div>
  <textarea class="form-control" aria-label="Description" name="description"></textarea>
</div>
<br>
<div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input input-group-prepend" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="file" accept="application/pdf,.docx">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
<input type="hidden" name="username" value="{{Auth::user()->username}}" />
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <div class="input-group-append">
    @if(($user->tsize  <= 0) || ($user->nfiles <= 0))
    <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04" disabled="true" >Upload</button>
    @else
      <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04"   >Upload</button>
      @endif
  </div>
</div>
</div>

</form>

      </div>

      <hr>


      <table class="table table-hover" style="margin-top: 10%;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  <tbody>
    @foreach($files as $file)
    <tr>
      <th scope="row">{{$file->id}}</th>
      <td>{{$file->title}}</td>
      <td><?php if(strlen($file->description)>200) echo substr($file->description,0,200)."...";else{
        echo $file->description;
      } ?></td>
      <td>






                                                      <form class="form-inline" action="delete" method="post">
                                                      <a href ="{{$file->location}}"><button type="button" class="btn btn-outline-success" style="margin-left: -8%;" ><i class="fa fa-cloud-download-alt"></i></button></a>
       <a href=""data-toggle="modal" data-target="#Modal"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: -7%;"></button></a>


                                                      @csrf
                                                      <input type="hidden" value="{{$file->id}}" name="fileid" />
                                                      <input type="hidden" name="username" value="{{Auth::user()->username}}" />
                                                          <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    <button type="submit" class="btn btn-outline-danger fa fa-trash-alt" ></button>
                                                </form>


      </td>
    </tr>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Descrption</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p class="description">{{$file->description}}.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
@endforeach
  </tbody>
</table>

    </div>

  </div>

</div>


@endif
@endguest
@endsection
