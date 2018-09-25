<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\status;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class statuscontroller extends Controller
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
    public function create(Request $request)
    {
        $user = $request->username;
        $groupid = $request->groupid;
        $type = $request->input('typetoupload');
        $desc = $request->description;
        switch($type){
            case 0:{
                DB::table('status')->insert(
                    ['author' => $user, 
                    'groupid' => $groupid,
                    'type'=>0,
                    'description'=>$desc,
                    'flocation'=>'none']
                );
                return response()->json(array('status'=>'status uploaded','type'=>$type),200);
break;
               
            }
            case 1:{
                $file = $request->file('imageupload');
                echo "first good";
                if(!empty($file)){
                    echo "good";
                    $fileArray = array('imageupload' => $file);
                    $rules = array(
                      'imageupload' => 'mimes:jpeg,png,jpg|required|max:2000' // max 10000kb
                    );
                 $validator = Validator::make($fileArray, $rules);
if($validator->fails()){
    return response()->json(array('status'=>'image not supported','type'=>$type),200);
}else{
    $hash = md5($file->getClientOriginalName().mt_rand(1000,9999)).".".$file->getClientOriginalExtension();
    $destinationPath = "usersdata/".$groupid."/";
    $file->move($destinationPath,$hash);
    DB::table('status')->insert(
        ['author' => $user, 
        'groupid' => $groupid,
        'type'=>0,
        'description'=>$desc,
        'flocation'=>$destinationPath.$hash]
    );
        return response()->json(array('status'=>'image uploaded','type'=>$type),200);
}
                }else{
                    break;
                }
                
               
            }
            case 2:{

                $file = $request->file('fileupload');
                if(!empty($file)){
                    $fileArray = array('fileupload' => $file);
                    $rules = array(
                      'fileupload' => 'mimes:pdf,docx,ppt,zip,rar,m|required|max:25000' // max 10000kb
                    );
                 $validator = Validator::make($fileArray, $rules);
if($validator->fails()){
    return back();
}else{
    $hash = md5($file->getClientOriginalName().mt_rand(1000,9999)).".".$file->getClientOriginalExtension();
    $destinationPath = "usersdata/".$groupid."/";
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
    
    }else{
   
        DB::table('status')->insert(
            ['author' => $user, 
            'groupid' => $groupid,
            'type'=>0,
            'description'=>$desc,
            'flocation'=>$destinationPath.$hash]
        );
            return response()->json(array('status'=>'file uploaded ','type'=>$type),200);
    
    

    

               
    }

       }
        
    
    

}
    
            }
        }    
      
        
    }
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
    public function newStatus(Request $request){
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
    public function destroy($id)
    {
        //
    }
}
