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



Route::resource('/tuk','Admin\Master\TukController');
Route::resource('/scheme','Admin\Master\SchemeController');
Route::resource('/scheme/unit','Admin\Master\UnitSchemeController');
Route::resource('/assessor','Admin\Master\AssessorController'); 
Route::resource('/exam/question','Admin\Master\ExamQuestionController');
Route::resource('/exam/answer','Admin\Master\ExamAnswerController');
Route::resource('/unit/question','Admin\Master\UnitQuestionController');