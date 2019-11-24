<?php

use Illuminate\Http\Request;

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

Route::namespace('API')->name('api.')->group(function(){
	Route::prefix('todos')->group(function(){

		Route::get('/', 'TodoController@index')->name('todos');
		Route::get('/{id}', 'TodoController@show')->name('single_todo');

		Route::post('/', 'TodoController@add')->name('add_todo');

		Route::delete('/{id}', 'TodoController@delete')->name('delete_todo');

	});
});


