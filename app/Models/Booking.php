<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['id','kode_booking','gambar','id_user','id_mobil','tgl_booking','tgl_selesai','asal','tujuan','metode_pembayaran','total_sewa','bukti_bayar'];
}

