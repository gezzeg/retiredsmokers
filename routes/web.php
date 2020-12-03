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



Route::get('/home',['as'=>'home','uses'=>'PageController@index']);
Route::get('/about',['uses'=>'PageController@about']);
Route::get('/disclaimer',['as'=>'pages.disclaimer','uses'=>'PageController@disclaimer']);
Route::get('/aboutnew',['uses'=>'PageController@aboutnew']);
Route::get('/map',['uses'=>'PageController@map']);
Route::get('/test',['as'=>'test','uses'=>'PageController@test']);
Route::get('/articles',['as'=>'articles','uses'=>'PageController@articles']);
Route::get('/newtheme',['as'=>'newtheme','uses'=>'PageController@newtheme']);
Route::get('/dashboard',['as'=>'members.index','uses'=>'PageController@dashboard'])->middleware('member');
Route::get('/profile2','PageController@profile2');
Route::get('/',['uses'=>'PageController@index']);

//Route::get('/register','RegistrationController@register');

//////////////
//Registration
//////////////

//Route::get('/register',['uses'=>'RegistrationController@register']);
Route::post('/register',['uses'=>'RegistrationController@postRegister']);

////////////
//Activation
////////////

Route::get('/activation/{email}/{activationCode}',['as'=>'activation','uses'=>'ActivationController@activate']);

///////
//Login
///////

//Route::get('/login',['uses'=>'LoginController@login']);
Route::post('/login',['uses'=>'LoginController@postLogin']);
Route::get('/login/edit',['as'=>'passwod.edit','uses'=>'LoginController@edit'])->middleware('member');
Route::post('/login/edit',['uses'=>'LoginController@update'])->middleware('member');
//Logout
Route::post('/logout',['uses'=>'LoginController@postLogout'])->middleware('member');

/////////////////
//Forgot Password
/////////////////

Route::get('/forgot-password',['as'=>'forgotPassword','uses'=>'ForgotPasswordController@forgotPassword']);
Route::post('/forgot-password',['as'=>'forgotPassword','uses'=>'ForgotPasswordController@postForgotPassword']);

Route::get('/reset/{email}/{resetCode}','ForgotPasswordController@resetPassword');
Route::post('/reset/{email}/{resetCode}','ForgotPasswordController@postResetPassword');

/////////////////
//Reset Password
/////////////////
///


/////////
//Profile
/////////

Route::group(['middleware'=>'member'], function () {

//Route::resource('profile', 'PhotoController');
//Route::get('/profile',['as'=>'profile','uses'=>'ProfileController@index'])->middleware('member');

//Route::get('/profile',['as'=>'profile','uses'=>'ProfileController@show'])->middleware('member');

//Route::get('/profile/{id}',['as'=>'profileShow','uses'=>'ProfileController@show'])->middleware('member','profile');

Route::get('/profile',['as'=>'profile.show','uses'=>'ProfileController@show']);

// Route::get('/profile/{id}/edit',['as'=>'profileEdit','uses'=>'ProfileController@edit'])->middleware('member','profile');

Route::get('/profile/edit',['as'=>'profile.edit','uses'=>'ProfileController@edit']);
Route::post('/profile/edit',['as'=>'profile.update','uses'=>'ProfileController@update']);

});

//////////
//Location
//////////

Route::get('/location',['as'=>'location','uses'=>'LocationController@index']);
Route::get('/location/all',['as'=>'locationAll','uses'=>'LocationController@all']);
Route::get('/location/cluster',['as'=>'locationCluster','uses'=>'LocationController@cluster']);

// Route::get('/location/{id}',['as'=>'locationShow','uses'=>'LocationController@show'])->middleware('member');

Route::get('/location/edit',['as'=>'location.edit','uses'=>'LocationController@edit']);
Route::post('/location/edit',['as'=>'location.update','uses'=>'LocationController@update']);

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


/////////////////////////////
//AdminLte
/////////////////////////////

//Route::get('/admin','PageController@admin');


/////////////////////////////
//Symptoms
/////////////////////////////


Route::post('/symptoms',['as'=>'symptoms.index','uses'=>'SymptomRecordController@store'])->middleware('member');
Route::post('/symptoms/delete/{id}',['as'=>'symptoms.destroy','uses'=>'SymptomRecordController@destroy'])->middleware('member');

Route::get('/symptoms/edit',['as'=>'symptoms.edit','uses'=>'SymptomRecordController@edit'])->middleware('member');

// Route::post('/symptoms/edit',['as'=>'symptoms.update','uses'=>'SymptomRecordController@update'])->middleware('member');

Route::post('/symptoms/update/{id}',['as'=>'symptoms.update','uses'=>'SymptomRecordController@update'])->middleware('member');

Route::get('/symptoms',['as'=>'symptoms.index','uses'=>'SymptomRecordController@index'])->middleware('member');


/////////////////////////////
//Statistics
/////////////////////////////

Route::get('/stats',['name'=>'stats.index','uses'=>'StatisticController@index']);
//	Route::post('/members/symtoms');

/////////////////////////////
//Story
/////////////////////////////



Route::group(['middleware'=>'member'], function () {

	Route::delete('/story/{id}',['as'=>'post.delete','uses'=>'PostController@destroy']);
	Route::get('/story',['as'=>'post.index','uses'=>'PostController@index']);
	Route::get('/story/create',['as'=>'post.create','uses'=>'PostController@create']);
	Route::post('/story/create',['as'=>'post.store','uses'=>'PostController@store']);
	Route::get('/story/edit',['as'=>'post.edit','uses'=>'PostController@edit']);
	Route::post('/story/edit',['as'=>'post.update','uses'=>'PostController@update']);
	Route::get('/story/others',['as'=>'post.others','uses'=>'PostController@others']);
	// Route::get('/story/others/{id}',['as'=>'post.showOthers','uses'=>'PostController@showOthers']);
	Route::get('/story/others/{id}',['as'=>'post.showOtherPost','uses'=>'PostController@showOtherPost']);

});
