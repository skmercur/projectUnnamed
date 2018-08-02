<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class emailController extends Controller
{
  public function send(Request $request){
$email =  $request->input('email');
$name =  $request->input('name');
$phone =  $request->input('phonenumber');
$text = $request->input('text');
$headers = '';
$headers.= 'To: support team <support@thefreeedu.com>';
$headers.= 'From: Contact us <'.$email.'>';
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= 'From: '.$email.'' . "\r\n" .
    'Reply-To: '.$email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    // Mail::send('mail',$data,function($message) use ($email){
    //   $message->to($email)->subject('Your activation code');
    //   $message->from('support@thefreeedu.com','support');
    // });
    $message = '
    <html>
    <head>
      <title>Contact us</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

      <div class="container">
      <h5>Dear Team </h5>
      <h6>Good day to you </h6>
        <div class="well">an email from '.$name.' was sent to this inbox for futher processing</b>
<p>
with the following details :
phone number : '.$phone.'
email adress : '.$email.'
text : '.$text.'
</p>
        </div>
      </div>

    </body>
    </html>
    ';
    mail($email, "A contact us message", $message, $headers);

return redirect('/');
}
}
