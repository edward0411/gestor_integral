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

Route::get('/home', 'HomeController@home')->name('home');

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
Route::get('logouth', 'Auth\LoginController@logout')->name('logouth');

Route::get('info.dataTreatment', 'Auth\LoginController@showViewdataTreatment')->name('system.info.dataTreatment');
Route::get('info.termsConditions', 'Auth\LoginController@showViewtermsConditions')->name('system.info.termsConditions');

Route::get('/', function () {return redirect()->route('home');});
Route::group(['prefix' => 'panel/administrativo', 'middleware' => 'auth'], function () {


Route::get('', 'HomeController@home')->name('home');
Route::get('/iniciar-sesion', 'HomeController@login')->name('admin.login');


////////// Rutas usuarios /////////
Route::get('/view/users','UsersController@index')->name('users.index');//->middleware('permission:Administrador_usuarios_ver');
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

Route::get('/view/customers','CustomersController@active')->name('customers.index');
Route::get('/view/customers_inactives','CustomersController@inactive')->name('customers.inactives');
Route::get('/create/customers','CustomersController@create')->name('customers.create');
Route::get('/edit/customers/{id}','CustomersController@edit')->name('customers.edit');
Route::get('/processState/customers/{id}','CustomersController@processState')->name('customers.processState');

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

Route::get('/view/areas/subjects/{id}','SubjectsController@index')->name('areas.subjects.index');
Route::get('/create/areas/subjects/{id}','SubjectsController@create')->name('areas.subjects.create');
Route::get('/edit/areas/subjects/{id}','SubjectsController@edit')->name('areas.subjects.edit');
Route::post('/store/areas/subjects','SubjectsController@store')->name('areas.subjects.store');
Route::post('/update/areas/subjects','SubjectsController@update')->name('areas.subjects.update');
Route::get('/inactive/areas/subjects/{id}/{id_area}', 'SubjectsController@inactive')->name('areas.subjects.inactive');
Route::get('/active/areas/subjects/{id}/{id_area}', 'SubjectsController@active')->name('areas.subjects.active');


////////// Rutas temas //////////

Route::get('/view/areas/subjects/topics/{id}','TopicsController@index')->name('areas.subjects.topics.index');
Route::get('/create/subjects/topics/{id}','TopicsController@create')->name('areas.subjects.topics.create');
Route::get('/edit/subjects/topics/{id}','TopicsController@edit')->name('areas.subjects.topics.edit');
Route::post('/store/areas/subjects/topics','TopicsController@store')->name('areas.subjects.topics.store');
Route::post('/update/areas/subjects/topics','TopicsController@update')->name('areas.subjects.topics.update');
Route::get('/inactive/areas/subjects/topics/{id}/{id_subject}', 'TopicsController@inactive')->name('areas.subjects.topics.inactive');
Route::get('/active/areas/subjects/topics/{id}/{id_subject}', 'TopicsController@active')->name('areas.subjects.topics.active');

//////////// Rutas empleados //////////

Route::get('/view/employees','EmployeesController@index')->name('employees.index');
Route::get('/create/employees','EmployeesController@create')->name('employees.create');
Route::get('/edit/employees/{id}','EmployeesController@edit')->name('employees.edit');
Route::post('/store/employees','EmployeesController@store')->name('employees.store');
Route::post('/update/employees','EmployeesController@update')->name('employees.update');
Route::get('/delete/employees/{id}', 'EmployeesController@delete')->name('employees.delete');

////////Ruta Pre-registro /////////

Route::get('/view_registration/pre_registration','Pre_registrationController@index_registration')->name('pre_registration.index_registration');
Route::get('/registration/get_info_acount_bank','Pre_registrationController@get_info_acount_bank')->name('pre_registration.get_info_acount_bank');
Route::get('/registration/get_info_language','Pre_registrationController@get_info_language')->name('pre_registration.get_info_language');
Route::get('/registration/get_info_system','Pre_registrationController@get_info_system')->name('pre_registration.get_info_system');
Route::get('/registration/get_info_topic','Pre_registrationController@get_info_topic')->name('pre_registration.get_info_topic');
Route::get('/registration/get_info_service','Pre_registrationController@get_info_service')->name('pre_registration.get_info_service');
Route::get('/registration/save_line_first','Pre_registrationController@save_line_first')->name('pre_registration.save_line_first');
Route::get('/registration/save_state_tutor/{user}/{value}','Pre_registrationController@save_state_tutor')->name('pre_registration.save_state_tutor');
Route::get('/registration/process/','Pre_registrationController@processRequest')->name('pre_registration.process.request');
Route::post('/registration/acount_bank/store','Pre_registrationController@acount_bank_store')->name('pre_registration.acount_bank.store');
Route::post('/registration/acount_bank/delete/{account}','Pre_registrationController@acountBankDelete')->name('pre_registration.acount_bank.delete');//eliminar informacion bancaria  de tutor

Route::post('/registration/language/store','Pre_registrationController@lenguageStore')->name('pre_registration.language.store');//crear o editar lenguajes  de tutor
Route::post('/registration/language/delete/{language}','Pre_registrationController@lenguageDelete')->name('pre_registration.language.delete');//eliminar lenguajes  de tutor

Route::post('/registration/service/store','Pre_registrationController@serviceStore')->name('pre_registration.service.store');//crear o editar servicio de tutor
Route::post('/registration/service/delete/{service}','Pre_registrationController@serviceDelete')->name('pre_registration.service.delete');//eliminar service  de tutor


Route::post('/registration/topic/store','Pre_registrationController@topicStore')->name('pre_registration.topic.store');//crear o editar topic de tutor
Route::post('/registration/topic/delete/{topic}','Pre_registrationController@topicDelete')->name('pre_registration.topic.delete');//eliminar topic  de tutor


Route::post('/registration/system/store','Pre_registrationController@systemStore')->name('pre_registration.system.store');//crear o editar sistema de tutor
Route::post('/registration/system/delete/{system}','Pre_registrationController@systemDelete')->name('pre_registration.system.delete');//eliminar sistema  de tutor

Route::get('/view_turors_list/pre_registration','Pre_registrationController@index_turors_list')->name('pre_registration.index_turors_list');
Route::get('/view_tutors/pre_registration/{user}','Pre_registrationController@view_tutors')->name('pre_registration.view_tutors');

/////////Rutas mi registro   ///////

Route::get('/information_bank/pre_registration','Pre_registrationController@create_information_bank')->name('pre_registration.my_register.form_information_bank');
Route::get('/information_language/pre_registration','Pre_registrationController@create_information_language')->name('pre_registration.my_register.form_information_language');
Route::get('/information_topics_work/pre_registration','Pre_registrationController@create_information_topics_work')->name('pre_registration.my_register.form_information_topics_work');
Route::get('/information_service/pre_registration','Pre_registrationController@create_information_service')->name('pre_registration.my_register.form_information_service');
Route::get('/information_system/pre_registration','Pre_registrationController@create_information_system')->name('pre_registration.my_register.form_information_system');


////////// Mi perfil y bonos /////////////////

Route::get('/basic_data/profile','ProfileController@index_basic_data')->name('profile.index_basic_data');
Route::get('/bonds/profile','ProfileController@index_bonds')->name('profile.index_bonds');
Route::get('/create_bonds/profile','ProfileController@create_bonds')->name('profile.create_bonds');
Route::get('/edit_bonds/profile','ProfileController@edit_bonds')->name('profile.edit_bonds');


///////Rutas Comunicaciones/////////

Route::get('/communications/index','CommunicationsController@index')->name('communications.index');
Route::get('/communications/view_living/{id}','CommunicationsController@living')->name('communications.living');

////////Cotizaciones///////////////
Route::get('/view/cotizaciones','QuoteController@index')->name('quotes.index');
Route::get('/view/cotizaciones/myQuotes','QuoteController@myQuotes')->name('quotes.myQuotes');

Route::get('/clearcache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return '<h1>se ha borrado el cache</h1>';
});

Route::get('/createpermission',function(){

    /*Permission::create(['name' => 'Administrador']);

    Permission::create(['name' => 'Administrador_clientes_ver']);
    Permission::create(['name' => 'Administrador_clientes_crear']);
    Permission::create(['name' => 'Administrador_clientes_editar']);
    Permission::create(['name' => 'Administrador_clientes_activar']);
    Permission::create(['name' => 'Administrador_clientes_inactivar']);

    Permission::create(['name' => 'Administrador_tutores_ver']);
    Permission::create(['name' => 'Administrador_tutores_crear']);
    Permission::create(['name' => 'Administrador_tutores_editar']);
    Permission::create(['name' => 'Administrador_tutores_activar']);
    Permission::create(['name' => 'Administrador_tutores_inactivar']);

    Permission::create(['name' => 'Administrador_empleados_ver']);
    Permission::create(['name' => 'Administrador_empleados_crear']);
    Permission::create(['name' => 'Administrador_empleados_editar']);
    Permission::create(['name' => 'Administrador_empleados_eliminar']);

    Permission::create(['name' => 'Administrador_roles_ver']);
    Permission::create(['name' => 'Administrador_roles_crear']);
    Permission::create(['name' => 'Administrador_roles_editar']);
    Permission::create(['name' => 'Administrador_roles_eliminar']);

    Permission::create(['name' => 'Administrador_paises_ver']);
    Permission::create(['name' => 'Administrador_paises_crear']);
    Permission::create(['name' => 'Administrador_paises_editar']);
    Permission::create(['name' => 'Administrador_paises_eliminar']);

    Permission::create(['name' => 'Administrador_parametricas_ver']);
    Permission::create(['name' => 'Administrador_parametricas_crear']);
    Permission::create(['name' => 'Administrador_parametricas_editar']);
    Permission::create(['name' => 'Administrador_parametricas_eliminar']);

    Permission::create(['name' => 'Administrador_monedas_ver']);
    Permission::create(['name' => 'Administrador_monedas_crear']);
    Permission::create(['name' => 'Administrador_monedas_editar']);
    Permission::create(['name' => 'Administrador_monedas_eliminar']);

    Permission::create(['name' => 'Administrador_areas_ver']);
    Permission::create(['name' => 'Administrador_areas_crear']);
    Permission::create(['name' => 'Administrador_areas_editar']);
    Permission::create(['name' => 'Administrador_areas_eliminar']);

    Permission::create(['name' => 'Preregistro']);

    Permission::create(['name' => 'Preregistro_historial_ver']);
    Permission::create(['name' => 'Preregistro_listado_ver']);

    Permission::create(['name' => 'Perfil']);

    Permission::create(['name' => 'Perfil_datosBasicos_ver']);
    Permission::create(['name' => 'Perfil_bonos_ver']);

    Permission::create(['name' => 'Comunicaciones']);

    Permission::create(['name' => 'Comunicaciones_bandeja']);*/

    //Segunda ronda de permisos

    /*Permission::create(['name' => 'Cotizaciones']);
    Permission::create(['name' => 'Cotizaciones_pendientes_ver']);
    Permission::create(['name' => 'Cotizaciones_historial_ver']);
    Permission::create(['name' => 'Cotizaciones_misCotizaciones_ver']);
    Permission::create(['name' => 'Billetera_virtual']);
    Permission::create(['name' => 'Billetera_virtual_miBilletera_ver']);
    Permission::create(['name' => 'Billetera_virtual_HistoriarPagos_ver']);
    Permission::create(['name' => 'Pagos']);
    Permission::create(['name' => 'Pagos_HistorialPagosClientes_ver']);
    Permission::create(['name' => 'Reportes']);
    Permission::create(['name' => 'Reportes_Listado_ver']);*/



    return '<h1>se han creado los permisos</h1>';
});



});
