<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class usereditcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function resend(Request $request){
      $user = $request->input('username');
      if(!empty($user)){
      $val = DB::table('users')->where('username',$user)->first();
      $code = $val->code;
      $email = $val->email;
      $firstname = $val->firstname;
      $lastname = $val->lastname;
      $data = array(
         'code'=>$code,
         'email'=>$email,
         'firstname'=>$firstname,
         'lastname'=>$lastname
      );


      // Additional headers
      $headers = '';
      $headers.= 'To: '.$firstname.','.$lastname.' <'.$email.'>';
      $headers.= 'From: The support team <support@thefreeedu.com>';
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
      $headers .= 'From: support@thefreeedu.com' . "\r\n" .
         'Reply-To: support@thefreeedu.com' . "\r\n" .
         'X-Mailer: PHP/' . phpversion();
         // Mail::send('mail',$data,function($message) use ($email){
         //   $message->to($email)->subject('Your activation code');
         //   $message->from('support@thefreeedu.com','support');
         // });
         $message = '
         <html>
         <head>
           <title>Your activation code</title>
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
         </head>
         <body>

           <div class="container">
           <h3>Dear '.$firstname.','.$lastname.'</h3>
           <br>
           <h4>Good day to you </h4>
             <br>
          <div class="container">

  <div class="card">
  <div class="card-body">
  <div class="row">
  <div class="col">
   <p> This is your activation code  <b>'.$code.'</b> click on this <a href="https://thefreeed.com/confirm">link </a> to type your activation code</p>
  </div>
  </div>
  </div>
  </div>
           </div>
           <footer>
           <p>From The Free Education team</p>
           <p>if there is any problem contact us at : support@thefreeedu.com </p>
           </footer>
         </body>
         </html>
         ';
         mail($email, "Your activation code for The Free Education", $message, $headers);
    return redirect($user);

    }else {
    return back();
    }

    return redirect($user);
    }
    public function userEdit(Request $request){
      $user = $request->input('username');
      $cpass = $request->input('cpass');
      $npass = $request->input('npass');
      $cnpass = $request->input('cnpass');
      $email = $request->input('email');
      $bio = $request->input('bio');
      $file = $request->file('image');
      $vuser = DB::table('users')->where('username',$user)->first();

      if($vuser->username !== ''){


          if($cnpass === $npass){
            if(!empty($npass) && !empty($cnpass)){

            $npass = Hash::make($npass);
        $fileArray = array('image' => $file);
       $rules = array(
         'image' => 'mimes:jpeg,jpg,png,gif|required|max:5000' // max 10000kb
       );
    $validator = Validator::make($fileArray, $rules);

     if($validator->fails()){
       if(empty($bio)){

        DB::table('users')->where('username',$user)->update(['email' =>$email,'password'=>$npass,'status'=>0]);


$this->resend($request);







return back();
}else{

          DB::table('users')->where('username',$user)->update(['email' =>$email,'password'=>$npass,'bio'=>$bio,'status'=>0]);

$this->resend($request);





  return back();
}
     }else {
       if(empty($bio)){
         $x = $request->input('x');
         $y = $request->input('y');
         $w = $request->input('w');
         $h = $request->input('h');
       $hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
          $destinationPath = "usersdata/".md5('uploads'.$user)."/";

          $db =  DB::table('users')->where('username',$user)->first();

          if($destinationPath.$hash !==  $db->imgpath){

            $file->move($destinationPath,$hash);
            if(($file->getClientOriginalExtension() === 'jpg') || ($file->getClientOriginalExtension() === 'png') ){
      $loc = $_SERVER['DOCUMENT_ROOT'].'/py/resize.py';
      $filenameUp = $destinationPath.$hash;

          shell_exec("python $loc $filenameUp $x $y $w $h");

            }
            DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.$hash]);
            if($db->imgpath !== "uploads/default.png"){
            unlink($db->imgpath);
          }
          }
       DB::table('users')->where('username',$user)->update(['email' =>$email,'password'=>$npass,'status'=>0]);
$this->resend($request);
return back();
}else{
  $x = $request->input('x');
  $y = $request->input('y');
  $w = $request->input('w');
  $h = $request->input('h');
  $hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
     $destinationPath = "usersdata/".md5('uploads'.$user)."/";

     $db =  DB::table('users')->where('username',$user)->first();
if($destinationPath.$hash !==  $db->imgpath){
  $file->move($destinationPath,$hash);
  if(($file->getClientOriginalExtension() === 'jpg') || ($file->getClientOriginalExtension() === 'png') ){
$loc = $_SERVER['DOCUMENT_ROOT'].'/py/resize.py';
$filenameUp = $destinationPath.$hash;

shell_exec("python $loc $filenameUp $x $y $w $h");

  }
  DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.$hash]);
  if($db->imgpath !== "uploads/default.png"){
  unlink($db->imgpath);
}
}
   DB::table('users')->where('username',$user)->update(['email' =>$email,'password'=>$npass,'bio'=>$bio,'status'=>0]);
$this->resend($request);
}
      }
}else{
  if(empty($bio)){
    $x = $request->input('x');
    $y = $request->input('y');
    $w = $request->input('w');
    $h = $request->input('h');
  $hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
     $destinationPath = "usersdata/".md5('uploads'.$user)."/";
     $db =  DB::table('users')->where('username',$user)->first();
     if($destinationPath.$hash !==  $db->imgpath){
       $file->move($destinationPath,$hash);
       if(($file->getClientOriginalExtension() === 'jpg') || ($file->getClientOriginalExtension() === 'png') ){
     $loc = $_SERVER['DOCUMENT_ROOT'].'/py/resize.py';
     $filenameUp = $destinationPath.$hash;

     shell_exec("python $loc $filenameUp $x $y $w $h");

       }
       DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.$hash]);
       if($db->imgpath !== "uploads/default.png"){
       unlink($db->imgpath);
     }
     }
        return back();
      }else{
        $x = $request->input('x');
        $y = $request->input('y');
        $w = $request->input('w');
        $h = $request->input('h');
        $hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
           $destinationPath = "usersdata/".md5('uploads'.$user)."/";

           $db =  DB::table('users')->where('username',$user)->first();

           if($destinationPath.$hash !==  $db->imgpath){
             $file->move($destinationPath,$hash);
             if(($file->getClientOriginalExtension() === 'jpg') || ($file->getClientOriginalExtension() === 'png') ){
           $loc = $_SERVER['DOCUMENT_ROOT'].'/py/resize.py';
           $filenameUp = $destinationPath.$hash;

           shell_exec("python $loc $filenameUp $x $y $w $h");

             }
             DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.$hash,'bio'=>$bio]);
             if($db->imgpath !== "uploads/default.png"){
             unlink($db->imgpath);
           }
           }
              return back();
      }
}
    }else{
return back();
    }

    }else{
      echo "error login";
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
