<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\Admin\RekeningController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\User\JadwalUserController;
use App\Http\Controllers\User\PilihJurusanController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','pengunjung.pages.login')->name('login');
          Route::view('/register','pengunjung.pages.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','verified','PreventBackHistory'])->group(function(){
          Route::get('/home',[UserController::class,'index'])->name('home');
          Route::resource('pilihjurusan', PilihJurusanController::class);
          //bagian jadwal
          Route::resource('jadwaluser', JadwalUserController::class);
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
          Route::get('/add-new',[UserController::class,'add'])->name('add');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','admin.login.pages.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/home', [DashboardController::class,'index'])->name('home');
        Route::resource('karyawan', KaryawanController::class);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('rekening', RekeningController::class);
        //bagian Transaksi dan Daftar Siswa
        //validasi step 1
        Route::post('/siswa/ceksatu',[TransaksiController::class,'ceksatu'])->name('ceksatu');
        //view dan validasi step 2
        Route::get('/siswa/stepdua',[TransaksiController::class,'createdua'])->name('createdua');
        Route::post('/siswa/cekdua',[TransaksiController::class,'cekdua'])->name('cekdua');
        //view konfirmasi
        Route::get('/siswa/konfirmasi',[TransaksiController::class,'konfirmasi'])->name('konfirmasi');
        //view index, step 1, show data siswa, edit status pembayaran. validasi create siswa dan transaksi, validasi edit, validasi hapus data siswa dan transaksi.
        Route::resource('transaksi', TransaksiController::class);
        //end Transaksi dan Daftar Siswa
        //bagian mobil
        Route::resource('mobil', MobilController::class);
        //bagian jadwal
        Route::resource('jadwal', JadwalController::class);
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Auth::routes(['verify' => true]);