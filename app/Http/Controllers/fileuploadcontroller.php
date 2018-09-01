<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\fileupload;
use App\notifications;
use Illuminate\Support\Facades\Crypt;
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

    }
    public function resizeIm()
    {
            $val = DB::table('users')->get();
            foreach ($val as $user) {
              if($user->username){
        $loc = $_SERVER['DOCUMENT_ROOT'].'/py/rescale.py';
        $filenameUp = $user->imgpath;

            shell_exec("python $loc $filenameUp");

              }
              sleep(1);
            }
    }

    public function sendEm(Request $request,$target){
      $user = $request->input('username');
      if(!empty($user) && !empty($target)){
      $val = DB::table('users')->where('username',$user)->first();
      $val2 = DB::table('users')->where('username',$target)->first();


  if((!empty($user)) && (!empty($target)) && (!empty($val2->email)) && (!empty($val2->firstname)) &&(!empty($val->firstname))){
    $im = $val->imgpath;
    $email = $val2->email;
    $firstname = $val->firstname;
    $lastname = $val->lastname;
    $firstname1 = $val2->firstname;
    $lastname1 = $val2->lastname;
      // Additional headers
      $boundary = uniqid('np');
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "From: Support Team  \r\n";
      $headers .= "To: ".$email."\r\n";
      $headers .="Reply-To: support@thefreeedu.com \r\n";
      $headers .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";
      $message = "This is a MIME encoded message.";
      $message .= "\r\n\r\n--" . $boundary . "\r\n";
      $message .= "Content-type: text/plain;charset=utf-8\r\n\r\n";
      $message .="$firstname , $lastname has uploaded a new file ";
      $message .= "\r\n\r\n--" . $boundary . "\r\n";
      $message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
             $message .= '
         <html>
         <head>
           <title></title>
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
         </head>
         <body>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

           <div class="container">
           <h3>Dear '.$firstname1.','.$lastname1.'</h3>
           <br>
           <h4>Good day to you </h4>
             <br>
          <div class="container">

<div class="card">
<div class="card-body">
<div class="row">
<div class="col">
   <p> <a href="https://thefreeedu.com/'.$user.'"> <img src="https://www.thefreeedu.com/'.$im.'" style="max-height:60px;max-width:60px"> '.$firstname.','.$lastname.' </a> has added a new file that might interest you </p>
</div>
</div>
</div>
</div>
           </div>
           <footer>
          <p>From The Free Education team</p>
          <p>if there is any problem contact us at : support@thefreeedu.com </p>
          <div class="container h-100 d-flex justify-content-center">

     <a href="https://www.thefreeedu.com/" ><img src="https://www.thefreeedu.com/assets/img/logo1.png" style="max-height:20%;max-width:20%;" class="img-thumbnail"/> </a>

</div>
</footer>
         </body>
         </html>
         ';
//run in seperate process

     mail($email, "A new file has been uploaded", $message, $headers);

sleep(2);


}else{
  echo "error ";
  echo "<p>please contact support@thefreeedu.com for more informations</p>";
}
}
}

    public function notify(Request $request){
      $creator = $request->input('username');
        $creator= decrypt(base64_decode($creator));
      $message = '<a href="/'.$creator.'">'.$creator.'</a> has added a new file';
      $val =   DB::table('users')->where('username',$creator)->first();
      $followers = $val->followers;
      $improfile = $val->imgpath;
      $pices = explode(',',$followers);
      foreach ($pices as $target) {


$this->sendEm($request,$target);
    notifications::create([
    'creator'=>$creator,
    'message'=>$message,
    'target'=>$target,
    'seen'=>0,
    'improfile'=>$improfile,

    ]);
  }

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
      $username= decrypt(base64_decode($username));
      $title= $request->input('title');
      $description = $request->input('description');
      $description = preg_replace("/&#?[a-z0-9]+;/i","",$description);
      $title = preg_replace("/&#?[a-z0-9]+;/i","",$title);
      $namespi = $request->input('namespi');
      $link = $request->input('linkv');
      if(!empty($link)){
        $posi = strpos($link,"https://drive.google");

if(!empty($title) && !empty($description) && ($posi == 0) && (strlen($link) > 40)){

       fileupload::create([
           'filename' => substr(md5($link),0,39),
           'author' => $username,
           'title' => $title,
           'description' =>$description,
           'location'=>$link,
           'downloads'=>0,
           'size'=>0,
           'namespi'=>$namespi,


       ]);
       $this->notify($request);
       return back();
}else{
  return back();
}
      }else{
   $file = $request->file('file');
   if(!empty($title) && !empty($description) && !empty($file)){
    $fileArray = array('file' => $file);
   $rules = array(
     'file' => 'mimes:pdf,docx,ppt,zip,rar|required|max:25000' // max 10000kb
   );
$validator = Validator::make($fileArray, $rules);



  $size =  ceil($file->getSize()/(1024*1024));



 if($validator->fails()){
   return redirect('/'.$username.'?v='.base64_encode('555'));
   //Move Uploaded File

 }else {

$isthere = DB::table('files')->where('filename',$file->getClientOriginalName())->get();
if($isthere->count() > 0){
  return redirect('/'.$username.'?v='.base64_encode('555'));
}

$hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
   $destinationPath = "usersdata/".md5('uploads'.$username)."/";
$file->move($destinationPath,$hash);
   $file_name_with_full_path = realpath($destinationPath.$hash);
   $api_key = getenv('VT_API_KEY') ? getenv('VT_API_KEY') :'7e7da6eb91e8899775e5fbe0d664639943001997d061536489882b2142f36023';
   $cfile = curl_file_create($file_name_with_full_path);

   $post = array('apikey' => $api_key,'file'=> $cfile);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/file/scan');
   curl_setopt($ch, CURLOPT_POST, True); // remove this if your not debugging
   curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // please compress data
   curl_setopt($ch, CURLOPT_USERAGENT, "gzip, The Free Education client");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER ,True);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

   $result=curl_exec ($ch);
   $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

   if ($status_code == 200) { // OK
     $js = json_decode($result, true);

   } else {  // Error occured
      return redirect('/'.$username.'?v='.base64_encode('100'));
   }
   curl_close ($ch);
sleep(5);

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

   if ($status_code == 200) { // OK
     $js = json_decode($result, true);
if (array_key_exists('positives',$js)){
     if($js['positives'] > 0){
      unlink($destinationPath.$hash);
 return redirect('/'.$username.'?v='.base64_encode('444'));
}else{
$val2 = DB::table('files')->where('author',$username)->get();
if($val2->count() == 0){
   DB::table('users')->where('username',$username)->update(['status'=>0]);
}

     fileupload::create([
         'filename' => $file->getClientOriginalName(),
         'author' => $username,
         'title' => $title,
         'description' =>$description,
         'location'=>$destinationPath.$hash,
         'downloads'=>0,
         'size'=>$size,
         'namespi'=>$namespi,


     ]);


     $val = DB::table('users')->where('username',$username)->first();
  $newsize = $val->tsize - $size;
  $newnumber = $val->nfiles - 1;
  DB::table('users')->where('username',$username)->update(['tsize'=>$newsize,'nfiles'=>$newnumber]);
  $this->notify($request);
}

   } else {  // Error occured
      unlink($destinationPath.$hash);
  return redirect('/'.$username.'?v='.base64_encode('100'));
   }
 }else{
   return redirect('/'.$username.'?v='.base64_encode('100'));
 }
   curl_close ($ch);




   // return back();
   // DB::table('users')->where('username',$user)->update(['imgpath' => $destinationPath.'/'.$file->getClientOriginalName()]);
   //  DB::table('users')->where('username',$user)->update(['namesp' =>$namespi]);
}
 return redirect('/'.$username.'?v='.base64_encode('10'));
}else{
  return back();
}
 return back();
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
