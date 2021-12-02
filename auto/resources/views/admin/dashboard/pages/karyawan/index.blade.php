@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
        <h2 class="mt-5 mb-5 text-center">Data Karyawan Auto Mitsuda</h2>
            
        <a class="btn btn-success mt-5" href="{{ route('admin.karyawan.create') }}"> Tambah Data Karyawan +</a>
          
     
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
     
        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>No. Hp</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
            @foreach ($karyawan as $kar)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $kar->nama }}</td>
                <td>{{ $kar->id }}</td>
                <td>{{ $kar->hp }}</td>
                <td class="text-center">
                    <form action="{{ route('admin.karyawan.destroy',$kar->id) }}" method="POST">
     
                        <a class="btn btn-info btn-sm" href="{{ route('admin.karyawan.show',$kar->id) }}">Detail</a>
     
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.karyawan.edit',$kar->id) }}">Ubah</a>
     
                        @csrf
                        @method('DELETE')
     
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
     
        {!! $karyawan->links() !!}
    </div>
@endsection