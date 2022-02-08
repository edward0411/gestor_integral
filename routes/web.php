<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

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

if ($options['reset'] ?? true) {
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
 }
 
 

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
Route::get('refresh-captcha', 'Auth\LoginController@refreshCaptcha')->name('refreshCaptcha');

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

Route::get('/view/roles','RolesController@index')->name('roles.index');//->middleware('permission:Administrador_roles_ver');
Route::post('/create/roles','RolesController@store')->name('roles.store');//->middleware('permission:Administrador_roles_crear');
Route::get('/edit/roles','RolesController@edit')->name('roles.edit');//->middleware('permission:Administrador_roles_editar');
Route::get('/permision/roles/{id_rol}','RolesController@permissionindex')->name('roles.permission');//->middleware('permission:Administrador_usuarios_ver');
Route::post('/permision_store/roles','RolesController@permissionstore')->name('roles.permission.store');//->middleware('permission:Administrador_usuarios_ver');

///////// Rutas parametricas  //////////

Route::get('/view/parametrics','ParametricsController@index')->name('parametrics.index')->middleware('permission:Administrador_parametricas_ver');
Route::get('/create/parametrics','ParametricsController@create')->name('parametrics.create')->middleware('permission:Administrador_parametricas_crear');
Route::get('/edit/parametrics/{id}','ParametricsController@edit')->name('parametrics.edit')->middleware('permission:Administrador_parametricas_editar');
Route::post('/store/parametrics','ParametricsController@store')->name('parametrics.store')->middleware('permission:Administrador_parametricas_crear');
Route::post('/update/parametrics','ParametricsController@update')->name('parametrics.update')->middleware('permission:Administrador_parametricas_editar');
Route::get('/delete/parametrics/{id}','ParametricsController@delete')->name('parametrics.delete')->middleware('permission:Administrador_parametricas_eliminar');

///////// Rutas paises  ////////////

Route::get('/view/countries','CountriesController@index')->name('countries.index')->middleware('permission:Administrador_paises_ver');
Route::get('/create/countries','CountriesController@create')->name('countries.create')->middleware('permission:Administrador_paises_crear');
Route::get('/edit/countries/{id}','CountriesController@edit')->name('countries.edit')->middleware('permission:Administrador_paises_editar');
Route::post('/store/countries','CountriesController@store')->name('countries.store')->middleware('permission:Administrador_paises_crear');
Route::post('/update/countries','CountriesController@update')->name('countries.update')->middleware('permission:Administrador_paises_editar');
Route::get('/delete/countries/{id}', 'CountriesController@delete')->name('countries.delete')->middleware('permission:Administrador_paises_eliminar');

///////// Rutas clientes  ////////////

Route::get('/view/customers','CustomersController@active')->name('customers.index')->middleware('permission:Administrador_clientes_activar');
Route::get('/view/customers_inactives','CustomersController@inactive')->name('customers.inactives')->middleware('permission:Administrador_clientes_inactivar');
Route::get('/create/customers','CustomersController@create')->name('customers.create')->middleware('permission:Administrador_clientes_crear');
Route::get('/edit/customers/{id}','CustomersController@edit')->name('customers.edit')->middleware('permission:Administrador_clientes_editar');
Route::get('/processState/customers/{id}','CustomersController@processState')->name('customers.processState');//->middleware('permission:Administrador_parametricas_ver');
Route::post('/store/customers','CustomersController@store_customer')->name('customers.store_customer');//->middleware('permission:Administrador_parametricas_ver');

///////// Rutas tutores  ////////////

Route::get('/view/tutors','TutorsController@active')->name('tutors.index')->middleware('permission:Administrador_tutores_activar');
Route::get('/view/tutors_inactives','TutorsController@inactive')->name('tutors.inactives')->middleware('permission:Administrador_tutores_inactivar');
Route::get('/create/tutors','TutorsController@create')->name('tutors.create')->middleware('permission:Administrador_tutores_crear');
Route::get('/edit/tutors/{id}','TutorsController@edit')->name('tutors.edit')->middleware('permission:Administrador_tutores_editar');
Route::post('/store/tutors','TutorsController@store_tutor')->name('tutors.store_tutor');//->middleware('permission:Administrador_tutores_editar');

////////// Rutas monedas //////////

