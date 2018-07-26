<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpicialityController extends Controller
{
    //
    public function index() {
        $spec=   DB::table('spicialitys')->get();
  
        return view('auth/register')->with('spec',$spec);

    }
    

    //
    public function create() {
        
    }

    public function store() {
        
    }

    public function edit() {
        
    }

    public function update() {
        
    }

    public function destroy() {
        
    }
}
