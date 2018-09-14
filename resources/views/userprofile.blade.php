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



  <section class="section section-skew" style="padding-top: 20rem;">
      <div class="container">
        <div class="card card-profile shadow">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ $user->imgpath}}" class="rounded-circle" style="max-height:180px">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">

                <div class="card-profile-actions py-4 mt-lg-0">



  @if(in_array(Auth::user()->username,$followers))

  <form method="post" action="rmf" >
                  <button type="submit" class="btn btn-sm btn-danger float-right">Unfollow</button>
                  <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">Contact</button>
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <input type="hidden" name="useru" value="<?php echo base64_encode(encrypt($user->username)); ?>" />
                  <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
                  </form>
                  @else
                  <form action="newf" method="post">
<button type="submit" class="btn btn-sm btn-default float-right">Follow</button>
                  @endif
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <input type="hidden" name="useru" value="<?php echo base64_encode(encrypt($user->username)); ?>" />
                  <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
                </form>
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">
                      <div>
                        <span class="heading">{{$nbrfollowers}}</span>
                        <span class="description">Followers</span>
                      </div>
                  <div>
                    <span class="heading">{{$downloads}}</span>
                    <span class="description">Downloads</span>
                  </div>
                  <div>
                    <span class="heading">{{100 - $user->nfiles}}</span>
                    <span class="description">Files</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h3>{{$user->firstname}}  {{$user->lastname}}
                <span class="font-weight-light">, {{$user->gender}}</span>
              </h3>

              <div class="h6 mt-4"><i class="material-icons" style="font-size:13pt">school</i> : {{$user->namespi}}</div>

              <div><i class="glyphicon glyphicon-asterisk"></i>Joined The Free Education : {{$user->created_at}}</div>



              <div class="col-md-12">



      <button style="margin-top: 30px; margin-left: auto;
    margin-right: auto;width: 90px;height: 90px; border-radius: 50%" type="button" class="btn btn-icon btn-2 btn-primary"  ><i class="fa fa-file fa-3x"></i></button>
           <div class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tabs_2_2" role="tab" aria-controls="profile" aria-selected="false">
                    <span class="nav-link-icon d-block"><i class="ni ni-chat-round"></i></span>
                  </a>
                </div>


<section id="modal-form3" class="collapse" >


        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  <tbody >
    <?php $id = 1; ?>
    @foreach($files as $file)
    <tr>
      <th scope="row" style="min-width:20px">{{$id}}</th>
      <td >{{$file->title}}</td>
      <td><?php if(strlen($file->description)>50) echo substr($file->description,0,50)."...";else{
        echo $file->description;
        $id +=1;
      } ?></td>
      <td >




 <form class="form-inline" action="delete" method="post">
<div class="btn-group">
   
    <a href ="{{$file->location}}"><button type="button" class="btn btn-outline-success fa fa-cloud-download"  ></button></a>

  <a href="" data-toggle="modal" data-target="#Modal{{$file->id}}"> <button type="button" class="btn btn-outline-warning fa fa-eye" ></button></a>


                                                      @csrf
                                                      <input type="hidden" value="{{$file->id}}" name="fileid" />
                                                      <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
                                                          <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                          <button type="submit" class="btn btn-outline-danger fa fa-trash" ></button>
  
</div>
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





</section>


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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="sendsms" method="post">
        @CSRF
        <input type="hidden" name="usert" value="<?php echo base64_encode(encrypt($user->username)); ?>" />
        <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />

        <div class="form-group">
    <label for="exampleFormControlTextarea1">Message : </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
  </div>
  <button type="submit"  class="btn btn-success">Send</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit"  class="btn btn-success">Envoyer</button> -->
      </div>
    </div>
  </div>
</div>





<div id="container-floating">


  <div class="nd3 nds" data-toggle="tooltip" data-placement="left" ><img class="reminder">

	 <p class="letter"><i class="fa fa-flag" data-toggle="modal" data-target="#ModalReport" style="margin-top:7px;"></i></p>

    <form action="reportguest" method="post">
  		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		</form>
  <!-- <p class="letter"><i class="fa fa-flag"style="margin-top:7px;"></i></p>  -->
  </div>
  <div class="nd1 nds" data-toggle="tooltip" data-placement="left"><img class="reminder">
    <p class="letter"><i class="fa fa-comment" data-toggle="modal" data-target="#ModalContact" style="margin-top:7px;"></i></p>
  </div>

  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="newmail()">
    <p class="plus"><i class="fa fa-ellipsis-v"></i></p>
    <img class="edit fa fa-ellipsis-v" >

  </div>

</div>

<div class="modal fade" id="ModalContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="sendcontacthelp" method="post" id="contactForm" >
              @CSRF
<input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
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