Route::get('/view/coins','CoinsController@index')->name('coins.index')->middleware('permission:Administrador_monedas_ver');
Route::get('/create/coins','CoinsController@create')->name('coins.create')->middleware('permission:Administrador_monedas_crear');
Route::get('/edit/coins/{id}','CoinsController@edit')->name('coins.edit')->middleware('permission:Administrador_monedas_editar');
Route::post('/store/coins','CoinsController@store')->name('coins.store')->middleware('permission:Administrador_monedas_crear');
Route::post('/update/coins','CoinsController@update')->name('coins.update')->middleware('permission:Administrador_monedas_editar');
Route::get('/inactive/coins/{id}', 'CoinsController@inactive')->name('coins.inactive')->middleware('permission:Administrador_monedas_inactivar');
Route::get('/active/coins/{id}', 'CoinsController@active')->name('coins.active')->middleware('permission:Administrador_monedas_activar');

////////// Rutas areas //////////

Route::get('/view/areas','AreasController@index')->name('areas.index')->middleware('permission:Administrador_areas_ver');
Route::get('/create/areas','AreasController@create')->name('areas.create')->middleware('permission:Administrador_areas_crear');
Route::get('/edit/areas/{id}','AreasController@edit')->name('areas.edit')->middleware('permission:Administrador_areas_editar');
Route::post('/store/areas','AreasController@store')->name('areas.store')->middleware('permission:Administrador_areas_crear');
Route::post('/update/areas','AreasController@update')->name('areas.update')->middleware('permission:Administrador_areas_editar');
Route::get('/inactive/areas/{id}', 'AreasController@inactive')->name('areas.inactive')->middleware('permission:Administrador_areas_inactivar');
Route::get('/active/areas/{id}', 'AreasController@active')->name('areas.active')->middleware('permission:Administrador_areas_activar');


////////// Rutas materias //////////

Route::get('/view/areas/subjects/{id}','SubjectsController@index')->name('areas.subjects.index');//->middleware('permission:Administrador_materias_ver');
Route::get('/create/areas/subjects/{id}','SubjectsController@create')->name('areas.subjects.create');//->middleware('permission:Administrador_materias_crear');
Route::get('/edit/areas/subjects/{id}','SubjectsController@edit')->name('areas.subjects.edit');//->middleware('permission:Administrador_materias_editar');
Route::post('/store/areas/subjects','SubjectsController@store')->name('areas.subjects.store');//->middleware('permission:Administrador_materias_crear');
Route::post('/update/areas/subjects','SubjectsController@update')->name('areas.subjects.update');//->middleware('permission:Administrador_materias_editar');
Route::get('/inactive/areas/subjects/{id}/{id_area}', 'SubjectsController@inactive')->name('areas.subjects.inactive');//->middleware('permission:Administrador_materias_inactivar');
Route::get('/active/areas/subjects/{id}/{id_area}', 'SubjectsController@active')->name('areas.subjects.active');//->middleware('permission:Administrador_materias_activar');


////////// Rutas temas //////////

Route::get('/view/areas/subjects/topics/{id}','TopicsController@index')->name('areas.subjects.topics.index');//->middleware('permission:Administrador_parametricas_ver');
Route::get('/create/subjects/topics/{id}','TopicsController@create')->name('areas.subjects.topics.create');//->middleware('permission:Administrador_parametricas_ver');
Route::get('/edit/subjects/topics/{id}','TopicsController@edit')->name('areas.subjects.topics.edit');//->middleware('permission:Administrador_parametricas_ver');
Route::post('/store/areas/subjects/topics','TopicsController@store')->name('areas.subjects.topics.store');//->middleware('permission:Administrador_parametricas_ver');
Route::post('/update/areas/subjects/topics','TopicsController@update')->name('areas.subjects.topics.update');//->middleware('permission:Administrador_parametricas_ver');
Route::get('/inactive/areas/subjects/topics/{id}/{id_subject}', 'TopicsController@inactive')->name('areas.subjects.topics.inactive');//->middleware('permission:Administrador_parametricas_ver');
Route::get('/active/areas/subjects/topics/{id}/{id_subject}', 'TopicsController@active')->name('areas.subjects.topics.active');//->middleware('permission:Administrador_parametricas_ver');

//////////// Rutas empleados //////////

