@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Detail Data Karyawan Auto Mitsuda </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('admin.karyawan.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NIK:</strong>
                        {{ $karyawan->id }}
                    </div>
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {{ $karyawan->nama }}
                    </div>
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        {{ $karyawan->alamat }}
                    </div>
                    <div class="form-group">
                        <strong>Tanggal Lahir:</strong>
                        {{ $karyawan->tgl_lahir->format('d-M-Y') }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $karyawan->email }}
                    </div>
                    <div class="form-group">
                        <strong>No. Handphone:</strong>
                        {{ $karyawan->hp }}
                    </div>
                    <div class="form-group">
                        <strong>Dibuat Tanggal:</strong>
                        {{ $karyawan->created_at->format('d-M-Y H:m:s') }}
                    </div>
                    <div class="form-group">
                        <strong>Terakhir Di Update:</strong>
                        {{ $karyawan->updated_at->format('d-M-Y H:m:s') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection