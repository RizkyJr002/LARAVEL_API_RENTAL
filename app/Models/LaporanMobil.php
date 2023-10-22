<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMobil extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_mobil', 'alasan', 'tgl_posting'];
    public $timestamps = false;
}
