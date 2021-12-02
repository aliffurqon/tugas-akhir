@extends('admin.dashboard.index')
 
@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Formulir Jadwal Baru</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('admin.jadwal.index') }}"><< Kembali ke Table Jadwal</a>
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

    @if ($message = Session::get('duplikat'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row justify-content-center mt-2">
        <div class="col-lg-4">
            <form action="{{ route('admin.jadwal.store') }}" method="POST">
                @csrf
            
                 <div class="row">
                    <input name="status" type="hidden" value="Tersedia">
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Karyawan :</strong>
                            <select name="karyawan_id" class="form-control">
                                <option value="">---Pilih Karyawan----</option>
                                @foreach ($karyawan as $kar)
                                <option value="{{ $kar->id }}">{{ $kar->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mobil :</strong>
                            <select name="mobil_id" class="form-control">
                                <option value="">---Pilih Mobil----</option>
                                @foreach ($mobil as $mob)
                                <option value="{{ $mob->id }}">{{ $mob->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Pilih Jam Mulai Belajar :</strong>
                            <input type="datetime-local" class="form-control" name="mulai">
                        </div>
                    </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Pilih Jam Selesai Belajar :</strong>
                            <input type="datetime-local" class="form-control" name="selesai">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Buat Jadwal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection