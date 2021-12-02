@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>STEP 2 | Pilih Jurusan & Tujuan Transfer</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('admin.transaksi.create') }}"><< Kembli ke Langkah 1</a>
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
                <form action="{{ route('admin.cekdua') }}" method="POST">
                    @csrf
                  
                    <div class="row">
                        <input name="siswa_id" type="hidden" value="">
                        <input name="total" type="hidden" value="">
                        <input name="status_pembayaran" type="hidden" value="Belum Lunas">
                  
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jurusan Siswa :</strong>
                                <select name="jurusan_id" class="form-control">
                                    <option value="">---Pilih Jurusan----</option>
                                    @foreach ($jurusan as $jur)
                                    <option value="{{ $jur->id }}">{{ $jur->nama }} | Rp. {{ $jur->harga }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                  
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Bank Tujuan :</strong>
                                <select name="rekening_id" class="form-control">
                                    <option value="">---Pilih Bank Tujuan Transfer----</option>
                                    @foreach ($rekening as $rek)
                                    <option value="{{ $rek->id }}">{{ $rek->nama_bank }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Langkah Selanjutnya >></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection