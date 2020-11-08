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

Route::get('/', 'UserAction@index');
Route::get('/RegisterPage','UserAction@goToRegister');
Route::get('/LoginPage','UserAction@goToLogin');
Route::post('/register', 'UserAction@register');
Route::post('/login', 'UserAction@login');


Route::any('/homecustomer', 'CustomerController@index');
Route::any('/homeseller', 'SellerController@index');
