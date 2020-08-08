<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::post('/lsp/be/login', 'Admin\AuthController@login');

Route::group(['prefix'=>'/lsp/be', 'middleware' => ['token']],function(){
    // Auth
    Route::get('/logout', 'Admin\AuthController@logout');

    // Master Table
    Route::resource('/tuk','Admin\TukController');
    Route::resource('/scheme','Admin\SchemeController');
    Route::resource('/scheme/unit','Admin\UnitSchemeController');
    Route::resource('/assessor','Admin\AssessorController');
    Route::resource('/exam/question','Admin\ExamQuestionController');
    Route::resource('/exam/answer','Admin\ExamAnswerController');
    Route::resource('/unit/question','Admin\UnitQuestionController');

});