<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('siswa.pages.jadwal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $siswa = Auth::user()->id;
        $transaksi = Transaksi::where('siswa_id', $siswa)->get();
        $jadwal = Jadwal::latest()->paginate(10);
        // mengirimkan variabel $posts ke halaman views posts/index.blade.php
        // include dengan number index
        return view('siswa.pages.jadwal.show',compact('jadwal','transaksi','siswa'))->with('i', (request()->input('page',1) -1) * 10);
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
            'mulai' => 'required',
            'selesai' => 'required',
        ]);
        
        $siswa = Auth::user()->id;
        $transaksi = Transaksi::where('siswa_id', $siswa)->get();
        $jadwal = Jadwal::whereBetween('selesai', [$request->mulai, $request->selesai])->get();
        // mengirimkan variabel $posts ke halaman views posts/index.blade.php
        // include dengan number index
        return view('siswa.pages.jadwal.show',compact('jadwal','transaksi','siswa'));
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
    public function edit($id)
    {
        //
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
        $request->validate([
            'siswa_id' => 'required',
        ]);
        $data = Jadwal::where('siswa_id', $request->siswa_id)->whereBetween('selesai', [$request->mulai, $request->selesai])->get();

        if($data->isEmpty()){
            $jadwal = Jadwal::find($id);
            $jadwal->siswa_id = $request->siswa_id;
            $jadwal->status = $request->status;
            $jadwal->update();
            return redirect()->route('user.jadwaluser.index')->with('success','Jadwal Berhasil di Booking');
        }else{
            return redirect()->route('user.jadwaluser.index')->with('success','Siswa Sudah Ada Jadwal di Jam yang sama');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
