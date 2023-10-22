<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['id','kode_booking','id_user','id_mobil','tgl_booking','metode_pembayaran','total_sewa','bukti_bayar','status'];
    public $timestamps = false;
}

