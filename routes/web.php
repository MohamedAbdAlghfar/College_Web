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

Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home.user');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\User\HomeController@index')->name('home.user');

Route::resource('admin/myprof', 'App\Http\Controllers\Admin\myprofController');
Route::get('/user/mycourses', 'App\Http\Controllers\User\MyCoursesController@showMyCourses')->name('showMyCourse.showMyCourses');
Route::get('/user/mycourses/show/{id}', 'App\Http\Controllers\User\MyCoursesController@showcourse')->name('showMyCourse.showcourse');
Route::get('/user/mycoursesQuiz/show/{id}', 'App\Http\Controllers\User\MyQuizController@showquiz')->name('showMyCourseQuiz.showquiz');
Route::get('/user/mygrades', 'App\Http\Controllers\User\MyGradesController@showMyGrades')->name('showMyGrades.showMyGrades');
Route::get('/user/enrollCourses', 'App\Http\Controllers\User\EnrollCoursesController@showCourses')->name('showCourses.showCourses');
Route::post('/user/makeEnrollCourses/{course_id}', 'App\Http\Controllers\User\EnrollCoursesController@Enroll')->name('Enroll.Enroll');



Route::get('user/profile', ['as' => 'userprofile.edit', 'uses' => 'App\Http\Controllers\User\ProfileController@edit']);
	
Route::put('user/profile', ['as' => 'userprofile.update', 'uses' => 'App\Http\Controllers\User\ProfileController@update']);

Route::put('user/profile/password', ['as' => 'userprofile.password', 'uses' => 'App\Http\Controllers\User\ProfileController@password']);

// admin routes
Route::group(['middleware' => ['auth','admin']], function () {
	
	Route::get('/admin', 'App\Http\Controllers\Admin\HomeController@index')->name('home');
	
	Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController', ['except' => ['show']]);
	Route::get('admin/users/currentCourse/{user_id}', 'App\Http\Controllers\Admin\ShowCurrentCourseController@showUserCurrentCourses')->name('ShowCurrentCourse.showUserCurrentCourses'); 
    Route::post('admin/users/currentCourse/grade/{course_id}/{user_id}', 'App\Http\Controllers\Admin\ShowCurrentCourseController@storeUserGrade')->name('ShowCurrentCourse.storeUserGrade');
	Route::get('admin/admins/currentCourse/{user_id}', 'App\Http\Controllers\Admin\ShowCurrentCourseController@showAdminCurrentCourses')->name('ShowCurrentCourse.showAdminCurrentCourses'); 
    Route::post('admin/admins/currentCourse/grade/{course_id}/{user_id}', 'App\Http\Controllers\Admin\ShowCurrentCourseController@storeAdminGrade')->name('ShowCurrentCourse.storeAdminGrade');


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
	Route::get('admin/showCourseQuiz/{course}/{quiz}', 'App\Http\Controllers\Admin\CourseController@showQuiz')->name('courses.showQuiz'); 

	Route::post('/courses/openEnroll', 'App\Http\Controllers\Admin\OpenCloseEnrollController@openEnroll')->name('OpenCloseEnroll.openEnroll');
	Route::post('/courses/closeEnroll', 'App\Http\Controllers\Admin\OpenCloseEnrollController@closeEnroll')->name('OpenCloseEnroll.closeEnroll');	
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

	Route::get('/courses/{course}/deleted', 'App\Http\Controllers\Admin\CourseDelByController@showDeletedCourse')->name('CourseDelBy.showDeletedCourse');
    Route::get('/courses/deleted', 'App\Http\Controllers\Admin\CourseDelByController@DeletedCourseIds')->name('CourseDelBy.store');
});

