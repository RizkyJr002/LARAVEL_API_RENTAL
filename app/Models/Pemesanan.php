<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = ['id','kode_booking','lama_sewa','id_user','id_mobil','tgl_booking','tgl_selesai','asal','tujuan','total_sewa'];
}
