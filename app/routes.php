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

//Mostrar formulario de inicio de sesión
Route::get('/', 'SessionsController@showLogin');

//Verificar los datos ingresados en el formulario y enviar al menu principal
Route::post('mainMenu', 'SessionsController@mainMenu');

//Cerrar sesión
Route::get('logout', 'SessionsController@logOut');



