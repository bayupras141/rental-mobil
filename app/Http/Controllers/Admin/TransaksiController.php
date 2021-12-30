<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Paket;
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
        $mobil = Mobil::all();
        $invoice = Date('Ymdhis');
        $pelanggan = Pelanggan::all();
        $paket = Paket::all();
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
        return view('admin.transaksi.index', compact('mobil' ,'pelanggan', 'invoice', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice' => 'required',
            'tgl_sewa' => 'required',
            'tgl_kembali' => 'required',
            'mobil_id' => 'required',
            'pelanggan_id' => 'required',
            'paket_id' => 'required',
        ]);

        // find harga paket_id
        $paket = Paket::find($request->paket_id);
        $harga = $paket->harga;
        
        // menjumlah hari tgl_sewa + tgl_kembali
        $tgl_sewa = $request->tgl_sewa;
        $tgl_kembali = $request->tgl_kembali;
        $tgl_sewa = strtotime($tgl_sewa);
        $tgl_kembali = strtotime($tgl_kembali);
        $diff = abs($tgl_sewa - $tgl_kembali);
        $jumlah_hari = floor($diff / (60*60*24));
        
        $total_bayar = $harga * $jumlah_hari;

        // find mobil_id
        $mobil = Mobil::find($request->mobil_id);
        $status = $mobil->status;
        $mobil->status = 'Sedang Disewa';
        $mobil->save();
        
        Transaksi::create(
            [
                'invoice' => $request->invoice,
                'tgl_sewa' => $request->tgl_sewa,
                'tgl_kembali' => $request->tgl_kembali,
                'total_bayar' => $total_bayar,
                'mobil_id' => $request->mobil_id,
                'pelanggan_id' => $request->pelanggan_id,
                'paket_id' => $request->paket_id,
            ]
        );
        return response()->json([
            'status' => 'sukses',
            'message'=>'Transaksi berhasil ditambahkan'
        ],200);
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

    public function bayar($id)
    {
        //
    }

}
