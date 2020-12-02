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
// Route::resource('products','ProductController');

// login
Route::get('/login', 'otentikasi\OtentikasiController@index' )-> name('login') ;
Route::post('/login', 'otentikasi\OtentikasiController@login') -> name('login');
Route::get('/logout', 'otentikasi\OtentikasiController@logout') -> name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('/home');
    });
    Route::get('/home', function () {
        return view('/home');
    });
    // tambah user
    Route::get('/tambahuser', 'otentikasi\OtentikasiController@tambah' )-> name('tambah-user') ;
    Route::post('/tambahuser/simpan', 'otentikasi\OtentikasiController@simpan') -> name('tambah-user-simpan');
    //profile user
    Route::get('/profile', 'otentikasi\OtentikasiController@profile' )-> name('profile') ;
    Route::post('/profile/simpan', 'otentikasi\OtentikasiController@profilesimpan') -> name('profile-user-simpan');
});