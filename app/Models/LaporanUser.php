<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanUser extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_user', 'alasan', 'tgl_posting'];
    public $timestamps = false;
}
