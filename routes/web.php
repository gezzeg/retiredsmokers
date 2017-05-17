<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/',['uses'=>'PageController@index']);
Route::get('/home',['as'=>'home','uses'=>'PageController@index']);
Route::get('/about',['uses'=>'PageController@about']);
Route::get('/map',['uses'=>'PageController@map']);
Route::get('/test',['as'=>'test','uses'=>'PageController@about@test']);

//Route::get('/dashboard','PageController@dashboard');
Route::get('/dashboard',function(){
return view('dashboard');
});


//Route::get('/register','RegistrationController@register');

//////////////
//Registration
//////////////

Route::get('/register',['uses'=>'RegistrationController@register']);
Route::post('/register',['uses'=>'RegistrationController@postRegister']);

////////////
//Activation
////////////

Route::get('/activation/{email}/{activationCode}',['as'=>'activation','uses'=>'ActivationController@activate']);

///////
//Login
///////

Route::get('/login',['uses'=>'LoginController@login']);
Route::post('/login',['uses'=>'LoginController@postLogin']);
Route::get('/login/{id}/edit',['uses'=>'LoginController@edit']);

//Logout
Route::post('/logout',['uses'=>'LoginController@postLogout']);

/////////////////
//Forgot Password
/////////////////

Route::get('/forgot-password',['as'=>'forgotPassword','uses'=>'ForgotPasswordController@forgotPassword']);
Route::post('/forgot-password',['as'=>'forgotPassword','uses'=>'ForgotPasswordController@postForgotPassword']);

Route::get('/reset/{email}/{resetCode}','ForgotPasswordController@resetPassword');
Route::post('/reset/{email}/{resetCode}','ForgotPasswordController@postResetPassword');

/////////
//Profile
/////////

//Route::resource('profile', 'PhotoController');
//Route::get('/profile',['as'=>'profile','uses'=>'ProfileController@index'])->middleware('member');

//Route::get('/profile',['as'=>'profile','uses'=>'ProfileController@show'])->middleware('member');

//Route::get('/profile/{id}',['as'=>'profileShow','uses'=>'ProfileController@show'])->middleware('member','profile');

Route::get('/profile',['as'=>'profileShow','uses'=>'ProfileController@show']);


Route::get('/profile/{id}/edit',['as'=>'profileEdit','uses'=>'ProfileController@edit'])->middleware('member','profile');

Route::post('/profile/{id}/edit',['as'=>'profileUpdate','uses'=>'ProfileController@update'])->middleware('member','profile');

//////////
//Location
//////////

Route::get('/location',['as'=>'location','uses'=>'LocationController@index']);
Route::get('/location/all',['as'=>'locationAll','uses'=>'LocationController@all']);
Route::get('/location/cluster',['as'=>'locationCluster','uses'=>'LocationController@cluster']);
Route::get('/location/{id}',['as'=>'locationShow','uses'=>'LocationController@show'])->middleware('member','profile');
Route::get('/location/{id}/edit',['as'=>'locationEdit','uses'=>'LocationController@edit'])->middleware('member','profile');
Route::post('/location/{id}/edit',['as'=>'locationUpdate','uses'=>'LocationController@update']);

/////////////////////////////
//SmokingRecord & Achievement
/////////////////////////////

Route::get('/record',['as'=>'record','uses'=>'SmokingRecordController@index'])->middleware('member');

//Add 
Route::post('/record',['as'=>'recordStore','uses'=>'SmokingRecordController@store']);

//Delete
Route::post('/record/delete/{id}',['as'=>'recordDestroy','uses'=>'SmokingRecordController@destroy']);

//Update
Route::post('/record/update/{id}',['as'=>'recordUpdate','uses'=>'SmokingRecordController@update']);

Route::get('/record/achievement',['as'=>'achievement','uses'=>'SmokingRecordController@timeline']);







