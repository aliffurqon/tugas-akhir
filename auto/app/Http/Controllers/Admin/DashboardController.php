<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Jurusan;
use App\Models\Karyawan;
use App\Models\Mobil;
use App\Models\Rekening;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $karyawan = Karyawan::count();
        $jurusan = Jurusan::count();
        $rekening = Rekening::count();
        $sum = Transaksi::where([['rekening_id',1],['status_pembayaran','Lunas']])->sum('total');
        $total = Transaksi::sum('total');
        $user = User::count();
        $mobil = Mobil::count();
        $transaksi = Transaksi::count();
        $lunas = Transaksi::where('status_pembayaran', 'Lunas')->count();
        $pending = Transaksi::where('status_pembayaran', 'Belum Lunas')->count();
        $kosong = Jadwal::where('status','Tersedia')->count();
        $isi = Jadwal::where('status', 'Penuh')->count();
        $jadwal = Jadwal::count();
        return view('admin.dashboard.pages.dashboard', 
        compact('karyawan', 'jurusan', 'rekening', 'user', 'mobil', 'lunas', 'pending', 'kosong', 'isi', 'jadwal','transaksi', 'sum', 'total'));
    }
}
