<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class searchcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resaults');
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
public function getSuggestionSearch(Request $request){
  if(!empty($request->searchV)){
    $value = $request->searchV;
  $resaults=   DB::table('files')->select('files.id','files.title','files.description','files.author','files.location','files.created_at','users.username','users.imgpath')->join('users','files.author','=','users.username')->where('files.title','LIKE','%'.$value.'%')->orWhere('files.description','LIKE','%'.$value.'%')->orderBy('files.downloads','desc')->limit(5)->get();
  $users=   DB::table('users')->where('firstname','LIKE','%'.$value.'%')->orWhere('lastname','LIKE','%'.$value.'%')->where('status',1)->orderBy('nfiles', 'asc')->limit(5)->get();

return response()->json(array('resaults'=>$resaults,'users'=>$users),200);
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
public function search(Request $request){
$value = $request->q;
if(!empty($value)){


  $resaults=   DB::table('files')->select('files.id','files.title','files.description','files.author','files.location','files.created_at','users.username','users.imgpath')->join('users','files.author','=','users.username')->where('files.title','LIKE','%'.$value.'%')->orWhere('files.description','LIKE','%'.$value.'%')->orderBy('files.downloads','desc')->limit(7)->get();
$count = $resaults->count();
  return view('resaults')->with(['resaults'=>$resaults,'value'=>$value,'count'=>$count]);
}else{
$value2 = $request->a;
if(!empty($value2)){

    $resaults=   DB::table('files')->select('files.id','files.title','files.description','files.author','files.location','files.created_at','users.username','users.imgpath')->join('users','files.author','=','users.username')->orderBy('files.created_at','desc')->get();
  $count = $resaults->count();
    return view('resaults')->with(['resaults'=>$resaults,'value'=>$value,'count'=>$count]);
  }else{
    $value3 = $request->share;
    if(!empty($value3)){
    $resaults=   DB::table('files')->select('files.id','files.title','files.description','files.author','files.location','files.created_at','users.username','users.imgpath')->join('users','files.author','=','users.username')->where('files.id','=',$value3)->orderBy('files.created_at','desc')->get();
  $count = $resaults->count();
  return view('resaults')->with(['resaults'=>$resaults,'value'=>$value,'count'=>$count]);
}else{
    return back();
  }
  }
}
}
public function usearch(Request $request){

$value = $request->q;
  if(!empty($value)){
  $resaults=   DB::table('files')->select('files.id','files.title','files.description','files.author','files.location','files.created_at','users.username','users.imgpath')->join('users','files.author','=','users.username')->where('files.title','LIKE','%'.$value.'%')->orWhere('files.description','LIKE','%'.$value.'%')->orderBy('files.downloads','desc')->limit(7)->get();
    $users=   DB::table('users')->where('firstname','LIKE','%'.$value.'%')->orWhere('lastname','LIKE','%'.$value.'%')->where('status',1)->orderBy('nfiles', 'asc')->limit(5)->get();
$count = $resaults->count();
$countu = $users->count();
  return view('resaultsuser')->with(['resaults'=>$resaults,'users'=>$users,'value'=>$value,'count'=>$count,'countu'=>$countu]);
}else{
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
    public function destroy($id)
    {
        //
    }
}
