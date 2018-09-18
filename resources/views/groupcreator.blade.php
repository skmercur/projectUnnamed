
	@extends('layouts.group')

@section('content')
    <!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
    	<div class="container wrapper">
        <div class="row">
        	<div class="col-sm-5">
            <div class="intro-texts">
            	<h1 class="text-white">Create Groupe</h1>
            	<p> Creat Groupe and change file and images with your frinds , 
                    and you should have greater than 5 folower and Greater than 3 files , learn hear "The Free Education" !! .</p>
              <button class="btn btn-primary">Role de groupe </button>
            </div>
          </div>
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            

              
              <!--Registration Form Contents-->
              <div class="tab-content">
                <div class="tab-pane active" id="register">
                  <h3>Create Groupe !!!</h3>
                  <p class="text-muted"> collect your frinds to learn her</p>
                  
                  <!--Register Form-->
                  <!-- <form name="registration_form" id='registration_form' class="form-inline">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="namegroupe" class="sr-only">Name Groupe</label>
                        <input id="namegroupe" class="form-control input-group-lg" type="text" name="namegroupe" title="Enter Groupe name" placeholder="Groupe name"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="email" class="sr-only">Bio </label>
                        <input id="text" class="form-control input-group-lg" type="text" name="Bio" title="Bio" placeholder="Bio"/>
                      </div>
                    </div>
                    <div class="row">
  <div class="form-group">
    <label for="image_group"class="sr-only">Groupe Photo:</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</div> -->

                   
                   <form action="newgroup" method="post">
@CSRF
<input type="hidden" name="username" value="{{Auth::user()->username}}" />
<script>

var tag_data = [
  @foreach($members as $member)
    {id:{{$member->id}} ,name:'{{$member->username}}',desc:'{{$member->lastname}} {{$member->firstname}}'},
    @endforeach
];

$('#selectPage').selectPage({
    showField : 'desc',
    keyField : 'name',
    data : tag_data,
    selectOnly : true,
      pagination : false,
      listSize : 35,
      multiple : true
});
</script>

 <div class="row">
                      <div class="form-group col-md-12">
                        <label for="namegroupe" class="sr-only">Name Groupe</label>
                        <input id="namegroupe" class="form-control input-group-lg" type="text" name="name"  placeholder="Groupe name"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="selectPage" class="sr-only">Users Groupe</label>
                        <input id="selectPage" class="form-control input-group-lg" type="text" name="inviteuser" placeholder="Users Groupe"/>
                      </div>
                    </div>
                    <div class="row">
                    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Type</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">Public</option>
    <option value="2">private</option>
    
  </select>
</div>
</div>
                    <div class="row">
                    <div class="form-group col-md-12">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Groupe Photo</label>
</div>
</div>
<div class="row">
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Enable chat</span>
  </div>
  <div class="input-group-text">
      <input type="checkbox" aria-label="Checkbox for following text input">
    </div>
    </div>
</div>
<div class="row" style="padding-top: 15px;">

<button type="submit" class="btn btn-primary" >Create Now </button>
</div>


</form>
         
                
                  <!-- <button class="btn btn-primary">Create Now</button>
                  </form>Register Now Form Ends -->
                </div><!--Registration Form Contents Ends-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    @endsection
