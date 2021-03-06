<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'JournalController@index');
Route::get('create', 'JournalController@create');
Route::group(['prefix' => 'preview'], function(){
   Route::get('situation', 'PreviewController@situation');
   Route::get('results', 'PreviewController@results');
   Route::get('reflection', 'PreviewController@reflection');
   Route::get('insight', 'PreviewController@insight');
   Route::get('outcome', 'PreviewController@outcome');
   Route::get('action', 'PreviewController@action');
   Route::get('journal', 'PreviewController@journal');
});
Route::post('{id}/situation', 'JournalController@saveSituation');
Route::get('{id}/situation', 'JournalController@situation');
Route::post('{id}/results', 'JournalController@saveResult');
Route::get('{id}/results', 'JournalController@result');
Route::post('{id}/reflection', 'JournalController@saveReflection');
Route::get('{id}/reflection', 'JournalController@reflection');
Route::post('{id}/insight', 'JournalController@saveInsight');
Route::get('{id}/insight', 'JournalController@insight');
Route::post('{id}/outcome', 'JournalController@saveOutcome');
Route::get('{id}/outcome', 'JournalController@outcome');
Route::post('{id}/action', 'JournalController@saveAction');
Route::get('{id}/action', 'JournalController@action');
Route::get('{id}/complete', 'JournalController@complete');
Route::get('{id}/journal', 'JournalController@show');