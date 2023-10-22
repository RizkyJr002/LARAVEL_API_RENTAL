<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_booking','id_user','id_mobil','tgl_mulai','tgl_selesai','lama_sewa','status','tgl_telat','durasi_telat','denda'];
    public $timestamps = false;
}
