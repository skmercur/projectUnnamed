@extends('layouts.layout')
@foreach($resaults as $resault)



<div class="container">
	<div class="col-md-9 col-md-pull-3">
        <h1 class="search-results-count" style="margin-top: 7%;margin-left: 50%;">Searsh Results</h1>
        <section class="search-result-item">
            @foreach($resaults as $resault)
            <div class="search-result-item-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h4 class="search-result-item-heading"><a href="#">{{$resault->title}}</a></h4>

                        <p class="description"><?php if(strlen($file->description)>200) echo substr($file->description,0,200)."..."; ?></p>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    </div>
</div>
@endforeach
