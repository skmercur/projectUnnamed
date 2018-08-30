@extends('layouts.app')
@section('content')

<div class="row">
  <div class="container text-center">

<form method="post" action="confirm"  >

<div class="input-group mb-3" style="margin-left:2%; margin-right:2%;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default" >Code </span>
  </div>
  <input type="text" class="form-control" name="codeu" aria-label="Code" aria-describedby="Code" style="min-width:250px;">
</div>
<input type="hidden" name="_token" value="{{csrf_token()}}" />

<input type="hidden" name="user" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
<div class="btn-group">
<button class="btn btn-outline-primary" type="submit" name="submit" style="margin-left: 2%;" value="upload">confirm</button>
</form>
<form method="post" action="resend" >
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <input type="hidden" name="user" value="<?php echo base64_encode(encrypt(Auth::user()->username)); ?>" />
<button class="btn btn-outline-primary" type="submit" name="submit" style="margin-left: 5%;" value="upload">resend email</button>
</form>
</div>

<div class="alert alert-success" role="alert" style="margin-left: 15%;margin-top: 5%;margin-right:  15%;">
  <h4 class="alert-heading">Well done!</h4>
  <p>You are successfully registered on The Free Education, now you need to check you inbox for the activation code.</p>
  <hr>
  <p class="mb-0">Hint if you don't find the activation code in the inbox it might be in the <b style="color:red">spam</b> folder.</p>
</div>
</div>
</div>
@endsection
