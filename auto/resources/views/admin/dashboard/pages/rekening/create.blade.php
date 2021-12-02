@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Formulir Tambah Rekening Bank</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('admin.rekening.index') }}"><< Kembali ke Table Data Rekening</a>
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
        <div class="col-lg-4">
            <form action="{{ route('admin.rekening.store') }}" method="POST">
                @csrf
             
                 <div class="row">
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nomor Rekening Baru :</strong>
                            <input type="text" name="norek" class="form-control" placeholder="Masukkan Nomor Rekening Baru">
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Rekening Bank Baru :</strong>
                            <input type="text" name="nama_bank" class="form-control" placeholder="Masukkan Nama Rekening Bank Baru">
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Atas Nama Bank Baru :</strong>
                            <input type="text" name="nama_pemilik" class="form-control" placeholder="Masukkan Atas Nama Bank Baru">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Tambah Rekening</button>
                    </div>
                </div>
             
            </form>
        </div>
    </div>
</div>
@endsection