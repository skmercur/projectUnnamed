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
  <div id="newm" style="display: flex;flex-direction: column-reverse;" ></div>
<form action="nm" method="post" id="nm">
@csrf
<input type="text"  id="message"  autocomplete="off" />
<input type="hidden" name="message" id="message1"/>
<button type="button" onclick="sendChatMessage()" >Send</button>
</form>
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
              ss += '<p>'+decrypted.toString(CryptoJS.enc.Utf8)+'</p>';
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
