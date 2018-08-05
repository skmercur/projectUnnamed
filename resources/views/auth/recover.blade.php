@extends('layouts.app')
@section('content')


<form method="get" action="rpcc" style="margin-left: 33%;margin-top: 12%;margin-right: 37%;" >
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Activation code number: </span>
  </div>
  <input type="text" class="form-control" name="codeu" aria-label="Code" aria-describedby="Code">
</div>


<div class="container">
<div class="btn-group">
<button class="btn btn-outline-primary" type="submit" name="submit" style="margin-left: 40%;" value="upload">confirm</button>
</form>
</div>
</div>
<div class="alert alert-success" role="alert" style="margin-left: 15%;margin-top: 5%;margin-right:  15%;">
  <h4 class="alert-heading">Well done!</h4>
  <p>Check you inbox for the code to recover your account</p>
  <hr>
  <p class="mb-0">Hint if you don't find the activation code in the inbox it might be in the spam folder.</p>
</div>


@endsection
