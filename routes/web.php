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
    return redirect('/login');
});

Route::get('template', function () {
    return view('layouts.template');
});

Auth::routes();

Route::middleware('auth:web')->group(function () {

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::post('dashboard/weather', 'DashboardController@getWeather')->name('dashboard.weather');

Route::get('category', 'CategoryController@index')->name('category.index');
Route::get('category/delete/{id?}','CategoryController@delete')->name('category.delete');
Route::post('category/show','CategoryController@show')->name('category.show');
Route::post('category/store','CategoryController@store')->name('category.store');
Route::post('category/load-data','CategoryController@loadData')->name('category.load-data');

Route::get('user', 'UserManagement@index')->name('user.index');
Route::get('user/delete/{id?}','UserManagement@delete')->name('user.delete');
Route::post('user/load-data','UserManagement@loadData')->name('user.load-data');
Route::post('user/show','UserManagement@show')->name('user.show');
Route::post('user/store','UserManagement@store')->name('user.store');

});