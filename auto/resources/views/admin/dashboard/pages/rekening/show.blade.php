@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Detail Rekening </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('admin.rekening.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nomor Rekening:</strong>
                        {{ $rekening->norek }}
                    </div>
                    <div class="form-group">
                        <strong>Nama Bank:</strong>
                        {{ $rekening->nama_bank }}
                    </div>
                    <div class="form-group">
                        <strong>Atas Nama:</strong>
                        {{ $rekening->nama_pemilik }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection