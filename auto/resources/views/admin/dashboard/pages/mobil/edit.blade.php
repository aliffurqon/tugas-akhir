@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Data Mobil Auto Mitsuda</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('admin.mobil.index') }}"><< Kembali ke Table Data Mobil</a>
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
            <form action="{{ route('admin.mobil.update',$mobil->id) }}" method="POST">
                @csrf
                @method('PUT')
         
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Mobil :</strong>
                            <input type="text" name="nama" value="{{ $mobil->nama }}" class="form-control" placeholder="Masukkan Nama Mobil">
                        </div>
                    </div>
        
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Plat Mobil :</strong>
                            <input type="text" name="plat" value="{{ $mobil->plat }}" class="form-control" placeholder="Masukkan Plat Mobil">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Ubah Data Mobil</button>
                    </div>
                </div>
         
            </form>
        </div>
    </div>
</div>
@endsection