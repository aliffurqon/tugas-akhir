<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Rekening;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PilihJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $jurusan = $id;
        $rekening = Rekening::all();
        return view('siswa.pages.jurusan.create',compact('jurusan','rekening'));
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
            'rekening_id' => 'required',
        ]);
        $jurusan = Jurusan::find($id);
        $transaksi = new Transaksi();
        $transaksi->jurusan_id = $id;
        $transaksi->siswa_id = Auth::user()->id;
        $transaksi->rekening_id = $request->rekening_id;
        $transaksi->total = $jurusan->harga;
        $transaksi->status_pembayaran = "Belum Lunas";
        $transaksi->save();
        return redirect()->route('user.home');
        

        // $data = $request->all();
        // $transaksi = new Transaksi();
        // $transaksi->jurusan_id = $data->id;
        // $transaksi->rekening_id = $data['rekening_id'];
        // $transaksi->total = $jurusan->harga;
        // $transaksi->status_pembayaran = $data['status_pembayaran'];

        dd($transaksi);
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
