@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>STEP 3 | Konfirmasi Pendaftaran </h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('admin.transaksi.index') }}"><< Kembali ke Langkah 2</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-xs-6 col-sm-12 col-md-12">
                        <h2>Detail Akun </h2>
                        <div class="form-group">
                            <strong>Nama Siswa:</strong>
                            {{ $transaksi->user_transaksi->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email Login:</strong>
                            {{ $transaksi->user_transaksi->email }}
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h2>Detail Kursus</h2>
                        <div class="form-group">
                            <strong>Nama Kursus:</strong>
                            {{ $transaksi->jurusan_transaksi->nama }}
                        </div>
                        <div class="form-group">
                            <strong>Harga Jurusan:</strong>
                            {{ $transaksi->jurusan_transaksi->harga }}
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h2>Informasi Pembayaran</h2>
                        <div class="form-group">
                            <strong>Jumlah yang harus dibayarkan:</strong>
                            {{ $transaksi->jurusan_transaksi->harga }}
                        </div>
                        <div class="form-group">
                            <strong>Bank Tujuan Transfer:</strong>
                            {{ $transaksi->rekening_transaksi->nama_bank }}
                        </div>
                        <div class="form-group">
                            <strong>Nomor Rekening Tujuan Transfer:</strong>
                            {{ $transaksi->rekening_transaksi->norek }}
                        </div>
                        <div class="form-group">
                            <strong>Atas Nama Nomor Rekening Tujuan Transfer:</strong>
                            {{ $transaksi->rekening_transaksi->nama_pemilik }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection