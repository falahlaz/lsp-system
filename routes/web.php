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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/', 'Admin\Master\DashboardController@index')->name('dashboard');
    Route::resource('/tuk','Admin\Master\TukController');
    Route::resource('/scheme','Admin\Master\SchemeController');
    Route::resource('/scheme/unit','Admin\Master\UnitSchemeController');
    Route::resource('/assessor','Admin\Master\AssessorController');
    Route::resource('/element', 'Admin\Master\ElementController');
    Route::resource('/exam/question','Admin\Master\ExamQuestionController', ['as' => 'exam']);
    Route::resource('/exam/answer','Admin\Master\ExamAnswerController');
    Route::resource('/question','Admin\Master\ElementQuestionController');
    Route::resource('/user','Admin\Master\UserController');
  
    // Register Route
    Route::get('/profile/{name}','Admin\Master\ProfileController@show')->name('profile.show');
    Route::post('/profile/update','Admin\Master\ProfileController@update')->name('profile.update');
    Route::post('/exam/answer/correct', 'Admin\Master\ExamAnswerController@correctAnswer')->name('answer.correct');

    // Participant route
    Route::group(['prefix' => '/form', 'as' => 'form.'], function() {
        Route::get('apl/01', 'Admin\Master\ParticipantController@indexApl01')->name('apl01');
        Route::get('apl/02', 'Admin\Master\ParticipantController@indexApl02')->name('apl02');
        Route::get('recap', 'Admin\Master\ParticipantController@indexRecap')->name('recap');
    });
});

Route::get('/',function(){
    return redirect()->route('admin.dashboard');
});

Route::get('/login', 'Admin\AuthController@login')->name('login');
Route::post('/login', 'Admin\AuthController@loginStore')->name('login.store');
Route::get('/logout','Admin\AuthController@logout')->name('logout');
Route::get('/register','Admin\Master\Form01Controller@index')->name('register');
Route::post('/register/store','Admin\Master\Form01Controller@store')->name('register.store');
Route::get('/register/unit/{id}', 'Admin\Master\Form01Controller@getUnit')->name('register.unit');
Route::get('/register/apl/02');
Route::get('/register/confirm','Admin\AuthController@confirmRegister');
