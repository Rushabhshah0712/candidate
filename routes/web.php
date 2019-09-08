<?php

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
//     return view('welcome');
// });


Route::get('/', 'CandidateController@importExport');
// Route::get('downloadExcel/{type}', 'CandidateController@downloadExcel');
Route::post('importExcel', 'CandidateController@importExcel');

Route::get('candidate/{id}/edit', 'CandidateController@edit');
Route::get('candidate/{id}/delete', 'CandidateController@destroy');
Route::post('candidate/update', 'CandidateController@update');
