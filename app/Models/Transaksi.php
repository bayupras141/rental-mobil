<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobil;
use App\Models\Pelanggan;
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
    ];

    //relasi pelaggan
    
    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }

}
