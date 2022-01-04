<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Paket;
class Transaksi extends Model
{
    use HasFactory;
    //tb_transaksi
    protected $table = 'tb_transaksi';
        // fillable
    protected $fillable = [
        'invoice',
        'tgl_sewa',
        'tgl_kembali',
        'total_bayar',
        'status',
        'pelanggan_id',
        'mobil_id',
        'paket_id',
        'potongan_harga',
    ];

    //relasi pelaggan
    
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

}
