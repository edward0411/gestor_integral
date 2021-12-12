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
Route::get('register.tutors', 'Auth\RegisterController@showRegistrationTutorsForm')->name('registerTutors');
Route::get('register.clients', 'Auth\RegisterController@showRegistrationClientsForm')->name('registerClients');
Route::post('register', 'Auth\RegisterController@register');
Route::post('register.clients', 'Auth\RegisterController@register_clients')->name('register_clients');
Route::post('register.tutors', 'Auth\RegisterController@register_tutors')->name('register_tutors');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login.tutors', 'Auth\LoginController@showLoginTutorsForm')->name('login_tutors');
Route::get('login.clients', 'Auth\LoginController@showLoginClientsForm')->name('login_clients');
Route::get('login.employee', 'Auth\LoginController@showLoginEmployeeForm')->name('login_employee');
Route::post('login', 'Auth\LoginController@login');
Route::post('loginClients', 'Auth\LoginController@loginClients')->name('loginClients');
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

Route::get('/createpermission',function(){

    Permission::create(['name' => 'Administrador_parametricas_ver']);
    Permission::create(['name' => 'Administrador_parametricas_crear']);
    Permission::create(['name' => 'Administrador_parametricas_editar']);

    return '<h1>se han creado los permisos</h1>';
});



});