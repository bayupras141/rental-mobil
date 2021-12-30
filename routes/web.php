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

Route::get('admin/', function () {
    return view('auth.login');
})->name('admin');

Route::prefix('admin')
->middleware('auth')
->group(function(){
    Route::resources([
        'mobil'         => App\Http\Controllers\Admin\MobilController::class,
        'pelanggan'     => App\Http\Controllers\Admin\PelangganController::class,
        'paket'         => App\Http\Controllers\Admin\PaketController::class,
        'transaksi'     => App\Http\Controllers\Admin\TransaksiController::class,
    ]);
    Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('detail-transaksi', [App\Http\Controllers\Admin\DetailController::class, 'index'])->name('transaksi.detail');
    Route::get('transaksi-bayar/{id}', [App\Http\Controllers\Admin\DetailController::class, 'bayar'])->name('transaksi.bayar');
    Route::get('transaksi-print/{id}', [App\Http\Controllers\Admin\DetailController::class, 'print'])->name('transaksi.print');
    Route::get('transaksi-pengembalian', [App\Http\Controllers\Admin\DetailController::class, 'pengembalian'])->name('transaksi.pengembalian');
    Route::get('transaksi-kembali/{id}', [App\Http\Controllers\Admin\DetailController::class, 'kembali'])->name('transaksi.kembali');
});

Route::get('/', [App\Http\Controllers\Pelanggan\IndexController::class, 'index']);

Route::get('/detail/{id}', [App\Http\Controllers\Pelanggan\IndexController::class, 'detail'])->name('detail');