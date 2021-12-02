@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Detail Data Jurusan Auto Mitsuda </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('admin.jurusan.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-xs-6 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Jurusan:</strong>
                        {{ $jurusan->nama }}
                    </div>
                    <div class="form-group">
                        <strong>Detail Jurusan:</strong>
                        {{ $jurusan->detail }}
                    </div>
                    <div class="form-group">
                        <strong>Harga Kursus:</strong>
                        {{ $jurusan->harga }}
                    </div>
                    <div class="form-group">
                        <strong>Dibuat Tanggal:</strong>
                        {{ $jurusan->created_at }}
                    </div>
                    <div class="form-group">
                        <strong>Terakhir Di Update:</strong>
                        {{ $jurusan->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection