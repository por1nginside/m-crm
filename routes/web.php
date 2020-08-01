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
    Route::resource('companies', 'CompanyController')->except('show');
    Route::resource('employees', 'EmployeeController')->except('show');

    //datatables route
    Route::get('datatables-companies', 'CompanyController@getCompanies')->name('get-companies');
    Route::get('datatables-employees', 'EmployeeController@getEmployees')->name('get-employees');

    // Switcher lang
    Route::get('locale/{locale}', 'HomeController@switcher')->name('locale');
});

Auth::routes(['register' => false]);
