<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::post('register.clients', 'Auth\RegisterController@register_clients')->name('register_clients');
Route::post('register.tutors', 'Auth\RegisterController@register_tutors')->name('register_tutors');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



Route::get('/', function () {return redirect()->route('home');}); 
Route::group(['prefix' => 'panel/administrativo', 'middleware' => 'auth'], function () {


Route::get('', 'HomeController@home')->name('home');
Route::get('/iniciar-sesion', 'HomeController@login')->name('admin.login');


////////// Rutas usuarios /////////
Route::get('/view/users','UsersController@index')->name('users.index')->middleware('permission:Administrador_usuarios_ver');
Route::get('/create/users','UsersController@create')->name('users.create');
Route::get('/edit/users','UsersController@edit')->name('users.edit');

///////// Rutas roles  ////////////

Route::get('/view/roles','RolesController@index')->name('roles.index');
Route::post('/create/roles','RolesController@store')->name('roles.store');
Route::get('/edit/roles','RolesController@edit')->name('roles.edit');
Route::get('/permision/roles/{id_rol}','RolesController@permissionindex')->name('roles.permission');
Route::post('/permision_store/roles','RolesController@permissionstore')->name('roles.permission.store');

///////// Rutas parametricas  //////////

Route::get('/view/parametrics','ParametricsController@index')->name('parametrics.index');//->middleware('can:Administrador_parametricas_ver');
Route::get('/create/parametrics','ParametricsController@create')->name('parametrics.create');//->middleware('can:Administrador_parametricas_crear');
Route::get('/edit/parametrics/{id}','ParametricsController@edit')->name('parametrics.edit');//->middleware('can:Administrador_parametricas_editar');
Route::post('/store/parametrics','ParametricsController@store')->name('parametrics.store');
Route::post('/update/parametrics','ParametricsController@update')->name('parametrics.update');
Route::get('/delete/parametrics/{id}','ParametricsController@delete')->name('parametrics.delete');

///////// Rutas paises  ////////////

Route::get('/view/countries','CountriesController@index')->name('countries.index');
Route::get('/create/countries','CountriesController@create')->name('countries.create');
Route::get('/edit/countries/{id}','CountriesController@edit')->name('countries.edit');
Route::post('/store/countries','CountriesController@store')->name('countries.store');
Route::post('/update/countries','CountriesController@update')->name('countries.update');
Route::get('/delete/countries/{id}', 'CountriesController@delete')->name('countries.delete');

///////// Rutas clientes  ////////////

Route::get('/view/customers','CustomersController@index')->name('customers.index');
Route::get('/create/customers','CustomersController@create')->name('customers.create');
Route::get('/edit/customers','CustomersController@edit')->name('customers.edit');

///////// Rutas tutores  ////////////

Route::get('/view/tutors','TutorsController@index')->name('tutors.index');
Route::get('/create/tutors','TutorsController@create')->name('tutors.create');
Route::get('/edit/tutors','TutorsController@edit')->name('tutors.edit');

////////// Rutas monedas //////////

Route::get('/view/coins','CoinsController@index')->name('coins.index');
Route::get('/create/coins','CoinsController@create')->name('coins.create');
Route::get('/edit/coins/{id}','CoinsController@edit')->name('coins.edit');
Route::post('/store/coins','CoinsController@store')->name('coins.store');
Route::post('/update/coins','CoinsController@update')->name('coins.update');
Route::get('/inactive/coins/{id}', 'CoinsController@inactive')->name('coins.inactive');
Route::get('/active/coins/{id}', 'CoinsController@active')->name('coins.active');

////////// Rutas areas //////////

Route::get('/view/areas','AreasController@index')->name('areas.index');
Route::get('/create/areas','AreasController@create')->name('areas.create');
Route::get('/edit/areas/{id}','AreasController@edit')->name('areas.edit');
Route::post('/store/areas','AreasController@store')->name('areas.store');
Route::post('/update/areas','AreasController@update')->name('areas.update');
Route::get('/inactive/areas/{id}', 'AreasController@inactive')->name('areas.inactive');
Route::get('/active/areas/{id}', 'AreasController@active')->name('areas.active');


////////// Rutas materias //////////

Route::get('/view/subjects','SubjectsController@index')->name('areas.subjects.index');
Route::get('/create/subjects','SubjectsController@create')->name('areas.subjects.create');
Route::get('/edit/subjects','SubjectsController@edit')->name('areas.subjects.edit');




Route::get('/createpermission',function(){

    Permission::create(['name' => 'Administrador_parametricas_ver']);
    Permission::create(['name' => 'Administrador_parametricas_crear']);
    Permission::create(['name' => 'Administrador_parametricas_editar']);

    return '<h1>se han creado los permisos</h1>';
});



});