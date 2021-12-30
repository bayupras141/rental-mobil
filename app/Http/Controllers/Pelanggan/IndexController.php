<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Paket;
use App\Models\Transaksi;
use DataTables;
class IndexController extends Controller
{
    // create a function index 
    public function index()
    {
        $data = Mobil::all();
        return view('user.index', compact('data'));
    }

    public function detail($id)
    {   
        $mobil = Mobil::find($id);
        $dt = Transaksi::where('mobil_id', $id)->first();
        // dd($dt->tgl_kembali);
        return view('user.detail', compact('dt', 'mobil'));
    }

    // create a function paket
    public function paket(Request $request)
    {
        $data = Paket::all();
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('user.paket' , compact('data'));
    }

}
