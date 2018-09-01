<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

  $spec=   DB::table('spicialitys')->orderBy('namespi', 'asc')->get();
  $k=0;
foreach($spec as $s){
    $files[$k]=   DB::table('files')->where('namespi',$s->namespi)->orderBy('downloads', 'desc')->limit(3)->get();
    $s->files = $files[$k];
    $k++;
  }


    return view('welcome')->with(['spec'=>$spec]);
});

Auth::routes();
Route::get('/usersdata',function(){
  return abort(404);
});
Route::get('/app',function(){
  return abort(404);
});
Route::get('/config',function(){
  return abort(404);
});
Route::get('/database',function(){
  return abort(404);
});
Route::get('/public',function(){
  return abort(404);
});
Route::get('/resource',function(){
  return abort(404);
});
Route::get('/routes',function(){
  return abort(404);
});
Route::get('/storage',function(){
  return abort(404);
});
Route::get('/uploads',function(){
  return abort(404);
});
Route::get('/vendor',function(){
  return abort(404);
});
Route::get('/index',function(){
  return view('index');
});
Route::get('/readVal', 'searchcontroller@getSuggestionSearch');
Route::get('/admin/resizeIM', 'fileuploadcontroller@resizeIm');
Route::post('/sendcontacthelp', 'emailController@sch');
Route::post('/getsugg', 'searchcontroller@getSuggestionSearch');
Route::post('/getsugg1', 'searchcontroller@getSuggestionSearchOff');
Route::post('/getnoti', 'PageController@getNotification');
Route::post('/getnotiNum', 'PageController@getNotificationNumber');
Route::post('/getnotilayout', 'PageController@getNotificationLayout');
Route::post('/removenoti', 'PageController@removenoti');
Route::post('/newf', 'PageController@newFollower');
Route::post('/rmf', 'PageController@unfollow');
Route::post('/resetpassword', 'emailController@resetpass');
Route::get('/reset', function (){
  return view('auth/reset');
});
Route::get('/recover', function (){
  return view('auth/recover');
});
Route::get('/checkV', 'usernextstepimagecontroller@checkV');
Route::get('/rpcc', 'emailController@resetpasscheck');
Route::post('/frpc', 'emailController@finalpass');
Route::post('/requestSpeciality','emailController@sendemailRequestSpeciality');
Route::get('/about', function(){
  return view('about');
});
Route::get('/check', 'fileuploadcontroller@check');

Route::get('/sendemailtoall', 'emailController@sendemail');
Route::get('/auth/nextstep', 'usernextstepimagecontroller@index');
Route::post('/sendcontact','emailController@send');
Route::post('/sendsms','emailController@sendsms');
// Route::get('/home', 'HomeController@index')->name('home');
Route::post('/auth/nextstep','usernextstepimagecontroller@saveUploadFile');
Route::get('/auth/nextstep','usernextstepimagecontroller@getSpeciality');
Route::get('/send','emailController@send');
Route::post('/resend','emailController@resend');
Route::post('/reportcause','emailController@report');
Route::post('/reportguest','emailController@report');
Route::get('/confirm',function(){
  return view('auth/confirm');
});
Route::post('/confirm','usernextstepimagecontroller@confirm');
Route::post('/edit','usereditcontroller@userEdit');
Route::post('/delete','fileuploadcontroller@delete');
Route::get('/search','searchcontroller@search');
Route::get('/usearch','searchcontroller@usearch');
Route::get('{slug}', [
    'uses' => 'PageController@getPage'
])->where('slug', '([A-Za-z0-9\-\/]+)');
Route::post('{slug}', [
    'uses' => 'fileuploadcontroller@saveUploadFile'
])->where('slug', '([A-Za-z0-9\-\/]+)');
Route::post('/processing','fileuploadcontroller@saveUploadFile');
