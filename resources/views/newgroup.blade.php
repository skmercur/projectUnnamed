
  @extends('layouts.groupelayout')

@section('content')
  

    <div id="page-contents">
    	<div class="container">
    		<div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			<div class="col-md-3 static">
         
            <div class="profile-card">
            	
            	<h5><a href="#" class="text-white">{{$name}}</a></h5>
            	<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.html">My Newsfeed</a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="newsfeed-people-nearby.html">People Nearby</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.html">Friends</a></div></li>
              <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">Messages</a></div></li>
              <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Images</a></div></li>
              <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li>
            </ul><!--news-feed links ends-->
            <div id="chat-block">
              <div class="title">Chat online</div>
              <ul class="online-users list-inline">
                <li><a href="newsfeed-messages.html" title="Hichem"><img src="{{asset('assets/img/3d3d660132d05053ba2709f2e46def978.png')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Sofiane"><img src="{{asset('assets/img/Sofiane.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Walid"><img src="{{asset('assets/img/Walid.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
              </ul>
            </div><!--chat block ends-->
          </div>
         
    			<div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->
            <div class="create-post">
            	<div class="row">
              <iframe name="votar" style="display:none;"></iframe>
              <form id="status" method="POST" action="ns" enctype="multipart/form-data" target="votar">
              @CSRF
              <input id="type" type="hidden" name="typetoupload" value="0" />
              <input type="hidden" name="username" value="{{Auth::user()->username}}" />
              <input type="hidden" name="groupid" value="{{$groupid}}" />
            		<div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <img src="{{asset('assets/img/sms.png')}}" alt="" class="profile-photo-md" />
                    <textarea name="description" style="font-size: small;" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                  </div>
                </div>
            		<div class="col-md-5 col-sm-5">
                  <div class="tools">
                    <ul class="publishing-tools list-inline">
                      <li><a href="#" onclick="typeUpload(0);"><i class="ion-compose"></i></a></li>
                      <li><a href="#" onclick="typeUpload(1);"><i class="ion-images"></i></a></li>
                      <li><a href="#" onclick="typeUpload(2);"><i class="ion-document"></i></a></li>
                      
                    </ul>
                    <button type="submit" class="btn btn-primary pull-right" >Publish</button>
                  </div>
                  <div class="row">
                  <div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <input type="file" name="imageupload" style="visibility: hidden;" id="imageupload"/>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <input type="file" name="fileupload" style="visibility: hidden;" id="fileupload"/>
                  </div>
                </div>
                  <script>
function typeUpload(val){
  document.getElementById("type").value = val;
  switch(val){
    case 0:{
      document.getElementById("imageupload").style.visibility = "hidden";
      document.getElementById("fileupload").style.visibility = "hidden";
      break;
    }
    case 1:{
      document.getElementById("imageupload").style.visibility = "visible";
      document.getElementById("fileupload").style.visibility = "hidden";
      break;
    }
    case 2:{
      document.getElementById("imageupload").style.visibility = "hidden";
      document.getElementById("fileupload").style.visibility = "visible";
      break;
    }
  }
}
              </script>
              </div>
                  </form>
                </div>
            	</div>
            </div><!-- Post Create Box End-->

            <!-- Post Content
            ================================================= -->
            @if(!empty($status))
            @foreach($status as $statu)
            @switch($statu->type)
            @case(0)
            <div class="post-content">
              <div class="post-container">
                <img src="/{{$statu->imgpath->imgpath}}" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="/{{$statu->username}}" class="profile-link">{{$statu->author}}</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a status at {{$statu->created_at}}</p>
                  </div>
                  <div class="reaction">
                    <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                    <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                  </div>
                  <div class="line-divider"></div>
                  <div id="comments">
    @foreach($comments as $comment)
    @if($comment->statusid === $statu->id)
    
    <div class="post-comment">
      <img src="/{{$comment->imgpath->imgpath}}" alt="" class="profile-photo-sm" />
      <p><a href="/{{$comment->username}}" class="profile-link">{{$comment->author}} </a><i class="em em-laughing"></i> {{$comment->comment}}</p>
    </div>
    @endif
    @endforeach
    </div>
    <form action="nc" method="POST" id="newcomment">
    @CSRF
    
              <input type="hidden" name="username" value="{{Auth::user()->username}}" />
              <input type="hidden" name="groupid" value="{{$groupid}}" />
              <input type="hidden" name="statusid" value="{{$statu->id}}" />
    <div class="post-comment">
   
      <img src="/{{Auth::user()->username}}" alt="" class="profile-photo-sm" />
      <input type="text" class="form-control" name="comment" placeholder="Post a comment">
      </form>
    
    </div>
  </div>
</div>
</div>
            @break
            @case(1)
            <div class="post-content">

