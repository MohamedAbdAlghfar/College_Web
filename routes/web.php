<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


//user routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::resource('admin/myprof', 'App\Http\Controllers\Admin\myprofController');

// admin routes
Route::group(['middleware' => ['auth','admin']], function () {
	
	Route::get('/admin', 'App\Http\Controllers\Admin\HomeController@index')->name('home');
	
	Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController', ['except' => ['show']]);

	//Route::resource('admin/users/create', 'App\Http\Controllers\Admin\UserController@create', ['except' => ['show']]);

	//Route::get('admin/users/create', function () {
	//	return view('admin.users.create');
	//});

	Route::resource('admin/admins', 'App\Http\Controllers\Admin\AdminController', ['except' => ['show']]);

	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);
	
	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
	
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	
	Route::get('map', function () {$user = Auth::user()->name;
		   return view('pages.maps',compact('user'));})->name('map');

	
	//Courses route 
	Route::resource('admin/courses', 'App\Http\Controllers\Admin\CourseController');
	Route::resource('admin/level1', 'App\Http\Controllers\Admin\level1Controller'); 
    Route::resource('admin/level2', 'App\Http\Controllers\Admin\level2Controller'); 
    Route::resource('admin/level3', 'App\Http\Controllers\Admin\level3Controller'); 
    Route::resource('admin/level4', 'App\Http\Controllers\Admin\level4Controller'); 
	
	Route::resource('admin/courses.videos', 'App\Http\Controllers\Admin\coursevideoController');

	Route::resource('admin/courses.quizzes', 'App\Http\Controllers\Admin\coursequizController');

	Route::resource('admin/videos', 'App\Http\Controllers\Admin\videoController');

	Route::resource('admin/quizzes', 'App\Http\Controllers\Admin\quizController');

	Route::resource('admin/quizzes.questions', 'App\Http\Controllers\Admin\quizquestionController');

	Route::resource('admin/questions', 'App\Http\Controllers\Admin\questionController');

	Route::get('table-list', function () {$user = Auth::user()->name;
		return view('pages.tables',compact('user'));})->name('table');

	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);

});

