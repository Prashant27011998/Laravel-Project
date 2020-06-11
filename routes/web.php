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
Route::get('/success', function () {
    return view('pages.sucess');
});


Route::resource('forms', 'ATGController');
// Route::get('/verify','WebServicesController@verify');

Route::get('created', 'WebServicesController@create');

Route::post('created', 'WebServicesController@save');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