Route::get('/view/employees','EmployeesController@index')->name('employees.index')->middleware('permission:Administrador_empleados_ver');
Route::get('/create/employees','EmployeesController@create')->name('employees.create')->middleware('permission:Administrador_empleados_crear');
Route::get('/edit/employees/{id}','EmployeesController@edit')->name('employees.edit')->middleware('permission:Administrador_empleados_editar');
Route::post('/store/employees','EmployeesController@store')->name('employees.store')->middleware('permission:Administrador_empleados_crear');
Route::post('/update/employees','EmployeesController@update')->name('employees.update')->middleware('permission:Administrador_empleados_editar');
Route::get('/delete/employees/{id}', 'EmployeesController@delete')->name('employees.delete')->middleware('permission:Administrador_empleados_eliminar');

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

Route::get('/prueba/{id}','Pre_registrationController@prueba');

/////////Rutas mi registro   ///////

Route::get('/information_bank/pre_registration','Pre_registrationController@create_information_bank')->name('pre_registration.my_register.form_information_bank');
Route::get('/information_language/pre_registration','Pre_registrationController@create_information_language')->name('pre_registration.my_register.form_information_language');
Route::get('/information_topics_work/pre_registration','Pre_registrationController@create_information_topics_work')->name('pre_registration.my_register.form_information_topics_work');
Route::get('/information_service/pre_registration','Pre_registrationController@create_information_service')->name('pre_registration.my_register.form_information_service');
Route::get('/information_system/pre_registration','Pre_registrationController@create_information_system')->name('pre_registration.my_register.form_information_system');


////////// Mi perfil y bonos /////////////////

Route::get('/basic_data/profile/{id}','ProfileController@index_basic_data')->name('profile.index_basic_data');
Route::get('/bonds/profile','ProfileController@index_bonds')->name('profile.index_bonds');
Route::get('/create_bonds/profile','ProfileController@create_bonds')->name('profile.create_bonds');
Route::post('/store/profile','ProfileController@store')->name('profile.store');
Route::get('/edit_bonds/profile/{id}','ProfileController@edit_bonds')->name('profile.edit_bonds');
Route::get('/delete/profile/{id}', 'ProfileController@delete')->name('profile.delete');

//////// Cambiar contraaeña /////////
Route::get('/change_password/profile/{id}','ProfileController@change_password')->name('profile.change_password');
Route::post('/change_password_store/profile','ProfileController@change_password_store')->name('profile.change_password_store');




///////Rutas Comunicaciones/////////

Route::get('/communications/index','CommunicationsController@index')->name('communications.index');
Route::get('/communications/view_living/{id}','CommunicationsController@living')->name('communications.living');
Route::post('/communications/{communication}/messages','CommunicationsController@storeMesage')->name('communications.messages.store');

///////Rutas de pagos /////////
Route::get('/payment/index','PaymentController@index')->name('payment.index');
Route::get('/payment/show/{quote}','PaymentController@show')->name('payment.show');
Route::post('/payment/store/{quote}','PaymentController@store')->name('payment.store');
Route::get('/payment/delete/{payment}','PaymentController@delete')->name('payment.delete');
Route::get('/payment/showPayment/{payment}','PaymentController@showPayment')->name('payment.showPayment');
Route::post('/payment/edit/{quote}','PaymentController@edit')->name('payment.edit');



////////Procesos///////////////
Route::get('/process/request/index/{rol}','ProcessController@index_request')->name('process.request.index');
Route::get('/process/request/create','ProcessController@create_request')->name('process.request.create');
Route::post('/process/request/store','ProcessController@store_request')->name('process.request.store');
Route::get('/process/request/edit/{id}','ProcessController@edit_request')->name('process.request.edit');
Route::get('/process/request/delete/{id}','ProcessController@delete_request')->name('process.request.delete');
Route::get('/process/request/delete_file','ProcessController@delete_file')->name('process.request.delete_file');
Route::get('/process/request/change_estate/{id}','ProcessController@change_estate')->name('process.request.change_estate');

/////////Rutas cotizaciones //////////

Route::get('/process/quotes/index','ProcessController@index_quotes')->name('process.quotes.index');
Route::get('/process/quotes/create','ProcessController@create_quotes')->name('process.quotes.create');
Route::get('/process/quotes/edit','ProcessController@edit_quotes')->name('process.quotes.edit');

/////////Rutas trabajos //////////

Route::get('/process/works/index','ProcessController@index_works')->name('process.works.index');
Route::get('/process/works/create','ProcessController@create_works')->name('process.works.create');
Route::get('/process/works/edit','ProcessController@edit_works')->name('process.works.edit');


Route::get('/clearcache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect()->back();
});

Route::get('/createpermission',function(){



    return '<h1>se han creado los permisos</h1>';
});



});
