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
                                    },2500);






window.removenoti =  function(id){
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
};





                              window.getNotifi = function(){
if(z === 0){
                              $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var form = $("#theFormNoti");
                                       $.ajax({

                                          type:'POST',
                                          url:'/getnotilayout',
                                          data:form.serialize(),
                                          success:function(data){

                                            for (var k in data.resaults) {

if(x !== data.resaults[k].message){

                                           $("#notifications").append('<li class="notificationAdded"><div class="row">'+
                                              '<div class="col-lg-2 col-xs-1" style="margin-left:2%"><div class="user_img"><img src="'+data.resaults[k].improfile+'" alt="" style= "max-height:40px; max-width:40px;"></div>'+
                                            '</div> <div class="col-lg-7 col-xs-4 "> <p style="font-size:8pt;margin-left:5px;">  '+
                                               data.resaults[k].message+
                                               '</p> </div><div class="col-lg-1 col-xs-1"><a href="#" onclick="removenoti('+data.resaults[k].id+')"> <i class="material-icons" style="max-width:20px;max-height:20px;">remove_circle_outline</i></a> </div> </div> <div class="row"><div class="col"> <div class="notification_bottom"> <small>'+data.resaults[k].created_at+'</small></div> </div> </div>  '+
                                               ''+
                                             ''+
                                            ''+
          ''+
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
