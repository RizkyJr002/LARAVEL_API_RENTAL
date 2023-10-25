<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'id_merk', 'id_kategori', 'gambar', 'nama_mobil', 'harga_sewa', 'plat_nomor', 'status', 'deskripsi', 'transmisi', 'bahan_bakar'
    ];
}
