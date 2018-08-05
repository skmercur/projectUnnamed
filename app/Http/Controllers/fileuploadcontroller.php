<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\fileupload;

class fileuploadcontroller extends Controller
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
    public function check(Request $request)
    {

        if(!empty($request->f)){
          $data = $request->f;
$val = DB::table('files')->where('location',$data)->first();
$downloads = $val->downloads +1;
DB::table('files')->where('location',$data)->update(['downloads'=>$downloads]);
return redirect($data);

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

    }

    public function saveUploadFile(Request $request){
      $username = $request->input('username');
      $title= $request->input('title');
      $description = $request->input('description');
   $file = $request->file('file');
   if(!empty($title) || !empty($description) || !empty($file)){
    $fileArray = array('file' => $file);
   $rules = array(
     'file' => 'mimes:pdf,docx|required|max:25000' // max 10000kb
   );
$validator = Validator::make($fileArray, $rules);



  $size =  ceil($file->getSize()/(1024*1024));



 if($validator->fails()){
   echo "sorry your file is not supported";
   //Move Uploaded File

 }else {
$hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
   $destinationPath = "usersdata/".md5('uploads'.$username)."/";
   $file->move($destinationPath,$hash);

   fileupload::create([
       'filename' => $file->getClientOriginalName(),
       'author' => $username,
       'title' => $title,
       'description' =>$description,
       'location'=>$destinationPath.$hash,
       'downloads'=>0,
       'size'=>$size,


   ]);
   $val = DB::table('users')->where('username',$username)->first();
$newsize = $val->tsize - $size;
$newnumber = $val->nfiles - 1;
DB::table('users')->where('username',$username)->update(['tsize'=>$newsize,'nfiles'=>$newnumber]);


   return back();
   // DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.'/'.$file->getClientOriginalName()]);
   //  DB::table('users')->where('username',$user)->update(['namesp' =>$namespi]);
}
return back();
}else{
  return back();
}
return back();
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
    public function delete(Request $request)
    {
      $user = $request->input('username');
      if(!empty($user)){
        $id = $request->input('fileid');
        $db =DB::table('files')->where('id',$id)->first();
        $location = $db->location;
        unlink($location);
        $val = DB::table('users')->where('username',$user)->first();
     $newsize = $val->tsize + $db->size;
     $newnumber = $val->nfiles + 1;
     DB::table('users')->where('username',$user)->update(['tsize'=>$newsize,'nfiles'=>$newnumber]);
DB::table('files')->where('id',$id)->delete();

return back();
}else{
  echo "error you are not connected";
}
    }
}
