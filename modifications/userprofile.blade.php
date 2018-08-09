@extends('layouts.layout')

@section('content')

@guest
<script type="text/javascript">
    window.location.href = "/login";
</script>
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
<div class="container center-block" >
  <div class="row">
    <div class="card " style="margin-left:auto; margin-right:auto;">

  <div class="card-body">
    <div class="col-md-35">
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
                  <h1 class="only-bottom-margin" >{{$user->firstname}} {{$user->lastname}}</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                <span class="text-muted fa fa-envelope"> :</span> {{$user->email}}<br>
                <span class="text-muted fa fa-male"> </span> {{$user->gender}}<br><br>
                <span class="text-muted fa fa-university"></span>{{$user->namespi}}<br><br>
                  <small class="text-muted">Created: {{$user->created_at}} </small>
                </div>
                <div class="col-md-6">
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-comment text-muted"></i>{{$user->firstname}} {{$user->lastname}} has uploaded {{$uploads}} files
                  </div>
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-thumbs-up text-muted"></i>{{$user->firstname}} {{$user->lastname}} has  {{$downloads}} downloads
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


<br>


<div class="container center-block"style="margin-top: 10%;" >
  <div class="row">
<div class="card" style="margin-left:auto; margin-right:auto;">
  <div class="card-body" >
<table class="table table-hover" >
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
<div class="btn-group">
<a href ="{{$file->location}}"><button type="button" class="btn btn-outline-success" style="margin-left: -8%;" ><i class="fa fa-cloud-download-alt"></i></button></a>
       <a href=""data-toggle="modal" data-target="#Modal{{$file->id}}"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: 2%;"></button></a>
</div>

      </td>
    </tr>
    <div class="modal fade" id="Modal{{$file->id}}"  tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
</div>
@else
@if($user->status == 0)
<script type="text/javascript">
    window.location.href = "/confirm";
</script>
@endif




<!-- <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Toggle Menu</a>
            </div>
        </div> -->


  <section class="section section-skew" style="padding-top: 30rem;">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ Auth::user()->imgpath}}" class="rounded-circle">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0">
                  <a href="#" class="btn btn-sm btn-info mr-4">Edit</a>
                  <a href="#" class="btn btn-sm btn-default float-right">Contact</a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">0</span>
                    <span class="description">Friends</span>
                  </div>
                  <div>
                    <span class="heading">{{$downloads}}</span>
                    <span class="description">Downloads</span>
                  </div>
                  <div>
                    <span class="heading">{{100 - $user->nfiles}}</span>
                    <span class="description">files</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h3>{{Auth::user()->firstname}}  {{Auth::user()->lastname}}
                <span class="font-weight-light">, {{Auth::user()->gender}}</span>
              </h3>
              <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>{{Auth::user()->email}}</div>
              <div class="h6 mt-4"><i class="ni business_briefcase-24 mr-2"></i>{{$user->namespi}}</div>
              <div><i class="glyphicon glyphicon-asterisk"></i>{{Auth::user()->created_at}}</div>



              <div class="col-md-12">
            <button style="margin-top: 30px; margin-left: auto;
    margin-right: auto;width: 90px;height: 90px; border-radius: 50%" type="button" class="btn btn-icon btn-2 btn-primary" data-toggle="modal" data-target="#modal-form"><i class="fas fa-cloud-upload-alt fa-3x"></i></button>
    
      <button style="margin-top: 30px; margin-left: auto;
    margin-right: auto;width: 90px;height: 90px; border-radius: 50%" type="button" class="btn btn-icon btn-2 btn-primary" data-toggle="modal" data-target="#modal-form2"><i class="fas fa-file fa-3x"></i></button>
           <div class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tabs_2_2" role="tab" aria-controls="profile" aria-selected="false">
                    <span class="nav-link-icon d-block"><i class="ni ni-chat-round"></i></span>
                  </a>
                </div>




            </div>

            <div class="mt-5 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <p>An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p>
                  <a href="#">Show more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
       
        </section>



 <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-body p-0">
                    <div class="card bg-secondary shadow border-0">
               
                      <div class="card-body px-lg-5 py-lg-5">

                        <div class="text-center text-muted mb-4">

            <p>              <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
What Can I Upload ? 
  </a>
  <div class="collapse" id="collapseExample">
  <div class="card card-body">
  <p>You can only upload files that are yours and files you have the rights to share</p>
              <p>Here are an exemple of files you can upload : </p>
              <ul class="list-group">
  <li class="list-group-item">Courses that are free and free to share</li>
  <li class="list-group-item">Codes that you have wrote and saved either in pdf or docx</li>
  <li class="list-group-item">Books that are free to share</li>

</ul>

  </div>
</div>
</p>                   
                       </div>

        <form action="upload.php" method="post" enctype="multipart/form-data">

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                              </div>
                              <input class="form-control" placeholder="Title" type="email">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                              </div>
                              <input class="form-control" placeholder="Description" type="text">
                            </div>
                          </div>

                         
   <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>

                         <div class="text-center">
                            <button type="button" class="btn btn-primary my-4">Add File</button>
                          </div>

                         
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        



<div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form2" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="row">
          <div class="card " style="margin-left:auto; margin-right:auto;">

        <div class="card-body">
      <table class="table table-hover" >
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
       <a href=""data-toggle="modal" data-target="#Modal{{$file->id}}"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: -7%;"></button></a>


                                                      @csrf
                                                      <input type="hidden" value="{{$file->id}}" name="fileid" />
                                                      <input type="hidden" name="username" value="{{Auth::user()->username}}" />
                                                          <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    <button type="submit" class="btn btn-outline-danger fa fa-trash-alt" ></button>
                                                </form>


      </td>
    </tr>
    <div class="modal fade" id="Modal{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
</div>
</div>


@endif
@endguest
@endsection

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-1253446609392565",
          enable_page_level_ads: true
     });
</script>