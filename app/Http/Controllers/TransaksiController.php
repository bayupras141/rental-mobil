<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use App\Models\Mobil;
use DataTables;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data =DB::table('tb_transaksi')
        ->join('tb_pelanggan','tb_pelanggan.id', '=', 'tb_transaksi.pelanggan_id')
        ->join('tb_mobil', 'tb_mobil.id', '=', 'tb_transaksi.mobil_id')
        ->select('tb_transaksi.id','tb_transaksi.invoice','tb_transaksi.tgl_sewa',
        'tb_transaksi.tgl_kembali','tb_transaksi.status','tb_pelanggan.nama as nama_pelanggan', 'tb_mobil.nama')
        ->get();
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('transaksi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = DB::table('tb_mobil')->get();
        $id_pelanggan = DB::table('tb_pelanggan')->get();
        return view('transaksi.create',compact('id','id_pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
