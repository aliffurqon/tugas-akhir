<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Rekening;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::latest()->paginate(10);
        // mengirimkan variabel $posts ke halaman views posts/index.blade.php
        // include dengan number index
        return view('admin.dashboard.pages.siswa.index',compact('transaksi'))->with('i', (request()->input('page',1) -1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        //
        $siswa = $request->session()->get('siswa');
        return view('admin.dashboard.pages.siswa.create',compact('siswa'));
    }

    public function ceksatu(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'password_confirmation'=>'required|min:5|max:30|same:password'
        ]);

        if(empty($request->session()->get('siswa'))){
            $siswa = new User();
            $siswa->fill($validatedData);
            $request->session()->put('siswa', $siswa);
        }else{
            $siswa = $request->session()->get('siswa');
            $siswa->fill($validatedData);
            $request->session()->put('siswa', $siswa);
        }
  
        return redirect()->route('admin.createdua');
    }

    public function createdua(Request $request)
    {
        //
        $siswa = $request->session()->get('siswa');
        $jurusan = Jurusan::all();
        $rekening = Rekening::all();
        return view('admin.dashboard.pages.siswa.dua',compact('siswa','jurusan', 'rekening'));
    }

    public function cekdua(Request $request)
    {
        $request->validate([
            'jurusan_id' => 'required',
            'rekening_id' => 'required',
        ]);
        $data = $request->all();
        $jurusan = Jurusan::find($data['jurusan_id']);
        
        if(empty($request->session()->get('transaksi'))){
            $transaksi = new Transaksi();
            $transaksi->jurusan_id = $jurusan->id;
            $transaksi->rekening_id = $data['rekening_id'];
            $transaksi->total = $jurusan->harga;
            $transaksi->status_pembayaran = $data['status_pembayaran'];
            $request->session()->put('transaksi', $transaksi);
        }else{
            $transaksi = $request->session()->get('transaksi');
            $transaksi->jurusan_id = $jurusan->id;
            $transaksi->rekening_id = $data['rekening_id'];
            $transaksi->total = $jurusan->harga;
            $transaksi->status_pembayaran = $data['status_pembayaran'];
            $request->session()->put('transaksi', $transaksi);
        }

        return redirect()->route('admin.konfirmasi');
    }

    public function konfirmasi(Request $request)
    {
        //
        $siswa = $request->session()->get('siswa');
        $data = $request->session()->get('transaksi');
        $jurusan = Jurusan::find($data->jurusan_id);
        $rekening = Rekening::find($data->rekening_id);
        return view('admin.dashboard.pages.siswa.konfirmasi',compact('siswa','jurusan','rekening'));
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
        $siswa = $request->session()->get('siswa');
        $siswa->password = Hash::make($siswa->password);
        $siswa->save();
        $request->session()->forget('siswa');

        $transaksi = $request->session()->get('transaksi');
        $transaksi->siswa_id = $siswa->id;
        $transaksi->save();
        $request->session()->forget('transaksi');
        return redirect()->route('admin.transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
        return view('admin.dashboard.pages.siswa.show',compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('admin.dashboard.pages.siswa.edit',compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $request->validate([
            'status_pembayaran' => 'required',
        ]);
        $transaksi->update($request->all());
        /// setelah berhasil mengubah data
        return redirect()->route('admin.transaksi.index')
                        ->with('success','Data Transaksi Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        if($transaksi->status_pembayaran == 'Belum Lunas'){
            $data = $transaksi->user_transaksi->id;
            $siswa = User::find($data);
            $siswa->delete();
            $transaksi->delete();
            return redirect()->route('admin.transaksi.index')
            ->with('success','Data Transaksi Berhasil Dihapus');
        }else{
            return redirect()->route('admin.transaksi.index')
            ->with('success','Data Transaksi Tidak Bisa Dihapus Karena Sudah Lunas');
        }        
    }
}
