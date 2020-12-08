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

//USER
Route::get('/', 'UserAction@index');
Route::get('/RegisterPage', 'UserAction@goToRegister');
Route::get('/LoginPage', 'UserAction@goToLogin');
Route::post('/register', 'UserAction@register');
Route::post('/login', 'UserAction@login');

//CUSTOMER
Route::any('/homecustomer', 'CustomerController@index');

// apartmentstatus
// 0 = tersedia
// -1 = dihapus

//SELLER
Route::any('/homeseller', 'SellerController@index');
Route::get('/viewaddapartment', 'SellerController@viewAddApartment');
Route::post('/getkota', 'SellerController@GetKota');
Route::post('/addapartment', 'SellerController@AddApartment');
Route::get('/detailapartment/{id}', 'SellerController@DetailApartment');
Route::get('/viewdetailapartment', 'SellerController@viewDetailApartment');
Route::post('/updateapartment', 'SellerController@UpdateApartment');
Route::get('/deleteapartment/{id}', 'SellerController@DeleteApartment');
Route::get('/deleteapartment', 'SellerController@DeleteApartment');
Route::get('/editProfilePage', 'SellerController@goToEditProfile');
Route::post('/editProfile', 'SellerController@editProfile');
Route::get('/terimatransaksi/{id}', 'SellerController@terimaTransaksi');
Route::get('/selesaiSewa/{id}', 'SellerController@selesaiSewa');

Route::get('/viewlistorder', 'SellerController@viewListOrder');

Route::get('/detail/{id}', 'CustomerController@detail');
Route::get('/detail', 'CustomerController@showdetail');
Route::get('/detailsewa','CustomerController@showdetailsewa');
Route::any('/ubahkota', "CustomerController@ubahkota");
Route::any('/beli', "CustomerController@beli");
Route::any('/sewa', "CustomerController@sewa");
Route::any('/search', "CustomerController@search");
Route::post('/favorit', "CustomerController@favorit");
Route::get('/deleteFavorit/{id}', 'CustomerController@deleteFavorit');
Route::get('/halamanFavorit', "CustomerController@toFavorit");

Route::get('/halamanHistory', 'CustomerController@history');

Route::get('/detailTransaksi/{id}', 'CustomerController@detailTransaksi');
Route::get('/viewdetailtransaksi', 'CustomerController@viewDetailTransaksi');

Route::post('/review/{id}', 'CustomerController@review');