<div class="modal fade" id="ModalReport" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" style="height:auto;width:auto;">

                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Report : {{$user->firstname}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                        <div class="modal-body p-0">
                          <div class="card bg-secondary shadow border-0">

                            <div class="card-body px-lg-5 py-lg-5">



          <form action="reportguest" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="user" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />

                  <div class="form-group">
                    <p>The reason for the Report : </p>

                    <div class="input-group input-group-alternative">



                <select class="form-control" name="reportcause" id="reportcause" >

          <option value="0">User published something is mine or someone else i know</option>
          <option value="1" style="font-size:12pt">User published something that should not be on The Free Education</option>
          <option value="2">User has an inappropriate username </option>
          <option value="3">User has an inappropriate profile picture </option>
          <option value="2">User has used an inappropriate title or a description </option>

            </select>

</div>
</div>

<div class="form-group">
  <div class="input-group input-group-alternative">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
    </div>
    <textarea class="form-control" placeholder="Description" name="details" type="text" maxlength="250" required ></textarea>
  </div>
</div>




                                  <div class="modal-footer">
                                    <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" style="margin-left:2%; margin-right:2%">Report</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:2%; margin-right:2%">Close</button>
</div>
                                  </div>

          </form>
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
                },2500);



        </script>



<form method="post" id="theForm">
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
<input type="hidden" name="code" value="<?php echo base64_encode(encrypt($user->code)); ?>" />
</form>
@if(!empty(Request::query('v')))
<?php
$va = base64_decode(Request::query('v'));
switch($va){

case 555:{

?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Sorry!</strong> The file you are trying to upload is not currently supported or already exists.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
break;
}

case 100:{

?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> There is a connection error please try again.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
break;
}
case 444:{

?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Warning!</strong> We have detected a Malware in the files you are trying to upload
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
break;
}

case 10:{

?>
<div class="alert  alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> your file has been successfully uploaded
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
break;
}


}

 ?>

@endif
  <section class="section section-skew" style="padding-top: 22rem;">

      <div class="container">

        <div class="card card-profile shadow">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ Auth::user()->imgpath}}" class="rounded-circle"  style="max-height:180px">
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
                    <span class="heading">{{$nbrfollowers}}</span>
                    <span class="description">Followers</span>
                  </div>
                  <div>
                    <span class="heading">{{$downloads}}</span>
                    <span class="description">Downloads</span>
                  </div>
                  <div>
                    <span class="heading">{{100 - $user->nfiles}}</span>
                    <span class="description">Files</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h3>{{Auth::user()->firstname}}  {{Auth::user()->lastname}}
                <span class="font-weight-light">, {{Auth::user()->gender}}</span>
              </h3>

              <div class="h6 mt-4"><i class="material-icons" style="font-size:13pt">school</i> :{{$user->namespi}}</div>
              <div><i class="glyphicon glyphicon-asterisk"></i>Joined The Free Education : {{$user->created_at}}</div>



              <div class="col-md-12">
                @if((Auth::user()->nfiles > 0) && (Auth::user()->tsize > 0) )
            <button style="margin-top: 30px; margin-left: auto;
    margin-right: auto;width: 90px;height: 90px; border-radius: 50%" type="button" class="btn btn-icon btn-2 btn-primary" data-toggle="modal" data-target="#modal-form2"><i class="fa fa-cloud-upload fa-3x"></i></button>
    @else

    <button style="margin-top: 30px; margin-left: auto;
margin-right: auto;width: 90px;height: 90px; border-radius: 50%" type="button" class="btn btn-icon btn-2 btn-primary" data-toggle="modal" data-target="#RunOutSpaceModal"><i class="fa fa-cloud-upload fa-3x"></i></button>


<div class="modal fade" id="RunOutSpaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">


      <div class="modal-body">
        <div class="well">
        <p> You have exceeded your account limits </p>
        <p> You have <b>{{100 - Auth::user()->nfiles}}</b> files and <b>{{100 - Auth::user()->tsize}} mb</b>  of files  </p>
        <p> please contact us at support@thefreeedu.com </p>


      </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</div>
</div>

@endif
     <button data-toggle="collapse" data-target="#modal-form3" style="margin-top: 30px; margin-left: auto;
    margin-right: auto;width: 90px;height: 90px; border-radius: 50%" type="button" class="btn btn-icon btn-2 btn-primary">

   <i class="fa fa-file fa-3x">
      

    </i></button></a>
           <div class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tabs_2_2" role="tab" aria-controls="profile" aria-selected="false">
                    <span class="nav-link-icon d-block"><i class="ni ni-chat-round"></i></span>
                  </a>
                </div>


