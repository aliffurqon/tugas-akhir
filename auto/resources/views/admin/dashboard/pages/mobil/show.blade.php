@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Detail Data Mobil Auto Mitsuda </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('admin.mobil.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Mobil:</strong>
                        {{ $mobil->nama }}
                    </div>
                    <div class="form-group">
                        <strong>Plat Mobil:</strong>
                        {{ $mobil->plat }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection