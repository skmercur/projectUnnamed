@extends('layouts.maillayout')
@section('content')
<div class="container">


<h4>Dear, {{$firstname}} {{$lastname}} </h4>
<h6>Good day to you,</h6>
<div class="well">
<p>Here is you activation code: <b>{{$code}}</b></p>
</div>
<footer>
<p>From The Free Education team</p>
</footer>
</div>
@endsection
