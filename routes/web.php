<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PelangganController;
<<<<<<< HEAD
use App\Http\Controllers\PaketController;
=======
use App\Http\Controllers\TransaksiController;
>>>>>>> 3279c6315ab2ce66b02744410232beab5d5b8b28

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
// login
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route resource Mobil 
Route::resource('mobil', MobilController::class);
Route::resource('pelanggan', PelangganController::class);
<<<<<<< HEAD
Route::resource('paket', PaketController::class);
=======
Route::resource('transaksi', TransaksiController::class);
>>>>>>> 3279c6315ab2ce66b02744410232beab5d5b8b28
