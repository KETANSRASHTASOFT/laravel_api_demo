<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::resource('/companies', 'Admin\CompaniesController');
Route::get('datatable/companies/',['as'=>'useDataTables','uses'=>'Admin\CompaniesController@useDataTables']);

Route::resource('/employees', 'Admin\EmployeesController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/set/locale',['as'=>'setLocale','uses'=>'HomeController@setLocale']);


