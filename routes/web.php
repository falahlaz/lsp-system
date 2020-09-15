<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return redirect()->route('user.login');
// });

Route::get('/',function(){
    return view('admin.unitScheme.index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/', 'Admin\Master\DashboardController@index')->name('dashboard');
    Route::resource('/tuk','Admin\Master\TukController');
    Route::resource('/scheme','Admin\Master\SchemeController');
    Route::resource('/scheme/unit','Admin\Master\UnitSchemeController');
    Route::resource('/assessor','Admin\Master\AssessorController');
    Route::resource('/element', 'Admin\Master\ElementController');
    Route::resource('/exam/question','Admin\Master\ExamQuestionController');
    Route::resource('/exam/answer','Admin\Master\ExamAnswerController');
    Route::resource('/question','Admin\Master\UnitQuestionController');
    Route::resource('/user','Admin\Master\UserController');
    Route::get('register/scheme','Admin\Master\Form01Controller@showScheme')->name('scheme');
    Route::get('/profile/{name}','Admin\Master\ProfileController@show')->name('profile.show');
    Route::post('/profile/update','Admin\Master\ProfileController@update')->name('profile.update');
});


Route::get('/login',function(){
    return view('user.login');
});

Route::get('/logout','Admin\AuthController@logout');
Route::get('/register','Admin\Master\Form01Controller@index');
Route::post('/register/store','Admin\Master\Form01Controller@store')->name('register.store');
Route::get('/register/apl/02');
Route::get('/register/confirm','Admin\AuthController@confirmRegister');
