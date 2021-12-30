<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Transaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaksi = Transaksi::all()->count();
        $transaksi_aktif = Transaksi::where('status', 'Belum Bayar')->count();
        $mobil = Mobil::where('status','tersedia')->get()->count();
        $customer = Pelanggan::all()->count();
        $pendapatan = Transaksi::where('status','Lunas')->sum('total_bayar');

        return view('admin.home', compact('mobil', 'customer', 'transaksi', 'transaksi_aktif', 'pendapatan'));
    }
}
