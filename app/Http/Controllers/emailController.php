<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class emailController extends Controller
{
  public function send(Request $request){
$email =  $request->input('email');
$name =  $request->input('name');
$phone =  $request->input('phonenumber');
$text = $request->input('text');


$to      = 'support@thefreeedu.com';
$subject = 'contact us';
$message = $text.' ##phone number = '.$phone.' ## email = '.$email;
$headers = 'From: '.$email.'' . "\r\n" .
    'Reply-To: '.$email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



return redirect('/');
}
  public function resend(Request $request){
    $user = $request->input('user');
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
    // $headers = '';
    // $headers.= 'To: '.$firstname.','.$lastname.' <'.$email.'>';
    // $headers.= 'From: The support team <support@thefreeedu.com>';
    // $headers .= "MIME-Version: 1.0\r\n";
    // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    // $headers .= 'From: support@thefreeedu.com' . "\r\n" .
    //    'Reply-To: support@thefreeedu.com' . "\r\n" .
    //    'X-Mailer: PHP/' . phpversion();

$headers = 'From: support@thefreeedu.com'."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers.= "Content-type: text/html; charset=UTF8". PHP_EOL ;
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







public function sch(Request $request){
  $user = $request->input('username');
  if(!empty($user)){
    $prob = $request->input('text');
  $val = DB::table('users')->where('username',$user)->first();
  if(!empty($val->username)){
  $email = $val->email;
  $firstname = $val->firstname;
  $lastname = $val->lastname;
if((!empty($email)) && (!empty($firstname)) && (!empty($lastname))){


  $headers = 'From: support@thefreeedu.com'."\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers.= "Content-type: text/html; charset=UTF8". PHP_EOL ;
     // Mail::send('mail',$data,function($message) use ($email){
     //   $message->to($email)->subject('Your activation code');
     //   $message->from('support@thefreeedu.com','support');
     // });
     $message = '
     <html>
     <head>
       <title>User Requesting help</title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     </head>
     <body>

       <div class="container">
       <h3>Dear Team </h3>
       <br>
       <h4>Good day to you  </h4>
         <br>
      <div class="container">

<div class="card">
<div class="card-body">
<div class="row">
<div class="col">
<p> User <b>'.$user.'</b> is requesting help </p>
<p> Message from user </p>
<p>'.$prob.'</p>
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
     mail("support@thefreeedu.com", "$user has a problem", $message, $headers);
     return back();
   }else{
     return back();
   }
}

}
return back();
}
















  public function report(Request $request){
    $user = $request->input('user');
    $cause = $request->input('reportcause');
    $detail = $request->input('details');






    $to      = 'support@thefreeedu.com';
    $subject = 'report user :'.$user;
    $message = $user.' ##cause = '.$cause.' ## detail = '.$detail;
$headers = 'From: <support@thefreeedu.com>'.
        'Reply-To: <support@thefreeedu.com>' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);



    return back();

  }
  public function resetpass(Request $request){
    $email = $request->input('email');
    if(!empty($email)){

      $code = mt_rand(1000,9999);
       DB::table('users')->where('email',$email)->update(['code'=>$code]);
         $val = DB::table('users')->where('email',$email)->first();
       $code = $val->code;
       $email = $val->email;
       $firstname = $val->firstname;
       $lastname = $val->lastname;

       // Additional headers
       $headers = 'From: support@thefreeedu.com'."\r\n";
       $headers .= "MIME-Version: 1.0\r\n";
       $headers.= "Content-type: text/html; charset=UTF8". PHP_EOL ;
          // Mail::send('mail',$data,function($message) use ($email){
          //   $message->to($email)->subject('Your activation code');
          //   $message->from('support@thefreeedu.com','support');
          // });




          $message = '
          <html>
          <title>Rest password</title>
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
            this is your code to reset your password <b>'.$code.'</b> please click on <a href="https://www.thefreeedu.com/rpcc?codeu='.$code.'"><button class="btn btn-primary">Verify</button></a> to continue
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
          mail($email, "You asked to reset your password on The Free Education", $message, $headers);
return view('auth/recover');

    }else{
      return back();
    }
  }
  public function resetpasscheck(Request $request){
    $codeu = $request->codeu;
    if(!empty($codeu)){
  $val = DB::table('users')->where('code',$codeu)->first();
  $code = $val->code;
  if(!empty($code)){

return view('auth/passwords/resetpassword')->with(['status'=>1,'code'=>$code]);
  }else{
  return back();
  }
    } else{
      return back();
    }
  }
  public function finalpass(Request $request){
    $email = $request->input('email');
    $pass = $request->input('pass');
    $passc = $request->input('passc');
    $code = $request->input('code');

    if((!empty($email))&&(!empty($pass)) && (!empty($passc)) && (!empty($code))){
      if($pass === $passc){
        $pass = Hash::make($pass);
   DB::table('users')->where('email',$email)->where('code',$code)->update(['password'=>$pass]);
     return redirect('/login');

}else{
  return back();
}
    } else{
      return view('welcome');
    }
  }
  public function sendemail(){
    $val = DB::table('users')->where('status',0)->get();
    foreach ($val as $user) {
      $email = $user->email;
      $firstname = $user->firstname;
      $lastname = $user->lastname;

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
           <title>Please complete your registration on The Free Education</title>
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         </head>
         <body>

           <div class="container">
           <h5>Dear '.$firstname.','.$lastname.'</h5>
           <h6>Good day to you </h6>
             <div class="well">We have noticed that you didnt complete your registration on The Free Education  please click on <a href="https://www.thefreeedu.com/auth/nextstep">
             <button class="btn btn-primary">Complete</button></a> to continue
             </div>
           </div>
           <footer>
           <p>From The Free Education team</p>
           <p>if there is any problem contact us at : support@thefreeedu.com </p>
           </footer>
         </body>
         </html>
         ';
         mail($email, "Complete registration", $message, $headers);
         sleep(3);
    }
  }

  public function sendemailRequestSpeciality(Request $request){
    $user=  $request->input('user');
    $text = $request->input('text');
  $val = DB::table('users')->where('username',$user)->where('status',0)->first();
if(!empty($val->username)){
    $to      = 'support@thefreeedu.com';
    $subject = 'Request a new speciality';
    $message = $text.' ## email = '.$val->email.' speciality'.$text;
    $headers = 'From: '.$val->email.'' . "\r\n" .
        'Reply-To: '.$val->email.'' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);


echo "Email Was sent we will contact you";
    return redirect('/'.$user);
  }else{
    return redirect('/auth/nextstep?v=1');
  }
}


  }
