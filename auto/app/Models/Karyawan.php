<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $dates = ['tgl_lahir'];
    protected $fillable = [
        'nama','alamat','tgl_lahir','email','hp'
    ];
}
