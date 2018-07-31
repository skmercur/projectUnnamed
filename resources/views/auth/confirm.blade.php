@extends('layouts.app')
@section('content')


<form method="post" action="confirm" style="margin-left: 33%;margin-top: 12%;margin-right: 37%;" >
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Confirmation: </span>
  </div>
  <input type="text" class="form-control" name="codeu" aria-label="Code" aria-describedby="Code">
</div>
<input type="hidden" name="_token" value="{{csrf_token()}}" />

<input type="hidden" name="user" value="{{ Auth::user()->username }}" />
<button class="btn btn-outline-primary" type="submit" name="submit" style="margin-left: 40%;" value="upload">confirm</button>
</form>
<div class="alert alert-success" role="alert" style="margin-left: 15%;margin-top: 5%;margin-right:  15%;">
  <h4 class="alert-heading">Well done!</h4>
  <p>You are successfully registered on The Free Education, now you need to check you inbox for the activation code.</p>
  <hr>
  <p class="mb-0">Hint if you don't find the activation code in the inbox it might be in the spam folder.</p>
</div>


@endsection
