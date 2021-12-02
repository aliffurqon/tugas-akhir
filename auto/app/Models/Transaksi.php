<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','jurusan_id','rekening_id','total','status_pembayaran'
    ];

    public function jurusan_transaksi(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id','id');
    }

    public function rekening_transaksi(){
        return $this->belongsTo(Rekening::class, 'rekening_id','id');
    }

    public function user_transaksi(){
        return $this->belongsTo(User::class, 'siswa_id','id');
    }
}
