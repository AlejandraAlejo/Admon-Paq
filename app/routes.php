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
Route::post('welcome', 'SessionsController@welcome');

//Cerrar sesión
Route::get('logout', 'SessionsController@logOut');
Route::get('/supplier/logout', 'SessionsController@logOut');
Route::get('/income/logout', 'SessionsController@logOut');


//Crear vista alta proveedores
Route::get('/supplier/create', function()
{
	return View::make('/supplier/create');
});

//Guardar proveedor en la BD
Route::post('/supplier/create', 'SupplierController@create');

//Eliminar proveedor
Route::get('/supplier/delete/{id}', 'SupplierController@delete');

//Listar todos los proveedores
Route::get('/supplier/list', 'SupplierController@showAll'); 

//Editar proveedor
Route::get('/supplier/update/{id}','SupplierController@showUpdate');
Route::post('/supplier/update/{id}','SupplierController@update');

//Ver proveedor
Route::get('/supplier/view/{id}','SupplierController@view');

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
/*Route::post('/incomes/create', 'ExpenseController@save');*/
//Ver lista de ingresos
Route::get('/incomes/list', 'IncomesController@showAll');
//Vista formulario para crear ingresos
Route::get('/incomes/createForm', 'IncomesController@showCreateForm');
//Guardar los datos del eingreso en BD
Route::post('/incomes/create', 'IncomesController@create');



//Ver lista de egresos
Route::get('/expense/list', 'ExpenseController@showAll');

//Vista formulario para crear egresos
Route::get('/expense/createForm', 'ExpenseController@showCreateForm');

//Guardar los datos del egreso en BD
Route::post('/expense/create', 'ExpenseController@create');


//Ver lista de usuarios
Route::get('/user/list', 'UserController@showAll');

//Vista formulario para crear usuarios
Route::get('/user/create', 'UserController@showCreateForm');

//Guardar los datos de los usuarios en BD
Route::post('/user/create', 'UserController@create');

//Muestra usuario seleccionado
Route::get('/user/view/{id}', array('as' => 'id', 'uses' => 'UserController@view'));

//Elimina el usuario seleccionado
Route::get('/user/delete/{id}', array('as' => 'id', 'uses' => 'UserController@delete'));

//Muestra formulario para editar el usuario
Route::get('/user/update/{id}','UserController@showUpdate');

//Guarda el usuario editado en la BD
Route::post('/user/update/{id}','UserController@update');

/*BUSCADOR*/
Route::get('/search', array('as' => 'search', 'uses' => 'UserController@search'));

/*PERFIL*/
Route::get('/user/profile', 'UserController@viewProfile');

