<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
	return View::make('hello');
}); 

Route::post('/incomes/store','IncomesController@store');
Route::post('/incomes/update/{id}','IncomesController@update');
Route::get('/incomes/destroy/{id}','IncomesController@destroy');
//Route::controller('incomes','IncomesController');

Route::get('usuarios', function()
{
    return View::make('usuarios');
});

Route::get('/incomes', 'IncomesController@getIndex');

Route::get('/incomes/create', function()
{
    return View::make('incomes/save');
});