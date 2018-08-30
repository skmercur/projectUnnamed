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

                                    var timer;
                                    var ss = document.getElementById('navbarsearchDataList');
                                    window.keyChecking = function(event) {
                                      document.getElementById('searchV').value = document.getElementById('navbarsearch').value;
                                      clearTimeout(timer);
                                     timer = setTimeout(function () {
                                         getMessage();
                                     }, 500);

                                      }


                                        window.getMessage =   function() {
                                    var x = [];
                                            $.ajaxSetup({
                                              headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                              }
                                          });
                                          var form = $("#theFormNoti");
                                                     $.ajax({

                                                        type:'POST',
                                                        url:'/getsugg',
                                                        data:form.serialize(),
                                                        success:function(data){
                                                          for (var k in data.resaults) {

                                    if(ss.options.length >0){
                                    for(var i = 0; i<ss.options.lenght; i++){
                                    ss.children[i].remove();
                                    }
                                    }

                                                            if(x.indexOf(data.resaults[k].title) == -1 ){
                                                              x.push(data.resaults[k].title);

                                    }
                                    }
                                    for (var k in data.users) {
                                     if(x.indexOf(data.users[k].firstname+' '+data.users[k].lastname) == -1 ){
                                       x.push(data.users[k].firstname+' '+data.users[k].lastname);
                                     }
                                    }

                                    for (var k in x) {
                                      $("#navbarsearchDataList").append('<option id=" '+k+'" value="'+
                                                    x[k] + '"></option>');

                                    }

                                    for(var i =0; i < ss.options.length; i++){
                                      for(var j =0; j< ss.options.length; j++){
                                        if(  ss.children[j+1].value ===  ss.children[i].value ){
                                    ss.children[j].remove();
                                    }
                                    }
                                    }
                                                       }
                                                    });
                                                 }
