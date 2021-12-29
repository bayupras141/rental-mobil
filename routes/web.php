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
});

Route::get('/', [App\Http\Controllers\Pelanggan\IndexController::class, 'index']);
<<<<<<< HEAD

Route::get('/login', function () {
    // return view('auth.login');
})->name('login');
=======
Route::get('/detail/{id}', [App\Http\Controllers\Pelanggan\IndexController::class, 'detail'])->name('detail');
>>>>>>> e09251769d19aeee3d4109cc72c96b4ba99f4016
