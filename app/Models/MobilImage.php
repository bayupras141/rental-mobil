<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobil;

class MobilImage extends Model
{
    use HasFactory;
    // table tb_mobil_image
    protected $table = 'tb_mobil_image';

    // fillable
    protected $fillable = [
        'mobil_id',
        'image'
    ];

    // relasi one to many
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
