@extends('siswa.index')
@section('konten')

<div class="section">
    <div class="container">
        <div class="row">
            <h2 class="mt-5 mb-5 text-center">Jadwal Kursus Mengemudi Auto Mitsuda</h2>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row jadwal">
            @if ($transaksi->isEmpty())
                <div class="col">
                    <h4 class="text-center">Silahkan Pilih Jurusan Terlebih Dahulu</h4>
                </div>
            @else
                @foreach ($transaksi as $tra)
                    @if ($tra->status_pembayaran == 'LUNAS')
                        @foreach ($jadwal as $jad)
                            @if($jad->status == 'Tersedia')
                            <div class="col-md-4 col-sm-6 col-xs-6 mb-3" style="margin-bottom: 3rem">
                                <div class="card text-center" style="background-color: #fff; background-clip: border-box; border: 1px solid #4e73df; border-radius: 0.35rem;">
                                    <div class="card-header text-primary">{{ $jad->status }}</div>
                                    <div class="card-body">
                                        <h4 class="card-title text-primary">{{ $jad->mulai->format('D') }}</h4>
                                        <h3 class="card-title text-primary">{{ $jad->mulai->format('d-M-Y') }}</h3>
                                        <p class="card-text">Jam Mulai</p>
                                        <h1 class="card-title text-primary">{{ $jad->mulai->format('H:i') }}</h1>
                                        <p class="card-text">Jam Selesai</p>
                                        <h1 class="card-title text-primary">{{ $jad->selesai->format('H:i') }}</h1>
                                        <p class="card-text mobil">{{ $jad->mobil_jadwal->nama }}</p>
                                        <p class="card-text">{{ $jad->karyawan_jadwal->nama }}</p>

                                        <form action="{{ route('user.jadwaluser.update',$jad->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                                <input name="siswa_id" type="hidden" value="{{ $siswa }}">
                                                <input name="mulai" type="hidden" value="{{$jad->mulai}}">
                                                <input name="selesai" type="hidden" value="{{$jad->selesai}}">
                                                <input name="status" type="hidden" value="Sudah Di Booking">
                
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin booking jadwal ini?')">Booking Jadwal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
            
                            @else
            
                            <div class="col-md-4 col-sm-6 col-xs-6 mb-3" style="margin-bottom: 3rem">
                                <div class="card text-center" style="background-color: #fff; background-clip: border-box; border: 1px solid #e74a3b; border-radius: 0.35rem;">
                                    <div class="card-header text-danger">{{ $jad->status }}</div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger">{{ $jad->mulai->format('D') }}</h4>
                                        <h3 class="card-title text-danger">{{ $jad->mulai->format('d-M-Y') }}</h3>
                                        <p class="card-text">Jam Mulai</p>
                                        <h1 class="card-title text-danger">{{ $jad->mulai->format('H:i') }}</h1>
                                        <p class="card-text">Jam Selesai</p>
                                        <h1 class="card-title text-danger">{{ $jad->selesai->format('H:i') }}</h1>
                                        <p class="card-text mobil">{{ $jad->mobil_jadwal->nama }}</p>
                                        <p class="card-text">{{ $jad->karyawan_jadwal->nama }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @else
            
                            <h4 class="text-center">Selesaikan Pembayaran Untuk Booking Jadwal</h4>
                            @foreach ($jadwal as $jad)
                                @if($jad->status == 'Tersedia')
                                    <div class="col-md-4 col-sm-6 col-xs-6 mb-3" style="margin-bottom: 3rem">
                                        <div class="card text-center" style="background-color: #fff; background-clip: border-box; border: 1px solid #4e73df; border-radius: 0.35rem;">
                                            <div class="card-header text-primary">{{ $jad->status }}</div>
                                            <div class="card-body">
                                                <h4 class="card-title text-primary">{{ $jad->mulai->format('D') }}</h4>
                                                <h3 class="card-title text-primary">{{ $jad->mulai->format('d-M-Y') }}</h3>
                                                <p class="card-text">Jam Mulai</p>
                                                <h1 class="card-title text-primary">{{ $jad->mulai->format('H:i') }}</h1>
                                                <p class="card-text">Jam Selesai</p>
                                                <h1 class="card-title text-primary">{{ $jad->selesai->format('H:i') }}</h1>
                                                <p class="card-text mobil">{{ $jad->mobil_jadwal->nama }}</p>
                                                <p class="card-text">{{ $jad->karyawan_jadwal->nama }}</p>
                                            </div>
                                        </div>
                                    </div>
                
                                @else
            
                                <div class="col-md-4 col-sm-6 col-xs-6 mb-3" style="margin-bottom: 3rem">
                                    <div class="card text-center" style="background-color: #fff; background-clip: border-box; border: 1px solid #e74a3b; border-radius: 0.35rem;">
                                        <div class="card-header text-danger">{{ $jad->status }}</div>
                                        <div class="card-body">
                                            <h4 class="card-title text-danger">{{ $jad->mulai->format('D') }}</h4>
                                            <h3 class="card-title text-danger">{{ $jad->mulai->format('d-M-Y') }}</h3>
                                            <p class="card-text">Jam Mulai</p>
                                            <h1 class="card-title text-danger">{{ $jad->mulai->format('H:i') }}</h1>
                                            <p class="card-text">Jam Selesai</p>
                                            <h1 class="card-title text-danger">{{ $jad->selesai->format('H:i') }}</h1>
                                            <p class="card-text mobil">{{ $jad->mobil_jadwal->nama }}</p>
                                            <p class="card-text">{{ $jad->karyawan_jadwal->nama }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
@stop