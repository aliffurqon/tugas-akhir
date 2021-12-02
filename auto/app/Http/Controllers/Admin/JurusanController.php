<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data terakhir dan pagging maks 5 data
        $jurusan = Jurusan::latest()->paginate(10);

        // mengirimkan variabel $posts ke halaman views posts/index.blade.php
        // include dengan number index
        return view('admin.dashboard.pages.jurusan.index',compact('jurusan'))
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
        return view('admin.dashboard.pages.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'detail' => 'required',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('admin.jurusan.index')
        ->with('success','Jurusan Baru Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
        return view('admin.dashboard.pages.jurusan.show',compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        //
        return view('admin.dashboard.pages.jurusan.edit',compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        //
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'detail' => 'required',
        ]);
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $jurusan->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('admin.jurusan.index')
                        ->with('success','Data Jurusan Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        //
        $jurusan->delete();
  
        return redirect()->route('adminjurusan.index')
                        ->with('success','Data Jurusan Berhasil Dihapus');
    }
}
