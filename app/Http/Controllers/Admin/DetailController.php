<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;  
use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Paket;
use DataTables;
use PDF;
class DetailController extends Controller
{
    public function index()
    {
        $mobil = Mobil::all();
        $invoice = Date('Ymdhis');
        $pelanggan = Pelanggan::all();
        $paket = Paket::all();
        $transaksi = Transaksi::with('mobil', 'pelanggan', 'paket')->get();
    
        return view('admin.transaksi.detail', compact('mobil' ,'pelanggan', 'invoice', 'paket', 'transaksi'));
    }

    public function bayar($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status = 'Lunas';
        $transaksi->save();
        return redirect()->route('transaksi.detail')->with('success', 'Pembayaran success');
    }

    // create function print pdf transaksi user
    public function print($id)
    {
        $trans = Transaksi::find($id);
        // cari harga paket dari paket_id
        $paket = Paket::where('id', $trans->paket_id)->first();
        $harga = $paket->harga;

        // cari jumlah hari
        $tgl_sewa = $trans->tgl_sewa;
        $tgl_kembali = $trans->tgl_kembali;
        $tgl_sewa = strtotime($tgl_sewa);
        $tgl_kembali = strtotime($tgl_kembali);
        $diff = abs($tgl_sewa - $tgl_kembali);
        $jumlah_hari = floor($diff / (60*60*24));
        

        // cari harga asli
        $harga_asli = $jumlah_hari * $harga;

        $transaksi = Transaksi::with('mobil', 'pelanggan', 'paket')->find($id);
        
        return $pdf = PDF::loadView('admin.transaksi.print', compact('transaksi', 'harga_asli'))->stream();
    }

    // create function view pengembalian
    public function pengembalian()
    {
        $transaksi = Transaksi::with('mobil', 'pelanggan', 'paket')->get();
        return view('admin.transaksi.pengembalian', compact('transaksi'));
    }

    // create function kembali
    public function kembali($id)
    {
        $transaksi = Transaksi::find($id);
        // find mobil
        $mobil = Mobil::find($transaksi->mobil_id);
        $mobil->status = 'Tersedia';
        $mobil->save();
        return redirect()->route('transaksi.pengembalian')->with('success', 'Pengembalian success');
    }

    // create function print mobil tersedia
    public function printMobil()
    {
        $mobil = Mobil::where('status', 'Tersedia')->get();
        return $pdf = PDF::loadView('admin.laporan.mobil', compact('mobil'))->stream();
    }

    // create function print pelanggan
    public function printPelanggan()
    {
        $pelanggan = Pelanggan::all();
        return $pdf = PDF::loadView('admin.laporan.pelanggan', compact('pelanggan'))->stream();
    }

    // create function print transaksi
    public function printTransaksi()
    {
        $pendapatan = Transaksi::where('status','Lunas')->sum('total_bayar');
        $transaksi = Transaksi::with('mobil', 'pelanggan', 'paket')->where('status', 'lunas')->get();
        return $pdf = PDF::loadView('admin.laporan.transaksi', compact('transaksi', 'pendapatan'))->stream();
    }
}
