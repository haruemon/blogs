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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontController@index')->name('blog.index');
Route::get('/blog/{post}', 'FrontController@show')->name('blog.show');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/post', 'PostController');
    Route::resource('/user', 'UserController');
    Route::get('/csv_import/{table_name}', 'CsvImportController@index')->name('csv_import.index');
    Route::post('/csv_import/{table_name}', 'CsvImportController@store')->name('csv_import.store');
});