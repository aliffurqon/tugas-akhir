@extends('siswa.index')

@section('konten')

<div class="section">
    <div class="row">
        <div class="col text-center">
            <h1>Detail Transaksi Yang Sudah Lunas</h1>
        </div>
    </div>

    <div class="row" style="margin-top:30px;">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <strong>Nim Siswa:</strong>
                {{ $siswa->id }}
            </div>
            <div class="form-group">
                <strong>Nama Siswa:</strong>
                {{ $siswa->name }}
            </div>
            <div class="form-group">
                <strong>Email Login:</strong>
                {{ $siswa->email }}
            </div>
            <div class="form-group">
                <strong>Nama Kursus:</strong>
                {{ $detail->nama }}
            </div>
            <div class="form-group">
                <strong>Harga Jurusan:</strong>
                {{ $detail->harga }}
            </div>
            <div class="form-group">
                <strong>Bank Tujuan Transfer:</strong>
                {{ $rek->nama_bank }}
            </div>
            <div class="form-group">
                <strong>Nomor Rekening Tujuan Transfer:</strong>
                {{ $rek->norek }}
            </div>
            <div class="form-group">
                <strong>Atas Nama Nomor Rekening Tujuan Transfer:</strong>
                {{ $rek->nama_pemilik }}
            </div>
            <div class="form-group">
                <strong>Atas Nama Nomor Rekening Tujuan Transfer:</strong>
                {{ $transaksi->status_pembayaran }}
            </div>
        </div>
    </div>
</div>
@endsection
