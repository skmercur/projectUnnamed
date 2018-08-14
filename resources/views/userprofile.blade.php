@extends('layouts.layout')

@section('content')

@guest
<script type="text/javascript">
    window.location.href = "/login";
</script>
@else
@if($user->username != Auth::user()->username)


<!-- <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Toggle Menu</a>
            </div>
        </div> -->

<br>

  <section class="section section-skew" style="padding-top: 30rem;">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ $user->imgpath}}" class="rounded-circle">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0">


  @if(in_array(Auth::user()->username,$followers))
  <form method="post" action="rmf" >
                  <button type="submit" class="btn btn-sm btn-danger float-right">Unfollow</button>
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <input type="hidden" name="useru" value="{{$user->username}}" />
                  <input type="hidden" name="username" value="{{ Auth::user()->username }}" />
                </form>
                  @else
                  <form action="newf" method="post">
<button type="submit" class="btn btn-sm btn-default float-right">Follow</button>
                  @endif
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <input type="hidden" name="useru" value="{{$user->username}}" />
                  <input type="hidden" name="username" value="{{ Auth::user()->username }}" />
                </form>
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">
                      <div>
                        <span class="heading">30</span>
                        <span class="description">Followers</span>
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
              <h3>{{$user->firstname}}  {{$user->lastname}}
                <span class="font-weight-light">, {{Auth::user()->gender}}</span>
              </h3>
              <div class="h6 font-weight-300"><i class="material-icons" style="font-size:13pt">email</i> : {{$user->email}}</div>
              <div class="h6 mt-4"><i class="material-icons" style="font-size:13pt">school</i> : {{$user->namespi}}</div>

              <div><i class="glyphicon glyphicon-asterisk"></i>Joined The Free Education : {{$user->created_at}}</div>



              <div class="col-md-12">

      <button style="margin-top: 30px; margin-left: auto;
    margin-right: auto;width: 90px;height: 90px; border-radius: 50%" type="button" class="btn btn-icon btn-2 btn-primary" data-toggle="modal" data-target="#modal-form3"><i class="fas fa-file fa-3x"></i></button>
           <div class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tabs_2_2" role="tab" aria-controls="profile" aria-selected="false">
                    <span class="nav-link-icon d-block"><i class="ni ni-chat-round"></i></span>
                  </a>
                </div>




            </div>

            <div class="mt-5 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                <p>{{$user->bio}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

        </section>










<!-- modal editing -->


<!-- end modal editing -->

<!-- modal checking  for virus -->



<!-- end modal checking for virus -->


<div class="modal fade" id="modal-form3" tabindex="-1" role="dialog" aria-labelledby="modal-form3" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="row">
          <div class="card " style="margin-left:auto; margin-right:auto;">
  <div class="modal-content">
    <div class="modal-body p-0">
      <div class="card bg-secondary shadow border-0">
      <table class="table" >
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
       <a href=""data-toggle="modal" data-target="#Modal{{$file->id}}"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: -7%;"></button></a>

</div>

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

        <script type="text/javascript">

        setInterval(function getMessage(){
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var form = $("#theForm");
                   $.ajax({

                      type:'POST',
                      url:'/getnoti',
                      data:form.serialize(),
                      success:function(data){
                        for (var k in data.resaults) {
                          iziToast.show({
    title: data.resaults[k].creator,
    message: data.resaults[k].message,
    iconUrl:data.resaults[k].improfile,
    timeout: 7000
});
                     }
                      }
                   });
                },8000);



        </script>



<form method="post" id="theForm">
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <input type="hidden" name="code" value="$user->code" />
  <input type="hidden" name="username" value="{{ Auth::user()->username }}" />
