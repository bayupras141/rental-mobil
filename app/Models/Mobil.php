<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paket;
use App\Models\Transaksi;

class Mobil extends Model
{
    use HasFactory;
    
    // table tb_mobil
    protected $table = 'tb_mobil';

    // fillable
    protected $fillable = [
        'nama',
        'nopol',
        'warna',
        'status',
        'foto',
    ];

    // belongsTo transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

}
