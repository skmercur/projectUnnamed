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


$to      = 'support@thefreeedu.com';
$subject = 'contact us';
$message = $text.' ##phone number = '.$phone.' ## email = '.$email;
$headers = 'From: '.$email.'' . "\r\n" .
    'Reply-To: '.$email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



return redirect('/');
}
}
