<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class emailController extends Controller
{
  public function send(Request $request){
  
  Mail::send(['text'=>'mail'],['name','support'],function($message){
    $message->to('khoudoursofiane75@gmail.com','to sofiane')->subject('test email');
    $message->from('support@thefreeedu.com','support');
  });
}
}
