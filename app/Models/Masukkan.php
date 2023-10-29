<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masukkan extends Model
{
    use HasFactory;
    protected $fillable = ['id','username','email','masukan'];
    public $timestamps = false;
}
