<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mobil = Mobil::latest()->paginate(10);

        // mengirimkan variabel $posts ke halaman views posts/index.blade.php
        // include dengan number index
        return view('admin.dashboard.pages.mobil.index',compact('mobil'))
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
        return view('admin.dashboard.pages.mobil.create');
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
            'nama' => 'required',
            'plat' => 'required',
        ]);

        Mobil::create($request->all());

        return redirect()->route('admin.mobil.index')
        ->with('success','Mobil Baru Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        //
        return view('admin.dashboard.pages.mobil.show',compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobil $mobil)
    {
        //
        return view('admin.dashboard.pages.mobil.edit',compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobil $mobil)
    {
        //
        $request->validate([
            'nama' => 'required',
            'plat' => 'required',
        ]);
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $mobil->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('admin.mobil.index')
                        ->with('success','Data Mobil Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobil $mobil)
    {
        //
        $mobil->delete();
  
        return redirect()->route('admin.mobil.index')
                        ->with('success','Data mobil Berhasil Dihapus');
    }
}
