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
Auth::routes();
// login admin
Route::get('admin/', function () {
    return view('auth.login');
});
Route::prefix('admin')
    ->group(function(){
        Route::resources([
                'mobil'         => App\Http\Controllers\Admin\MobilController::class,
                'pelanggan'     => App\Http\Controllers\Admin\PelangganController::class,
                'paket'         => App\Http\Controllers\Admin\PaketController::class,
                'transaksi'     => App\Http\Controllers\Admin\TransaksiController::class,
            ]);
        Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
});