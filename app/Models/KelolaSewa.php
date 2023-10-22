<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaSewa extends Model
{
    use HasFactory;
    protected $fillable = ['id_sewa','id_pengembalian','id_booking','kode_booking','id_user','id_mobil','tgl_booking','tgl_mulai','tgl_selesai','lama_sewa','metode_pembayaran','total_sewa','bukti_bayar'];
    public $timestamps = false;
}
