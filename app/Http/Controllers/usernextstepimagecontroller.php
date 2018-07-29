<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
   echo 'File Name: '.$file->getClientOriginalName();
   echo '<br>';

   //Display File Extension
   echo 'File Extension: '.$file->getClientOriginalExtension();
   echo '<br>';

   //Display File Real Path
   echo 'File Real Path: '.$file->getRealPath();
   echo '<br>';

   //Display File Size
   echo 'File Size: '.$file->getSize();
   echo '<br>';

   //Display File Mime Type
 if($validator->fails()){
   echo "sorry your file is not supported";
   //Move Uploaded File

 }else {

   $destinationPath = 'uploads';
   $file->move($destinationPath,$file->getClientOriginalName());
   DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.'/'.$file->getClientOriginalName()]);
    DB::table('users')->where('username',$user)->update(['namesp' =>$namespi]);


 }
}

public function useredit(Request $request){
  $user = $request->input('username');
  $cpass = $request->input('cpass');
  $npass = $request->input('npass');
  $email = $request->input('email');
  $file = $request->input('image');
  $vuser = DB::table('users')->where('username',$user)->get();
  if(!empty($vuser->username)){
    if($vuser->password === Hash::make($cpass)){
      if($cpass === $npass){
    $fileArray = array('image' => $file);
   $rules = array(
     'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
   );
$validator = Validator::make($fileArray, $rules);

   //Display File Name
   echo 'File Name: '.$file->getClientOriginalName();
   echo '<br>';

   //Display File Extension
   echo 'File Extension: '.$file->getClientOriginalExtension();
   echo '<br>';

   //Display File Real Path
   echo 'File Real Path: '.$file->getRealPath();
   echo '<br>';

   //Display File Size
   echo 'File Size: '.$file->getSize();
   echo '<br>';

   //Display File Mime Type
 if($validator->fails()){
   echo "sorry your file is not supported";
   DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.'/'.$file->getClientOriginalName()]);
    DB::table('users')->where('username',$user)->update(['email' =>$email,'password'=>$npass]);

 }else {

   $destinationPath = 'uploads';
   $file->move($destinationPath,$file->getClientOriginalName());
   DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.'/'.$file->getClientOriginalName()]);
    DB::table('users')->where('username',$user)->update(['email' =>$email,'password'=>$npass]);

  }
}
}
}
}

}
