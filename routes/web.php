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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('users', 'UsersController@index');
Route::get('user/{id}', 'UsersController@delete');
Route::get('regist/{nom}/{email}/{password}/{confirmation}', 'Userscontroller@registration');
Route::get('login/{email}/{password}', 'Userscontroller@connection');


Route::get('/store', function () {
    return view('store');
});
Auth::routes();

Route::get('connecte/{email}/{password}', function ($email, $password) {
});

Route::get('/home', 'HomeController@index')->name('home');