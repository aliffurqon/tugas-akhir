@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-lg-12 margin-tb">
                    <div class="float-left">
                        <h2>STEP 1 | Daftar Akun</h2>
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
                <div class="col-lg-6">
                    <form action="{{ route('admin.ceksatu') }}" method="POST">
                        @csrf
                    
                        <div class="row">
                    
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Lengkap:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Lengkap">
                                </div>
                            </div>
                    
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>email</strong>
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan email">
                                </div>
                            </div>
                    
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password</strong>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                                </div>
                            </div>
                    
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password</strong>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan password">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Langkah Selanjutnya</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection