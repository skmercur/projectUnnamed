var x =null;
var j =0;
var z = 0;

                            setInterval(function getNotifiNumber(){
                              $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var form = $("#theFormNoti");
                                       $.ajax({

                                          type:'POST',
                                          url:'/getnotiNum',
                                          data:form.serialize(),
                                          success:function(data){

                                           $('#numberNoti').text(data.numberNoti);

                                        }
                                       });
                                    },500);
function removenoti(id){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var form = $("#theFormNoti");


           $.ajax({

              type:'POST',
              url:'/removenoti',
              data:form.serialize()+'&id='+id,
              success:function(data){
getNotifi();
}

});
}

                            function getNotifi(){
if(z === 0){
                              $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var form = $("#theFormNoti");
                                       $.ajax({

                                          type:'POST',
                                          url:'/getnoti',
                                          data:form.serialize(),
                                          success:function(data){

                                            for (var k in data.resaults) {

if(x !== data.resaults[k].message){

                                           $("#notifications").append('<li class="notificationAdded"><a href="#">'+
                                              ' <div class="user_img"><img src="'+data.resaults[k].improfile+'" alt=""></div>'+
                                            '  <div class="notification_desc">'+
                                               data.resaults[k].message+
                                               '<p><span>'+data.resaults[k].created_at+'</span></p>'+
                                               '</div>'+
                                             '<div class="clearfix"></div>'+
                                            '</a>'+
          '<a href="#" onclick="removenoti('+data.resaults[k].id+')"> <i class="material-icons">remove_circle_outline</i></a>'+
        ' </li>');
x =data.resaults[k].message;

}else{
k++;

}
                                          }
                                        }
                                       });

z = 1;                                       // $(".dropdown-menu .notificationAdded").remove();
}else{
  $(".dropdown-menu .notificationAdded").remove();
  z = 0;
}
                                    };