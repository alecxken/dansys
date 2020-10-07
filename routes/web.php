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
Route::get('/jobs-apps','SchoolController@applynow');

Route::get('/view-apps','SchoolController@applicants');

Route::get('/view-adminapps','SchoolController@myapplicants');

Route::post('/proceed-job','SchoolController@continue');

Route::post('/save-final','SchoolController@savefinal');



Route::get('/create-school','SchoolController@createskul');
Route::post('/store-school','SchoolController@storeskul');

Route::get('/create-course','SchoolController@createcos');
Route::post('/store-course','SchoolController@storecos');

Route::get('/create-checklist','SchoolController@coursechk');
Route::post('/store-course-checklist','SchoolController@storecoursechk');

Route::get('/deletechecklist/{id}','SchoolController@deletechecklist');




Auth::routes();

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


