<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\notifications;

class PageController extends Controller
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




public function getNotificationLayout (Request $request){
  $user = $request->username;
  $code = $request->code;


$resaults = DB::table('notifications')->where('target',$user)->orderBy('created_at', 'desc')->limit(5)->get();
$resaultss = $resaults;
foreach ($resaultss as $resault) {
DB::table('notifications')->where('target',$user)->where('seen',0)->update(['seen'=>1]);
}
return response()->json(array('resaults'=>$resaults),200);
}


public function getNotification(Request $request)
{
  $user = $request->username;
  $code = $request->code;


$resaults = DB::table('notifications')->where('target',$user)->where('seen',0)->orderBy('created_at', 'desc')->limit(5)->get();
$resaultss = $resaults;
foreach ($resaultss as $resault) {
DB::table('notifications')->where('target',$user)->where('seen',0)->update(['seen'=>1]);
}
return response()->json(array('resaults'=>$resaults),200);
}


public function getNotificationNumber(Request $request)
{
  $user = $request->username;
  $code = $request->code;


$resaults = DB::table('notifications')->where('target',$user)->where('seen',0)->orderBy('created_at', 'desc')->limit(5)->get();
$numberNoti = $resaults->count();
$resaultss = $resaults;

return response()->json(array('resaults'=>$resaults,'numberNoti'=>$numberNoti),200);

}
public function removenoti(Request $request)
{
  $user = $request->username;
  $code = $request->code;
$id = $request->id;

 DB::table('notifications')->where('target',$user)->where('id',$id)->delete();

// foreach ($resaultss as $resault) {
// DB::table('notifications')->where('target',$user)->where('seen',0)->update(['seen'=>1]);
// }
return response()->json(array('status'=>'removed'),200);

}


    public function getPage(Request $request)
   {

     $value = $request['slug'];
if(!empty($value)){
$user =   DB::table('users')->where('username',$value)->first();
$files = DB::table('files')->where('author',$value)->get();


if(!empty($user->username)){
  $downloads=0;
  $uploads =0;
  foreach ($files as $file) {
    $uploads++;
    $downloads = $downloads + $file->downloads;
  }
  $fol = $user->followers;
  $followers = explode(',',$fol);
  $nbrfollowers = 0;
  foreach ($followers as $follow) {
    $nbrfollowers++;
  }
  return view('userprofile')->with(['user'=>$user,'files'=>$files,'downloads'=>$downloads,'uploads'=>$uploads,'followers'=>$followers,'nbrfollowers'=>$nbrfollowers]);
}else {

  return view('errors/404');
}
return back();
}
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
public function notify(Request $request){
  $creator = $request->input('username');
  $useru = $request->input('useru');
  $message = '<a href="/'.$creator.'">'.$creator.'</a> is following you follow him back';
  $val =   DB::table('users')->where('username',$creator)->first();
  $improfile = $val->imgpath;
notifications::create([
'creator'=>$creator,
'message'=>$message,
'target'=>$useru,
'seen'=>0,
'improfile'=>$improfile,

]);

}
    public function newFollower(Request $request){
      $user = $request->input('username');
      $useru = $request->input('useru');
      $val =   DB::table('users')->where('username',$useru)->first();
      $followers = $val->followers;
      if(strlen($followers) > 0){
        $pices = explode(',',$followers);
        if(in_array($user,$pices)){
        return back();
        }else{
DB::table('users')->where('username',$useru)->update(['followers'=>$followers.','.$user]);
$this->notify($request);
return back();
        }

      }else{
         DB::table('users')->where('username',$useru)->update(['followers'=>$user]);
         $this->notify($request);
         return back();

      }
    }
public function unfollow(Request $request){
  $user = $request->input('username');
  $useru = $request->input('useru');
  $val =   DB::table('users')->where('username',$useru)->first();
  $followers = $val->followers;
    $pices = explode(',',$followers);
  if(in_array($user,$pices)){
$key = array_search($user,$pices);
unset($pices[$key]);
$followers = implode(',',$pices);
 DB::table('users')->where('username',$useru)->update(['followers'=>$followers]);
return back();
  }else{
    return back();
  }
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
}
