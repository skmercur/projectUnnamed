<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\groups;
class groupscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
public function newGroup(Request $request){
  $user = $request->input('username');
  if(!empty($user)){
    $name = $request->input('name');
    $invite = $request->input('inviteuser');
    groups::create([
    'name'=>$name,
    'groupid'=>'group-'.substr(md5($name.mt_rand(1000,9999)),0,143),
    'admin'=>$user,
    'members'=>'',
    'pmembers'=>$invite,
    'type'=>0,
    'chat'=>1,
    'key'=>mt_rand(1000,9999),

    ]);
echo "yes";
  }

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function NewChatMessage(Request $request){
      $fhandle = fopen('hello','a+');
      $message = $request->input('message');
      fwrite($fhandle,$message."\n");
      fclose($fhandle);

     }
     public function getNewMessage(Request $request){

$file = file('hello');

return response()->json(array('msg'=>$file,'nbrl'=>count($file)),200);
     }
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
