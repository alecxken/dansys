<?php

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
///school

Route::get('/', function () {
    return redirect('home');
});

#create-company routes


Route::get('/reported-incident','IncidentController@sosresponders');

Route::get('/reported-incident-closed','IncidentController@sosrespondersapi');

Route::get('/get-incidents/{id}','IncidentController@getactionincident');

Route::post('/store-incident-comments','IncidentController@actionincident');




Route::get('/sos-responders','IncidentController@sosresponders');

Route::get('/company-create','IncidentController@createcompany');

Route::get('company-get/{id}','IncidentController@getcompany');

Route::get('/company-drop/{id}','IncidentController@deletecompany');

Route::post('/company-store','IncidentController@storecompany');

Route::post('/company-update','IncidentController@updatecompany');

Route::post('/incident-store','IncidentController@storeincident');

Route::get('/my-incidents','IncidentController@myincident');



Route::get('/soscompany-create','IncidentController@createsoscompany');

Route::get('soscompany-get/{id}','IncidentController@getsoscompany');

Route::get('/soscompany-drop/{id}','IncidentController@deletesoscompany');

Route::post('/soscompany-store','IncidentController@storesoscompany');

Route::post('/soscompany-update','IncidentController@updatesoscompany');

Route::post('/rescompany-store','IncidentController@storerespondercompany');






#end creation of company


Route::get('/jobs-index','HomeController@indexs');

Route::get('/job-resend','HomeController@resend');

Route::get('/jobs-apps','SchoolController@applynow');

Route::get('/new-incident','IncidentController@new');

Route::get('/view-adminapps','SchoolController@myapplicants');

Route::post('/proceed-job','SchoolController@continue');

Route::post('/save-final','SchoolController@savefinal');

Route::get('verify/page', 'TwoFactorController@resend')->name('verify.index');
Route::get('verify/resend', 'TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'TwoFactorController')->only(['index', 'store']);


Route::get('/create-school','SchoolController@createskul');
Route::post('/store-school','SchoolController@storeskul');

Route::get('/create-course','SchoolController@createcos');
Route::post('/store-course','SchoolController@storecos');

Route::get('/create-checklist','SchoolController@coursechk');
Route::post('/store-course-checklist','SchoolController@storecoursechk');

Route::get('/deletechecklist/{id}','SchoolController@deletechecklist');

Route::group(['middleware' => ['twofactor']], function () {
    //

    Auth::routes();

});
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'AdminController@index')->name('Dashboard');





Route::get('/dashboard', 'AdminController@index')->name('Dashboard');

//permissions and Roles
Route::resource('admin', 'UserController');
Route::resource('roles', 'RoleController');
//roles RouteServiceProvider
Route::get('/roles_index','RoleController@index');
Route::get('/roles_create','RoleController@create');

Route::post('/roles_store','RoleController@store');
Route::post('/roles_update/{id}','RoleController@update');
Route::post('/roles_destroy/{id}','RoleController@destroy');
Route::post('/roles_edit/{id}','RoleController@edit');
Route::post('/roles_show/{id}','RoleController@show');

//permissions and Roles
Route::get('/user_index','UserController@index');
Route::get('/user_create','UserController@create');
Route::get('/users_create','UserController@create');
Route::post('/user_stores','UserController@storez');

Route::post('/user_store','UserController@store');
Route::post('/user_update/{id}','UserController@update');
Route::get('/user_destroy/{id}','UserController@destroy');
Route::post('/user_edit/{id}','UserController@edit');
Route::post('/user_show/{id}','UserController@show');

//permissions and Roles
Route::get('/permissions_index','PermissionController@index');
Route::get('/permission_create','PermissionController@create');
Route::post('/permissions_store','PermissionController@store');
Route::post('/permissions_update/{id}','PermissionController@update');
Route::post('/permissions_destroy/{id}','PermissionController@destroy');
Route::post('/permission_edit/{id}','PermissionController@edit');
Route::post('/permission_show/{id}','PermissionController@show');
Route::resource('/permissions', 'PermissionController');


