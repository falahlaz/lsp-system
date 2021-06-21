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

    // Asesor Route
    Route::post("/assessor/scheme", "Admin\Master\AssessorController@addScheme")->name("assessor.add.scheme");
    Route::delete("/assessor/scheme/{id}", "Admin\Master\AssessorController@destroyScheme")->name("assessor.destroy.scheme");

    // Tuk Route
    Route::post("/tuk/scheme/{id}", "Admin\Master\TukController@storeScheme")->name("tuk.add.scheme");
    Route::delete("/tuk/scheme/{id}", "Admin\Master\TukController@destroyScheme")->name("tuk.destroy.scheme");

    // Register Route
    Route::get('/profile/{name}','Admin\Master\ProfileController@show')->name('profile.show');
    Route::post('/profile/update','Admin\Master\ProfileController@update')->name('profile.update');
    Route::post('/profile/password', 'Admin\Master\ProfileController@updatePassword')->name('profile.password');
    Route::post('/exam/answer/correct', 'Admin\Master\ExamAnswerController@correctAnswer')->name('answer.correct');

    // Participant route
    Route::group(['prefix' => '/form', 'as' => 'form.'], function() {
        Route::get('apl/01', 'Admin\Master\ParticipantController@indexApl01')->name('apl01');
        Route::get('apl/01/{id}/{scheme}','Admin\Master\ParticipantController@showApl01')->name('apl01.detail');
        Route::get('apl/01/pass_photo/{id}','Admin\Master\ParticipantController@showPassPhoto')->name('apl01.passPhoto');
        Route::get('apl/01/photo_ktp/{id}','Admin\Master\ParticipantController@showPhotoKtp')->name('apl01.photoKtp');
        Route::get('apl/01/kelengkapan/{index}/{id}','Admin\Master\ParticipantController@showKelengkapan')->name('apl01.kelengkapan');
        Route::get('apl/01/kompetensi/{index}/{id}','Admin\Master\ParticipantController@showKompetensi')->name('apl01.kompetensi');
        Route::post('apl/01/store','Admin\Master\ParticipantController@store')->name('apl01.store');
        Route::get('apl/02', 'Admin\Master\ParticipantController@indexApl02')->name('apl02');
        Route::get('apl/02/{id}','Admin\Master\ParticipantController@showApl02')->name('apl02.detail');
        Route::post('apl/02/{id}','Admin\Master\ParticipantController@storeApl02');
        Route::get('recap', 'Admin\Master\ParticipantController@indexExamRecap')->name('recap');
        Route::get('recap/{id}', 'Admin\Master\ParticipantController@showExamRecap')->name('recap.detail');
        Route::post('/recap/{id}/store', 'Admin\Master\ParticipantController@storeExamRecap')->name('recap.store');
    });
});

Route::get('/',function(){
    return redirect()->route('admin.dashboard');
});

Route::get('/s',function(){
    return view('participant.form02');
});

Route::get('/d',function(){
    return view('tes');
});

Route::get('/a','Admin\Master\ParticipantController@showPassPhoto');

Route::get('/login', 'Admin\AuthController@login')->name('login');
Route::post('/login', 'Admin\AuthController@loginStore')->name('login.store');
Route::get('/logout','Admin\AuthController@logout')->name('logout');
Route::get('/register','Admin\Master\Form01Controller@index')->name('register');
Route::post('/register/store','Admin\Master\Form01Controller@store')->name('register.store');
Route::get('/register/unit/{id}', 'Admin\Master\Form01Controller@getUnit')->name('register.unit');
Route::get('/register/apl/02/{token}','Admin\Master\Form02Controller@index')->name('register.apl02');
Route::get('/register/exam/{token}','Admin\Master\ExamController@index')->name('register.exam');
Route::post('/register/exam/{token}','Admin\Master\ExamController@store');
Route::post('/register/apl/02/{token}','Admin\Master\Form02Controller@store');
Route::get('/register/confirm','Admin\AuthController@confirmRegister');
