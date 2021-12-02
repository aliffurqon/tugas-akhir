@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
        <h2 class="mt-5 mb-5 text-center">Data Mobil Auto Mitsuda</h2>
            
        <a class="btn btn-success mt-5" href="{{ route('admin.mobil.create') }}"> Tambah Data Mobil +</a>
          
     
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
     
        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th>Nama Mobil</th>
                <th>Plat Nomor Mobil</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
            @foreach ($mobil as $mob)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $mob->nama }}</td>
                <td>{{ $mob->plat }}</td>
                <td class="text-center">
                    <form action="{{ route('admin.mobil.destroy',$mob->id) }}" method="POST">
     
                        <a class="btn btn-info btn-sm" href="{{ route('admin.mobil.show',$mob->id) }}">Detail</a>
     
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.mobil.edit',$mob->id) }}">Ubah</a>
     
                        @csrf
                        @method('DELETE')
     
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
     
        {!! $mobil->links() !!}
    </div> 
@endsection