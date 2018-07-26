@extends('layouts.app')
@section('content')
@guest
<h3>error , it seeams that you are not connected  </h3>
@else
@if($user->username != Auth::user()->username)
<h3> Welcome to , {{$user->name}} profile</h3>
@else
<h3> Welcome, {{Auth::user()->name}}</h3>
@endif
@endguest
@endsection
