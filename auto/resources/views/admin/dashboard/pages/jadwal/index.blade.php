@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
        <h2 class="mt-5 mb-5 text-center">Jadwal Kursus Mengemudi Auto Mitsuda</h2>
            
        <a class="btn btn-success mt-5" href="{{ route('admin.jadwal.create') }}"> Tambah Jadwal Baru +</a>
        
    
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row">
            @foreach ($jadwal as $jad)

                @if($jad->status == 'Tersedia')
                    <div class="col-3 mt-2 mb-3">
                        <div class="card border-primary text-center">
                            <div class="card-header text-primary">{{ $jad->status }}</div>
                            <div class="card-body">
                                <h4 class="card-title text-primary">{{ $jad->mulai->format('D') }}</h4>
                                <h3 class="card-title text-primary">{{ $jad->mulai->format('d-M-Y') }}</h3>
                                <p class="card-text">Jam Mulai</p>
                                <h1 class="card-title text-primary">{{ $jad->mulai->format('H:i') }}</h1>
                                <p class="card-text">Jam Selesai</p>
                                <h1 class="card-title text-primary">{{ $jad->selesai->format('H:i') }}</h1>
                                <p class="card-text">{{ $jad->mobil_jadwal->nama }}</p>
                                <p class="card-text">{{ $jad->karyawan_jadwal->nama }}</p>

                                <form action="{{ route('admin.jadwal.destroy',$jad->id) }}" method="POST">
    
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.jadwal.show',$jad->id) }}">Detail</a>
    
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.jadwal.edit',$jad->id) }}">Ubah</a>
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                <div class="col-3 mt-2 mb-3">
                        <div class="card border-primary text-center">
                            <div class="card-header text-danger">{{ $jad->status }}</div>
                            <div class="card-body">
                                <h4 class="card-title text-danger">{{ $jad->mulai->format('D') }}</h4>
                                <h3 class="card-title text-danger">{{ $jad->mulai->format('d-M-Y') }}</h3>
                                <p class="card-text">Jam Mulai</p>
                                <h1 class="card-title text-danger">{{ $jad->mulai->format('H:i') }}</h1>
                                <p class="card-text">Jam Selesai</p>
                                <h1 class="card-title text-danger">{{ $jad->selesai->format('H:i') }}</h1>
                                <p class="card-text">{{ $jad->mobil_jadwal->nama }}</p>
                                <p class="card-text">{{ $jad->karyawan_jadwal->nama }}</p>

                                <form action="{{ route('admin.jadwal.destroy',$jad->id) }}" method="POST">
    
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.jadwal.show',$jad->id) }}">Detail</a>
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

  {!! $jadwal->links() !!}
    </div>
@endsection