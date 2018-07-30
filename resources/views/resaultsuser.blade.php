@extends('layouts.layout')




<div class="container">
	<div class="col-md-9 col-md-pull-3">
        <h1 class="search-results-count" style="margin-top: 7%;margin-left: 50%;">Search Results</h1>
        <h2> Users </h2>
        <section class="search-result-item">
      @foreach($users as $user)
      @if($user->username != '')
            <div class="search-result-item-body">
                <div class="row">
                    <div class="col-sm-9">
                        <a href="/{{$user->username}}"><img src="{{$user->imgpath}}" height="80" width="80" /> </a> <h4 class="search-result-item-heading"><a href="/{{$user->username}}">{{$user->firstname}} {{$user->lastname}}</a></h4>
                    </div>
                </div>
            </div>
            @else
            <div class="search-result-item-body">
                <div class="row">
                    <div class="col-sm-9">
                      <a href="#">no user was found</a></h4>
                    </div>
                </div>
            </div>
            @endif
      @endforeach
        </section>
        <h2> files </h2>
        <section class="search-result-item">
@foreach($resaults as $resault)
            <div class="search-result-item-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h4 class="search-result-item-heading"><a href="#">{{$resault->title}}</a></h4>

                        <p class="description"><?php if(strlen($resault->description)>200) echo substr($resault->description,0,200)."...";else {
                        	echo $resault->description;
                        } ?></p>
                    </div>
                </div>
            </div>
  @endforeach
        </section>

    </div>
</div>
