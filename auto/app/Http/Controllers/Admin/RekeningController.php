<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data terakhir dan pagging maks 5 data
        $rekening = Rekening::latest()->paginate(10);

        // mengirimkan variabel $posts ke halaman views posts/index.blade.php
        // include dengan number index
        return view('admin.dashboard.pages.rekening.index',compact('rekening'))
        ->with('i', (request()->input('page',1) -1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.dashboard.pages.rekening.create');
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
            'norek' => 'required',
            'nama_bank' => 'required',
            'nama_pemilik' => 'required'
        ]);

        Rekening::create($request->all());

        return redirect()->route('admin.rekening.index')
        ->with('success','Rekening Baru Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rekening $rekening)
    {
        //
        return view('admin.dashboard.pages.rekening.show',compact('rekening'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekening $rekening)
    {
        //
        return view('admin.dashboard.pages.rekening.edit',compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekening $rekening)
    {
        //
        $request->validate([
            'norek' => 'required',
            'nama_bank' => 'required',
            'nama_pemilik' => 'required'
        ]);
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $rekening->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('admin.rekening.index')
                        ->with('success','Data Rekening Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening $rekening)
    {
        //
        $rekening->delete();
  
        return redirect()->route('admin.rekening.index')
                        ->with('success','Data Rekening Berhasil Dihapus');
    }
}
