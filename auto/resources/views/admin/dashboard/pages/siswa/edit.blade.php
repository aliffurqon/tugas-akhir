@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Ubah Status Pembayaran</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('admin.transaksi.index') }}"><< Kembali ke Table Data Siswa</a>
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
                <form action="{{ route('admin.transaksi.update',$transaksi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status Pembayaran :</strong>
                                <select name="status_pembayaran" class="form-control">
                                @if ( $transaksi->status_pembayaran == 'LUNAS' ){
                                    <option value="{{ $transaksi->status_pembayaran }}" selected>--- {{ $transaksi->status_pembayaran }} ---</option>
                                }@else{  
                                    <option value="BELUM LUNAS">BELUM LUNAS</option>
                                    <option value="LUNAS">LUNAS</option>  
                                }@endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Ubah Status Pembayaran</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
{{-- <div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Ubah Status Pembayaran</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('admin.transaksi.index') }}"> Back</a>
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
 
<form action="{{ route('admin.transaksi.update',$transaksi->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status Pembayaran :</strong>
                <select name="status_pembayaran" class="form-control">
                @if ( $transaksi->status_pembayaran == 'LUNAS' ){
                    <option value="{{ $transaksi->status_pembayaran }}" selected>--- {{ $transaksi->status_pembayaran }} ---</option>
                }@else{  
                    <option value="BELUM LUNAS">BELUM LUNAS</option>
                    <option value="LUNAS">LUNAS</option>  
                }@endif
                </select>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form> --}}
@endsection