<section id="modal-form3" class="collapse" >


        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  <tbody >
    <?php $id = 1; ?>
    @foreach($files as $file)
    <tr>
      <th scope="row" style="min-width:20px">{{$id}}</th>
      <td >{{$file->title}}</td>
      <td><?php if(strlen($file->description)>50) echo substr($file->description,0,50)."...";else{
        echo $file->description;
        $id +=1;
      } ?></td>
      <td >




 <form class="form-inline" action="delete" method="post">
<div class="btn-group">
   
    <a href ="{{$file->location}}"><button type="button" class="btn btn-outline-success fa fa-cloud-download"  ></button></a>

  <a href="" data-toggle="modal" data-target="#Modal{{$file->id}}"> <button type="button" class="btn btn-outline-warning fa fa-eye" ></button></a>


                                                      @csrf
                                                      <input type="hidden" value="{{$file->id}}" name="fileid" />
                                                      <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
                                                          <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                          <button type="submit" class="btn btn-outline-danger fa fa-trash" ></button>
  
</div>
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





</section>



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
                                      <input class="form-control" placeholder="Title" name="title" type="text" maxlength="60"  id="title" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                      </div>
                                      <textarea class="form-control" placeholder="Description" name="description" type="text" maxlength="250" required id="desc"></textarea>
                                    </div>
                                  </div>


           <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="file" accept="application/pdf,.docx,.zip,.rar,.m" required>
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
          <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
        </div>
        <div class="form-group">
          <p>In which category this file should be: </p>

          <div class="input-group input-group-alternative">



      <select class="form-control" name="namespi" id="reportcause" >
@foreach($spec as $s)
<option value="{{$s->namespi}}">{{$s->namespi}}</option>
@endforeach

  </select>

</div>
</div>
<h3>Or</h3>
<br>
        <div class="form-group">

            <div class="checkbox" onclick="checkBox()" >

<label>
<input data-toggle="toggle" type="checkbox" id="checkBoxForLink" data-onstyle="success" data-on="On" data-off="Off">
Google drive shared link
</label>
</div>
<input class="form-control" placeholder="Link" id="linkv" name="linkv" type="url" onkeyup="checkLink()"  style="visibility:hidden" required>
<small id="status" style="float:left" ></small>
<script type="text/javascript">
$(document).ready(function(){
$('#checkBoxForLink').change(function() {

checkBox();

})
});
function checkBox(){
if(document.getElementById('checkBoxForLink').checked){
  document.getElementById("linkv").style.visibility = "hidden";
  document.getElementById("inputGroupFile01").disabled = false;
}else{

document.getElementById("linkv").style.visibility = "visible";
document.getElementById("inputGroupFile01").disabled = true;
}
}
function checkLink(){
var s = document.getElementById("linkv").value;
var status = document.getElementById("status");
var posi = s.search("https://drive.google");
if((posi == 0 )&& (s.length > 40)){
  status.style.color = "green";
status.innerHTML = "valid ";
document.getElementById("button_submit").disabled = false;
}else{
    status.style.color = "red";
  status.innerHTML = "not valid ";
  document.getElementById("button_submit").disabled = true;
}
}
</script>
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
<div class="form-group">
          <div class="container1">
         <img id="output_image" src="{{Auth::user()->imgpath}}" style="width:220px;height:220px;max-width:100%">
         <input type="hidden" id="x" name="x" value="0" />
         <input type="hidden" id="y" name="y" value="0" />
         <input type="hidden" id="h" name="h" value="0" />
         <input type="hidden" id="w" name="w" value="0" />
</div>
</div>
          <div class="input-group mb-3">
         <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image" onchange="loadFile(event)" accept="image/jpeg,image/x-png,image/gif">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

              <script>
              var loadFile = function(event) {
                var output = document.getElementById('output_image');
                output.src = URL.createObjectURL(event.target.files[0]);
                LaunchCropper();
              };
              </script>
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
            <input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
          </div>
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" id="edit_btn" onclick="check()" type="button">Edit</button>
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


<!--/////////////////////////-->

<div id="container-floating">


  <div class="nd1 nds" data-toggle="tooltip" data-placement="left"><img class="reminder">
    <p class="letter"><i class="fa fa-comment" data-toggle="modal" data-target="#ModalContact" style="margin-top:7px;"></i></p>
  </div>

  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" >
    <p class="plus"><i class="fa fa-ellipsis-v"></i></p>
    <img class="edit fa fa-ellipsis-v" >

  </div>
</div>

<div class="modal fade" id="ModalContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="sendcontacthelp" method="post" id="contactForm" >
              @CSRF
<input type="hidden" name="username" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" name="text" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div></div>


      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
                </form>
      </div>
    </div>
  </div>
</div>




@endif
@endguest
@endsection

    <script type="text/javascript">

      $('#bootstrap-data-table-export').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
        }
    </script>