</form>

  <section class="section section-skew" style="padding-top: 20rem;">

      <div class="container">

        <div class="card card-profile shadow">
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
                  <a href="#" class="btn btn-sm btn-info mr-4" data-toggle="modal" data-target="#exampleModal">Edit</a>
                  <a href="#" class="btn btn-sm btn-default float-right" style="visibility:hidden;">Contact</a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">30</span>
                    <span class="description">Followers</span>
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
              <div class="h6 font-weight-300"><i class="material-icons" style="font-size:13pt">email</i> :{{Auth::user()->email}}</div>
              <div class="h6 mt-4"><i class="material-icons" style="font-size:13pt">school</i> :{{$user->namespi}}</div>
              <div><i class="glyphicon glyphicon-asterisk"></i>Joined The Free Education : {{$user->created_at}}</div>



              <div class="col-md-12">
            <button style="margin-top: 30px; margin-left: auto;
    margin-right: auto;width: 90px;height: 90px; border-radius: 50%" type="button" class="btn btn-icon btn-2 btn-primary" data-toggle="modal" data-target="#modal-form2"><i class="fas fa-cloud-upload-alt fa-3x"></i></button>

      <button style="margin-top: 30px; margin-left: auto;
    margin-right: auto;width: 90px;height: 90px; border-radius: 50%" type="button" class="btn btn-icon btn-2 btn-primary" data-toggle="modal" data-target="#modal-form3"><i class="fas fa-file fa-3x"></i></button>
           <div class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tabs_2_2" role="tab" aria-controls="profile" aria-selected="false">
                    <span class="nav-link-icon d-block"><i class="ni ni-chat-round"></i></span>
                  </a>
                </div>




            </div>

            <div class="mt-5 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                <p>{{$user->bio}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

        </section>





         <div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
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

                <form action="" method="post" enctype="multipart/form-data" id="file_form">

                                  <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                      </div>
                                      <input class="form-control" placeholder="Title" name="title" type="text" maxlength="60" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                      </div>
                                      <input class="form-control" placeholder="Description" name="description" type="text" maxlength="250" required>
                                    </div>
                                  </div>


           <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="file" accept="application/pdf,.docx,.zip,.rar,.m" required>
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
          <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <input type="hidden" name="username" value="{{ Auth::user()->username }}" />
        </div>

                                 <div class="text-center">
                                    <button type="button"  id="button_submit" data-toggle="modal" data-target="#virusModal" data-dismiss="modal" class="btn btn-primary my-4">Add File</button>
                                  </div>


                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>



          <script type="text/javascript" >

          $('#button_submit').click(function(){
            $('#file_form').submit();
          });
          </script>


<!-- modal editing -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">


      <div class="modal-body">
        <form action="edit" method="post" enctype="multipart/form-data" id="useredit">

          <div class="form-group">
            <div class="input-group input-group-alternative">
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
          </div>
          </div>
          <div class="input-group mb-3">
         <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image" accept="image/jpeg,image/x-png,image/gif">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>


          </div>
            </div>
                <p class="col-form-label" style="font-size:7pt;">Recomended picture size 160px x 160px</p>
            <div class="form-group">
              <div class="input-group input-group-alternative">
            <textarea class="form-control" placeholder="type your bio here" name="bio" ></textarea>
            </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">

            <input type="password" class="form-control" placeholder="new password" id="pass" name="npass">
          </div>
          </div>


          <div class="form-group">
            <div class="input-group input-group-alternative">

            <input type="password" class="form-control" id="confirm-pass" placeholder="confirm your password" name="cnpass">
            <input type="hidden" value="{{Auth::user()->username}}" name="username" />
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
          </div>
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary"  type="submit">Edit</button>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- end modal editing -->

<!-- modal checking  for virus -->

<div class="modal fade" id="virusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">


      <div class="modal-body">
        <div class="well">
        <p> We are checking for Malwares please wait, it might take a while</p>

      </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- end modal checking for virus -->


<div class="modal fade" id="modal-form3" tabindex="-1" role="dialog" aria-labelledby="modal-form3" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    
  <div class="modal-content">
    <div class="modal-body p-0">
      <div class="card bg-secondary shadow border-0">
      <table class="table" >
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
                                                      <form class="form-inline" action="delete" method="post">
                                                      <a href ="{{$file->location}}"><button type="button" class="btn btn-outline-success" style="margin-left: -8%;" ><i class="fa fa-cloud-download-alt"></i></button></a>
       <a href=""data-toggle="modal" data-target="#Modal{{$file->id}}"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: -7%;"></button></a>


                                                      @csrf
                                                      <input type="hidden" value="{{$file->id}}" name="fileid" />
                                                      <input type="hidden" name="username" value="{{Auth::user()->username}}" />
                                                          <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    <button type="submit" class="btn btn-outline-danger fa fa-trash-alt" ></button>
                                                </form>
</div>

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

@endforeach
  </tbody>
</table>

    </div>

  </div>

    </div>

      </div>

        </div>

          </div>

</div>
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
