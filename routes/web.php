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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/quan-ly-dich-vu', 'CategoryController@index');
Route::match(['get', 'post'], '/quan-ly-khach-hang', ['as' => 'customer', 'uses' => 'CustomerController@index']);
Route::get('/quan-ly-mau-email', 'EmailTemplateController@index');
Route::get('/them-cc', 'EmailTemplateController@addCC');
Route::get('/quan-ly-logs', 'LogController@index');
Route::get('/quan-ly-tasks', 'MailTaskController@index');

Route::post('/category/update', 'CategoryController@post');
Route::post('/category/delete', 'CategoryController@delete');
Route::post('/category/mail', 'CategoryController@mail');

Route::post('/customer/update', 'CustomerController@post');
Route::post('/customer/delete', 'CustomerController@delete');

Route::post('/customer/extra', 'CustomerController@extra');
Route::post('/customer/mail', 'CustomerController@mail');

Route::post('/template/update', 'EmailTemplateController@post');
Route::post('/template/auto', 'EmailTemplateController@auto');
Route::post('/template/delete', 'EmailTemplateController@delete');
Route::post('/template/cc', 'EmailTemplateController@cc');

Route::get('/test', 'HomeController@test');

