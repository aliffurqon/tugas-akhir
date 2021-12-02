@extends('siswa.index')

@section('konten')

<div class="section">
    <div class="row">
        <div class="col text-center">
            <h1>Detail Pembayaran Yang Belum Lunas</h1>
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

            <a class="btn btn-primary" href="https://api.whatsapp.com/send?phone=6285881828877&text=Ketika%20upload%20gambar%20sertakan%20kode%20berikut%20%3A%0A%0A1.%20NIS%0A%0AContoh%20%3A%20%0A%0A1.%2012173362%0A%0ATerima%20kasih%20atas%20kepercayaan%20anda%20telah%20memilih%20auto%20mitsuda.%20Proses%20konfirmasi%20membutuhkan%20waktu%20paling%20lambat%202%20jam%20di%20hari%20yang%20sama.%0A%0AApabila%20ada%20pertanyaan%20lebih%20lanjut%2C%20bisa%20ditanyakan%20lewat%20chat%20ini." role="button">Klik Disini Untuk Kirim Bukti Pembayaran</a>
        </div>
    </div>
</div>
@endsection
