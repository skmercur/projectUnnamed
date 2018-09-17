@extends('layouts.layout')

@section('content')

<form action="newgroup" method="post">
@CSRF
<input type="hidden" name="username" value="{{Auth::user()->username}}" />
<input type="text" name="name" value="" />
<input type="text" id="selectPage" class="form-control" value="" name="inviteuser" >
<script>
var tag_data = [
  @foreach($members as $member)
    {id:{{$member->id}} ,name:'{{$member->username}}',desc:'{{$member->lastname}} {{$member->firstname}}'},
    @endforeach
];

$('#selectPage').selectPage({
    showField : 'desc',
    keyField : 'name',
    data : tag_data,
    selectOnly : true,
      pagination : false,
      listSize : 35,
      multiple : true
});
</script>


</select>
<button type="submit" >Create</button>
</form>
<audio id="myAudio">
  <source src="{{asset('assets/audio/sound.wav')}}" type="audio/wav" >
</audio>
<div style="width:80; height:60%; position: fixed;bottom: 10%; overflow-y: scroll;">
  <div  style="display: flex;flex-direction: column-reverse;" >
  <div class="col-md-7">
<!--Chat Messages in Right-->
<div class="scroll-wrapper tab-content scrollbar-wrapper wrapper scrollbar-outer" style="position: relative;"><div class="tab-content scrollbar-wrapper wrapper scrollbar-outer scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 400px;">
  <div class="tab-pane active" id="contact-1">
    <div class="chat-body">
      <ul class="chat-message" id="newm">
     
       
      </ul>
    </div>
  </div>
</div></div>

<div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 86px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 229px; top: 0px;"></div></div></div></div><!--Chat Messages in Right End-->

                  <div class="send-message">
                    <div class="input-group">
                    <form action="nm" method="post" id="nm">
@csrf
                      <input type="text" id="message" class="form-control" autocomplete="off" placeholder="Type your message">
                      <input type="hidden" name="message" id="message1"/>
<input type="hidden" name="username" value="{{Auth::user()->username}}"/>
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="sendChatMessage()">Send</button>
                      </span>
                    </div>
                    </form>
                  </div>
                </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

<script>
$('#nm').keydown(function (e) {
    if (e.keyCode == 13) {
      sendChatMessage();
        e.preventDefault();
        return false;
    }
});
var divnewm = document.getElementById('newm');
var x = 0;
var ss = null;
var z = 0;
var tmp = null;
var audio = document.getElementById("myAudio");
  setInterval(function getChatMessage(){

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var form = $("#nm");
             $.ajax({

                type:'POST',
                url:'/getm',
                data:form.serialize(),
                success:function(data){

                  x = data.nbrl-20;
                for (var k in data.msg) {
                var kk = data.msg[data.nbrl-k];
// console.log( CryptoJS.AES.decrypt(data.msg[data.nbrl-k],"hello").toString(CryptoJS.enc.Utf8));
 var decrypted = CryptoJS.AES.decrypt(""+kk+"", "hello");
var le = ""+kk+"";
var posi = le.search("##user={{Auth::user()->username}}");
var posiIm = le.search("##img=");
var firstnamep = le.search("##f=");
var lastnamep = le.search("##l=");
var impath = le.substring(posiIm+6,firstnamep);
var firstname = le.substring(firstnamep+4,lastnamep);
var lastname = le.substring(lastnamep+4,le.length);
if(posi > 0){


 
              ss +=  '<li class="right">'+
          '<img src="'+impath+'" alt="" class="profile-photo-sm pull-left">'+
         ' <div class="chat-item" >'+
            '<div class="chat-item-header">'+
              '<h5>'+firstname+' '+lastname+'</h5>'+
              '<small class="text-muted">3 days ago</small>'+
            '</div>'+
            '<p>'+decrypted.toString(CryptoJS.enc.Utf8)+'</p>'
          '</div>'+
       ' </li>';
}else{
  ss +=  '<li class="left">'+
  '<img src="'+impath+'" alt="" class="profile-photo-sm pull-left">'+
         ' <div class="chat-item" >'+
            '<div class="chat-item-header">'+
              '<h5>'+firstname+' '+lastname+'</h5>'+
              '<small class="text-muted">3 days ago</small>'+
            '</div>'+
            '<p>'+decrypted.toString(CryptoJS.enc.Utf8)+'</p>'
          '</div>'+
       ' </li>';
}
              
              
              
z = data.nbrl - x;
x++;
if(z == 0){
  break;
}


}
if(tmp !== ss){

divnewm.innerHTML = ss;
audio.play();
tmp = ss;
}

ss = null;
                }

             });
          },1000);

function sendChatMessage(){
encrypt();
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  var form = $("#nm");
  $.ajax({

     type:'POST',
     url:'/nm',
     data:form.serialize(),
     success:function(data){
     }
   });
 }
</script>
</div>

<script type="text/javascript">
function encrypt(){
  if(document.getElementById('message').value !== ''){
 var encrypted = CryptoJS.AES.encrypt(document.getElementById('message').value, "hello");
 document.getElementById('message1').value = encrypted.toString();
  }
}
</script>


@endsection
