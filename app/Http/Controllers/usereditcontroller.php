<?php

namespace App\Http\Controllers;

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

    public function userEdit(Request $request){
      $user = $request->input('username');
      $cpass = $request->input('cpass');
      $npass = $request->input('npass');
      $cnpass = $request->input('cnpass');
      $email = $request->input('email');
      $file = $request->file('image');
      $vuser = DB::table('users')->where('username',$user)->first();

      if($vuser->username !== ''){

          echo "ok";
          if($cnpass === $npass){
            if(!empty($npass) && !empty($cnpass)){
            $npass = Hash::make($npass);
        $fileArray = array('image' => $file);
       $rules = array(
         'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
       );
    $validator = Validator::make($fileArray, $rules);

     if($validator->fails()){
       echo "sorry your file is not supported";
        DB::table('users')->where('username',$user)->update(['email' =>$email,'password'=>$npass]);
return back();
     }else {
       $hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
          $destinationPath = "usersdata/".md5('uploads'.$user)."/";
          $file->move($destinationPath,$hash);
          $db =  DB::table('users')->where('username',$user)->first();
          unlink($db->imgpath);
       DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.$hash]);
        DB::table('users')->where('username',$user)->update(['email' =>$email,'password'=>$npass]);
return back();
      }
}else{
  $hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
     $destinationPath = "usersdata/".md5('uploads'.$user)."/";
     $file->move($destinationPath,$hash);
     $db =  DB::table('users')->where('username',$user)->first();
     unlink($db->imgpath);
        DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.$hash]);
        return back();
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
