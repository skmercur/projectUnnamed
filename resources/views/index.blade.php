@extends('layouts.layout')

@section('content')
<div class="card" style="margin:5px;background-color:#d3d3d3;">
<div class="container" >
    <div id="carouselContent" class="carousel slide" data-ride="carousel" data-pause="hover">
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active text-center p-4">
							<h1 style=" font-family: lato; font-size: 30pt;" >
								Welcome to The Free Education
							</h1>
							<br>
							<h4>
								<span>The Free Education is the right place where you can share your knowledge with the world and you can learn from other people on The Free Education</span>
									<span>All accounts and files are monitored by The Free Education team to ensure you security</span>

							</h4>
								<span><small style="color:black;">We are also counting on you to help us make The Free Education a better place</small><span>
							<br>
            </div>
            <div class="carousel-item text-center p-4">

							<h3>
								<span>Would you like to proceed with this tutorial to learn how to add a file on The Free Education ? </span>
							</h3>
							<br>
								 <div class="btn-wrapper">
<!-- <a href="./examples/login.html" class="btn btn-success">Login Page</a>
<a href="./examples/register.html" class="btn btn-white">Register Page</a> -->
	<a href="/" class="btn btn-warning">Skip</a>
</div>
            </div>
						<div class="carousel-item text-center p-4">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/fwLaEBPB5fw?rel=0&loop=1&autoplay=1&playlist=fwLaEBPB5fw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

						</div>
        </div>
        <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>
<script>
$('.carousel').carousel({

});
</script>


@endsection
