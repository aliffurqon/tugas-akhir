<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $dates = ['tgl','mulai','selesai'];
    protected $fillable = [
        'mobil_id', 'karyawan_id','mulai','siswa_id','selesai','status'
    ];

    public function karyawan_jadwal(){
        return $this->belongsTo(Karyawan::class, 'karyawan_id','id');
    }

    public function mobil_jadwal(){
        return $this->belongsTo(Mobil::class, 'mobil_id','id');
    }

    public function user_jadwal(){
        return $this->belongsTo(User::class, 'siswa_id','id');
    }
}
