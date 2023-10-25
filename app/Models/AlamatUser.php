<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatUser extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_user','kota','provinsi','kode_pos'];
    public $timestamps = false;
}
