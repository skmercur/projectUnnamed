@extends('layouts.app')
@section('content')
@guest
<h3>error , it seeams that you are not connected  </h3>
@else
@if(empty($user->username))
<h3>error , user doesn't exist </h3>
@else
@if($user->username != Auth::user()->username)
<h3> Welcome to  {{$user->lastname}} {{$user->firstname}} profile</h3>
<img src="{{$user->imgpath}}" width="120" height="120" />

@else
<h3> Welcome, {{Auth::user()->lastname}} {{Auth::user()->firstname}}</h3>
<img src="{{Auth::user()->imgpath}}" width="120" height="120" />
@endif
@endif
@endguest
@endsection
