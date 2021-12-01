<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MobilImage;

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
        'status'
    ];

    // relasi one to many MobilImage
    public function mobilImage()
    {
        return $this->hasMany(MobilImage::class);
    }

}
