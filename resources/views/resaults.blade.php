@extends('layouts.layout')




<div class="container">
	<div class="col-md-9 col-md-pull-3">
        <h1 class="search-results-count" style="margin-top: 7%;margin-left: 50%;">Search Results</h1>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- search -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:728px;height:90px"
				     data-ad-client="ca-pub-1253446609392565"
				     data-ad-slot="1840236457"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
        <section class="search-result-item">
@foreach($resaults as $resault)
            <div class="search-result-item-body">
                <div class="row">
                    <div class="col-sm-9">
                        <h5 class="search-result-item-heading"><a href="#">{{$resault->title}}</a></h5>

                        <p class="description"><?php if(strlen($resault->description)>200) echo substr($resault->description,0,200)."...";else {
                        	echo $resault->description;
                        } ?></p>
                              <table class="table table-hover" style="margin-top: -11%;margin-right: 45%;margin-left: 90%;">

  <tbody>
    
    
      
      <td>






                                                      <form class="form-inline" action="delete" method="post">
                                                      <a href ="{{$resault->location}}"><button type="button" class="btn btn-outline-success" style="margin-left: -8%;" ><i class="fa fa-cloud-download-alt"></i></button></a>
       <a href=""data-toggle="modal" data-target="#Modal"> <button type="button" class="btn btn-outline-warning fa fa-eye" style="margin-left: -7%;"></button></a>


                                                      @csrf
                                                      <input type="hidden" value="{{$resault->id}}" name="fileid" />
                                                      <input type="hidden" name="username" value="{{Auth::user()->username}}" />
                                                          <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    <button type="submit" class="btn btn-outline-danger fa fa-trash-alt" ></button>
                                                </form>


      </td>
    
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Descrption</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p class="description">{{$resault->description}}.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

  </tbody>
</table>
                    </div>
                </div>
            </div>
  @endforeach
        </section>

    </div>
</div>
