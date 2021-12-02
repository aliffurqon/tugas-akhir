<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Rekening;
use App\Models\Transaksi;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index(){
        $nim = Auth::user()->id;
        $transaksi = Transaksi::find($nim);
        if(empty($transaksi)){
            $jurusan = Jurusan::all();
            return view('siswa.pages.kursus.index', compact('jurusan'));
        }else{
            if($transaksi->status_pembayaran == "Belum Lunas"){
                $siswa = User::find($nim);
                $detail =  Jurusan::find($transaksi->jurusan_id);
                $rek = Rekening::find($transaksi->rekening_id);
                return view('siswa.pages.pembayaran.index', compact('detail', 'siswa','rek','transaksi'));
            }else{
                $siswa = User::find($nim);
                $detail =  Jurusan::find($transaksi->jurusan_id);
                $rek = Rekening::find($transaksi->rekening_id);
                return view('siswa.pages.pembayaran.lunas', compact('detail', 'siswa','rek','transaksi'));
            }
        }
    }

    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required',
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:5|max:30',
              'password_confirmation'=>'required|min:5|max:30|same:password'
          ]);

          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $save = $user->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
