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


  $resaults=   DB::table('files')->select('files.id','files.title','files.description','files.author','files.location','files.created_at','users.username','users.imgpath')->join('users','files.author','=','users.username')->where('files.title','LIKE','%'.$value.'%')->orWhere('files.description','LIKE','%'.$value.'%')->limit(7)->get();
  return view('resaults')->with(['resaults'=>$resaults,'value'=>$value]);
}else{
  return back();
}
}
public function usearch(Request $request){

$value = $request->q;
  if(!empty($value)){
  $resaults=   DB::table('files')->select('files.id','files.title','files.description','files.author','files.location','files.created_at','users.username','users.imgpath')->join('users','files.author','=','users.username')->where('files.title','LIKE','%'.$value.'%')->orWhere('files.description','LIKE','%'.$value.'%')->limit(7)->get();
    $users=   DB::table('users')->where('firstname','LIKE','%'.$value.'%')->orWhere('lastname','LIKE','%'.$value.'%')->limit(5)->get();
  return view('resaultsuser')->with(['resaults'=>$resaults,'users'=>$users,'value'=>$value]);
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
