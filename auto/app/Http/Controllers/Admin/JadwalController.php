<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Karyawan;
use App\Models\Mobil;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jadwal = Jadwal::latest()->paginate(10);
        // mengirimkan variabel $posts ke halaman views posts/index.blade.php
        // include dengan number index
        return view('admin.dashboard.pages.jadwal.index',compact('jadwal'))->with('i', (request()->input('page',1) -1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        $mobil = Mobil::all();
        return view('admin.dashboard.pages.jadwal.create',compact('karyawan','mobil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'mobil_id' => 'required',
            'karyawan_id' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        $mulai = Jadwal::whereBetween('selesai', [$request->mulai, $request->selesai])->get();

        if ($mulai->isEmpty()) {
            Jadwal::create($request->all());
            return redirect()->route('admin.jadwal.index')
            ->with('success','Karyawan Sudah Ada Jadwal');
        }else{
            foreach ($mulai as $m){
                if($m->mobil_id == $request->mobil_id){
                    return redirect()->route('admin.jadwal.create')
                        ->with('duplikat','Jadwal Sudah Ada');
                }else{
                    if($m->karyawan_id == $request->karyawan_id){
                        return redirect()->route('admin.jadwal.create')
                        ->with('duplikat','Karyawan Sudah Ada Jadwal');
                    }else{
                        Jadwal::create($request->all());
                        return redirect()->route('admin.jadwal.index')
                        ->with('success','Karyawan Sudah Ada Jadwal');
                    }
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('admin.dashboard.pages.jadwal.edit',compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        if($jadwal->siswa_id == null){
            $jadwal->delete();
            return redirect()->route('admin.transaksi.index')
            ->with('success','Data Transaksi Berhasil Dihapus');
        }else{
            return redirect()->route('admin.transaksi.index')
            ->with('success','Data Jadwal Tidak Bisa Dihapus Karena Ada Siswa');
        }
    }
}
