@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Formulir Tambah Data Karyawan Auto Mitsuda</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('admin.karyawan.index') }}"><< Kembali ke Table Karyawan</a>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center mt-2">
        <div class="col-lg-6">
            <form action="{{ route('admin.karyawan.store') }}" method="POST">
                @csrf
             
                 <div class="row">
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Lengkap :</strong>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap Karyawan">
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Alamat Lengkap :</strong>
                            <textarea class="form-control" style="height:150px" name="alamat" placeholder="Masukkan Alamat Lengkap Karyawan"></textarea>
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tanggal Lahir :</strong>
                            <input class="form-control" type="date" name="tgl_lahir">
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email :</strong>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email Karyawan">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>No. Hp :</strong>
                            <input type="tel" name="hp" class="form-control" placeholder="Masukkan Nomor Handphone Karyawan">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Tambah Karyawan</button>
                    </div>
                </div>
             
            </form>
        </div>
    </div>
</div>
@endsection