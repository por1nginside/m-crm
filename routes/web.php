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

Route::middleware('custom')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('companies', 'CompanyController');

    //datatables route
    Route::get('datatables-companies', 'CompanyController@getCompanies')->name('get-companies');
});

Auth::routes(['register' => false]);
