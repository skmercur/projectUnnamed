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
     'file' => 'mimes:pdf,docx,ppt,zip,rar|required|max:25000' // max 10000kb
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
   $file_name_with_full_path = realpath($destinationPath.$hash);
   $api_key = getenv('VT_API_KEY') ? getenv('VT_API_KEY') :'7e7da6eb91e8899775e5fbe0d664639943001997d061536489882b2142f36023';
   $cfile = curl_file_create($file_name_with_full_path);

   $post = array('apikey' => $api_key,'file'=> $cfile);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/file/scan');
   curl_setopt($ch, CURLOPT_POST, True);
   curl_setopt($ch, CURLOPT_VERBOSE, 1); // remove this if your not debugging
   curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // please compress data
   curl_setopt($ch, CURLOPT_USERAGENT, "gzip, The Free Education client");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER ,True);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

   $result=curl_exec ($ch);
   $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

   if ($status_code == 200) { // OK
     $js = json_decode($result, true);

   } else {  // Error occured
     return back();
   }
   curl_close ($ch);
sleep(2);

   $post = array('apikey' => '7e7da6eb91e8899775e5fbe0d664639943001997d061536489882b2142f36023','resource'=>$js['resource']);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/file/report');
   curl_setopt($ch, CURLOPT_POST,1);
   curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // please compress data
   curl_setopt($ch, CURLOPT_USERAGENT, "gzip, The Free Education client");
   curl_setopt($ch, CURLOPT_VERBOSE, 1); // remove this if your not debugging
   curl_setopt($ch, CURLOPT_RETURNTRANSFER ,true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

   $result = curl_exec ($ch);
   $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   print("status = $status_code\n");
   if ($status_code == 200) { // OK
     $js = json_decode($result, true);
    if($js['positives'] > 0){
      unlink($destinationPath.$hash);
return back();
}else{
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
}
   } else {  // Error occured
    return "error";
   }
   curl_close ($ch);




   // return back();
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
