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
/*Route::get('/', function(){
    $user = new User;
    $user -> user = 'admin';
    $user -> password = Hash::make('123');
    $user -> type = '1';
    $user -> save();
});*/
Route::get('/', 'SessionsController@showLogin');


//Verificar los datos ingresados en el formulario y enviar al menu principal
Route::post('welcome', 'SessionsController@welcome');

//Cerrar sesión
Route::get('logout', 'SessionsController@logOut');

//Crear vista alta proveedores
Route::get('/supplier/create', function()
{
	return View::make('/supplier/create');
});


//Función para guardar proveedor en la BD
Route::post('/supplier/create', 'SupplierController@create');

Route::get('/supplier/list', 'SupplierController@showAll'); 


//Funciones para los ingresos
Route::post('/incomes/store','IncomesController@store');

Route::post('/incomes/update/{id}','IncomesController@update');

Route::get('/incomes/destroy/{id}','IncomesController@destroy');
//Route::controller('incomes','IncomesController');

Route::get('/incomes', 'IncomesController@getIndex');

Route::get('/incomes/create', function()
{
    return View::make('incomes/save');
});


//Ver lista de egresos
Route::get('/expense/list', 'ExpenseController@showAll');

//Vista formulario para crear egresos
Route::get('/expense/createForm', 'ExpenseController@showCreateForm');

//Guardar los datos del egreso en BD
Route::post('/expense/create', 'ExpenseController@create');

//Ver lista de usuarios
Route::get('/user/list', 'UserController@showAll');

//Vista formulario para crear usuarios
Route::get('/user/createForm', 'UserController@showCreateForm');

//Guardar los datos de los usuarios en BD
Route::post('/user/create', 'UserController@create');
