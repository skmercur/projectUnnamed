@extends('layouts.app')
@section('content')
<form method="post" action="confirm">
<input type="number"  name="codeu">
<input type="hidden" name="_token" value="{{csrf_token()}}" />

<input type="hidden" name="user" value="{{ Auth::user()->username }}" />
<button class="btn btn-outline-primary" type="submit" name="submit" value="upload">confirm</button>
</form>
@endsection
