<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication User
Route::post('/login/store' , 'UserController@login');
Route::post('/register/store' , 'UserController@register');
Route::post('/forgot-password/{username}' , 'UserController@forgotPassword');

// Api Siswa
Route::get('/siswa' , 'SiswaController@index');
Route::get('/siswa/{keyword}' , 'SiswaController@search');
Route::post('/siswa/tambah' , 'SiswaController@tambah');
Route::put('/siswa/{nim}' , 'SiswaController@edit');
Route::delete('/siswa/{nim}' , 'SiswaController@delete');

// Api Tagihan
Route::get('/tagihan' , 'TagihanController@index');
Route::get('/tagihan/{keyword}' , 'TagihanController@search');
Route::put('/tagihan/{no_tagihan}' , 'TagihanController@edit');
Route::delete('/tagihan/{no_tagihan}' , 'TagihanController@delete');

// Api Tagihan Detail
Route::get('/t-detail/{no_tagihan}' , 'DetailTagihan@index');
Route::post('/t-detail/{no_tagihan}' , 'DetailTagihan@tambah');
Route::put('/t-detail/{no_tagihan}/{nilai}' , 'DetailTagihan@edit');
Route::delete('/t-detail/{no_tagihan}/{nilai}' , 'DetailTagihan@delete');

// Api Pembayaran
Route::get('/pembayaran' , 'PembayaranController@index');
Route::post('/pembayaran' , 'PembayaranController@tambah');
Route::put('/pembayaran/{nim}' , 'PembayaranController@edit');
Route::delete('/pembayaran/{nim}' , 'PembayaranController@delete');
