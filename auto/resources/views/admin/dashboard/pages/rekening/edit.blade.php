@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Rekening Bank</h2>
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
        <div class="col-lg-6">
            <form action="{{ route('admin.rekening.update',$rekening->id) }}" method="POST">
                @csrf
                @method('PUT')
         
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nomor Rekening Bank :</strong>
                            <input type="text" name="norek" value="{{ $rekening->norek }}" class="form-control" placeholder="Masukkan Nomor Rekening Bank">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Rekening Bank :</strong>
                            <input type="text" name="nama_bank" value="{{ $rekening->nama_bank }}" class="form-control" placeholder="Masukkan Nama Rekening Bank">
                        </div>
                    </div>
        
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Pemilik Rekening :</strong>
                            <input type="text" name="nama_pemilik" value="{{ $rekening->nama_pemilik }}" class="form-control" placeholder="Masukkan Nama Pemilik Rekening">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Ubah Data Karyawan</button>
                    </div>
                </div>
         
            </form>
        </div>
    </div>
</div>
@endsection