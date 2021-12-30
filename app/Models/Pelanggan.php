<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'tb_pelanggan';

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'no_hp',
        'jenis_kelamin',
    ];
    protected $hidden = [
        'password',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
