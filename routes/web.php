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
    return view('welcome');
});

Auth::routes();
Route::post('/resetpassword', 'emailController@resetpass');
Route::get('/reset', function (){
  return view('auth/reset');
});
Route::get('/recover', function (){
  return view('auth/recover');
});
Route::get('/rpcc', 'emailController@resetpasscheck');
Route::post('/frpc', 'emailController@finalpass');

Route::get('/about', function(){
  return view('about');
});
Route::get('/check', 'fileuploadcontroller@check');


Route::get('/auth/nextstep', 'usernextstepimagecontroller@index');
Route::post('/sendcontact','emailController@send');
// Route::get('/home', 'HomeController@index')->name('home');
Route::post('/auth/nextstep','usernextstepimagecontroller@saveUploadFile');
Route::get('/auth/nextstep','usernextstepimagecontroller@getSpeciality');
Route::get('/send','emailController@send');
Route::post('/resend','emailController@resend');
Route::post('/reportcause','emailController@report');
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
