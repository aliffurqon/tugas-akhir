@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Formulir Tambah Data Jurusan Auto Mitsuda</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('admin.jurusan.index') }}"><< Kembali ke Table Data Jurusan</a>
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
            <form action="{{ route('admin.jurusan.store') }}" method="POST">
                @csrf
             
                 <div class="row">
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Jurusan Baru :</strong>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Jurusan Baru">
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Detail Jurusan :</strong>
                            <textarea class="form-control" style="height:150px" name="detail" placeholder="Masukkan Detail Tentang Jurusan"></textarea>
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Harga Kursus :</strong>
                            <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Kursus Disini">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Tambah Jurusan</button>
                    </div>
                </div>
             
            </form>
        </div>
    </div>
</div>

{{-- <div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Formulir Tambah Data Jurusan Auto Mitsuda</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('admin.jurusan.index') }}"> Back</a>
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
 
<form action="{{ route('admin.jurusan.store') }}" method="POST">
    @csrf
 
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Jurusan Baru :</strong>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Jurusan Baru">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail Jurusan :</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Masukkan Detail Tentang Jurusan"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Kursus :</strong>
                <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Kursus Disini">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form> --}}
@endsection