<img src="/{{$statu->flocation}}" alt="post-image" class="img-responsive post-image" />
<div class="post-container">
  <img src="/{{Auth::user()->imgpath}}" alt="user" class="profile-photo-md pull-left" />
  <div class="post-detail">
    <div class="user-info">
      <h5><a href="/{{$statu->author}}" class="profile-link">{{$statu->author}}</a> <span class="following">following</span></h5>
      <p class="text-muted">Published a photo at {{$statu->created_at}} </p>
    </div>
    <div class="reaction">
      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
      <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
    </div>
    <div class="line-divider"></div>
    <div class="post-text">
      <p>{{$statu->description}} <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
    </div>
    <div class="line-divider"></div>
    <div id="comments">
    @foreach($comments as $comment)
    @if($comment->statusid === $statu->id)
    <div class="post-comment">
      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
      <p><a href="timeline.html" class="profile-link">{{$comment->author}} </a><i class="em em-laughing"></i> {{$comment->comment}}</p>
    </div>
    @endif
    @endforeach
    </div>
    <form action="nc" method="POST" id="newcomment">
    @CSRF
    
              <input type="hidden" name="username" value="{{Auth::user()->username}}" />
              <input type="hidden" name="groupid" value="{{$groupid}}" />
              <input type="hidden" name="statusid" value="{{$statu->id}}" />
    <div class="post-comment">
   
      <img src="/{{Auth::user()->username}}" alt="" class="profile-photo-sm" />
      <input type="text" class="form-control" name="comment" placeholder="Post a comment">
      </form>
    
    </div>
  </div>
</div>
</div>
   
  

            @break
@case(2)
<div class="post-content">

<a href="/{{$statu->flocation}}"><i class="ion-document" style="font-size:20vh"></i></a>

<div class="post-container">
  <img src="/{{Auth::user()->imgpath}}" alt="user" class="profile-photo-md pull-left" />
  <div class="post-detail">
    <div class="user-info">
      <h5><a href="/{{$statu->author}}" class="profile-link">{{$statu->author}}</a> <span class="following">following</span></h5>
      <p class="text-muted">Published a file at {{$statu->created_at}} </p>
    </div>
    <div class="reaction">
      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
      <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
    </div>
    <div class="line-divider"></div>
    <div class="post-text">
      <p>{{$statu->description}} <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
    </div>
    <div class="line-divider"></div>
    <div id="comments">
    @foreach($comments as $comment)
    @if($comment->statusid === $statu->id)
    <div class="post-comment">
      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
      <p><a href="timeline.html" class="profile-link">{{$comment->author}} </a><i class="em em-laughing"></i> {{$comment->comment}}</p>
    </div>
    @endif
    @endforeach
    </div>
    <form action="nc" method="POST" id="newcomment">
    @CSRF
    
              <input type="hidden" name="username" value="{{Auth::user()->username}}" />
              <input type="hidden" name="groupid" value="{{$groupid}}" />
              <input type="hidden" name="statusid" value="{{$statu->id}}" />
    <div class="post-comment">
   
      <img src="/{{Auth::user()->username}}" alt="" class="profile-photo-sm" />
      <input type="text" class="form-control" name="comment" placeholder="Post a comment">
      </form>
    
    </div>
  </div>
</div>
</div>

@break

            @endswitch
            @endforeach
            @endif


          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
    			<div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 style="background-color: #9e9e9e05 ">Who to Follow</h4>
              <div class="follow-user">
                <img src="{{asset('assets/img/Walid.jpg')}}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Walid</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{asset('assets/img/Sofiane.jpg')}}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Sofiane</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{asset('assets/img/3d3d660132d05053ba2709f2e46def978.png')}}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Hichem</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
             
            </div>
          </div>
    		</div>
    	</div>
    </div>

    <!-- Footer
    ================================================= -->
    <footer id="footer">
      <div class="container">
      	<div class="row">
          <div class="footer-wrapper">
            <div class="col-md-3 col-sm-3">
              <a href=""><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
              <ul class="list-inline social-icons">
              	<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For individuals</h5>
              <ul class="footer-links">
                <li><a href="">Signup</a></li>
                <li><a href="">login</a></li>
                <li><a href="">Explore</a></li>
                <li><a href="">Finder app</a></li>
                <li><a href="">Features</a></li>
                <li><a href="">Language settings</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For businesses</h5>
              <ul class="footer-links">
                <li><a href="">Business signup</a></li>
                <li><a href="">Business login</a></li>
                <li><a href="">Benefits</a></li>
                <li><a href="">Resources</a></li>
                <li><a href="">Advertise</a></li>
                <li><a href="">Setup</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>About</h5>
              <ul class="footer-links">
                <li><a href="">About us</a></li>
                <li><a href="">Contact us</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms</a></li>
                <li><a href="">Help</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-3">
              <h5>Contact Us</h5>
              <ul class="contact">
                <li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
                <li><i class="icon ion-ios-email-outline"></i>info@thunder-team.com</li>
                <li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
              </ul>
            </div>
          </div>
      	</div>
      </div>
      <div class="copyright">
        <p>Thunder Team © 2016. All rights reserved</p>
      </div>
		</footer>
    
    @endsection

 