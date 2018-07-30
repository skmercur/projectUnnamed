<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectRespons;
use Mail;

class usernextstepimagecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('auth/nextstep');
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
    public function getSpeciality(){
      $spec=   DB::table('spicialitys')->get();

return view('auth/nextstep')->with('spec',$spec);
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

    public function saveUploadFile(Request $request){
      $user = $request->input('user');
      $namespi = $request->input('namesp');
   $file = $request->file('image');
    $fileArray = array('image' => $file);
   $rules = array(
     'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
   );
$validator = Validator::make($fileArray, $rules);

   //Display File Name


   //Display File Mime Type
 if($validator->fails()){
   echo "sorry your file is not supported";
   return back();

 }else {

   $hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
      $destinationPath = "usersdata/".md5('uploads'.$user)."/";
      $file->move($destinationPath,$hash);
   DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.$hash]);
    DB::table('users')->where('username',$user)->update(['namespi' =>$namespi]);
    $db =   DB::table('users')->where('username',$user)->first();

    Mail::send(['text'=>'mail'],['name','support'],function($message){
      $message->to($db->email,'to'.$db->firstname.",".$db->lastname)->subject('Your activation code');
      $message->from('support@thefreeedu.com','support');
    });

return redirect($user);

 }
}

}
