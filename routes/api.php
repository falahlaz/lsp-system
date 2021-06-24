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
    Route::resource('/tuk','Admin\Master\TukController');
    Route::resource('/scheme','Admin\Master\SchemeController');
    Route::resource('/scheme/unit','Admin\Master\UnitSchemeController');
    Route::resource('/assessor','Admin\Master\AssessorController');
    Route::resource('/exam/question','Admin\Master\ExamQuestionController');
    Route::resource('/exam/answer','Admin\Master\ExamAnswerController');
    Route::resource('/unit/question','Admin\Master\ElementQuestionController');

});

Route::get("scheme", "Api\LandingPageController@getAllScheme");
Route::get("scheme/{id}", "Api\LandingPageController@getSingleScheme");
Route::get("asesor", "Api\LandingPageController@getAllAsesor");
Route::get("asesor/{id}", "Api\LandingPageController@getSingleAsesor");
Route::get("tuk", "Api\LandingPageController@getAllTuk");
Route::get("tuk/{id}", "Api\LandingPageController@getSingleTuk");
route::get("news", "Api\LandingPageController@getAllNews");
route::get("news/{id}", "Api\LandingPageController@getSingleNews");