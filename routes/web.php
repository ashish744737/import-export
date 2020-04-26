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

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('export', 'ImportController@export')->name('export');
    Route::get('import-Export', 'ImportController@import_export_page');
    Route::post('import', 'ImportController@import')->name('import');
    Route::get('exportCSV', 'ImportController@exportCSV')->name('exportCSV');
    
    Route::get('multi_import_view','MultiImportController@index')->name('multiimport_view');
    Route::post('multi_import', 'MultiImportController@multi_import')->name('multi_import');
    
    
    Route::get('truncate_products','MultiImportController@truncate_products')->name('truncate_products');
    Route::get('truncate_students','ImportController@truncate_students')->name('truncate_students');
});
