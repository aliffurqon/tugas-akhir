@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
        <h2 class="mt-5 mb-5 text-center">Data Jurusan Auto Mitsuda</h2>
            
        <a class="btn btn-success mt-5" href="{{ route('admin.jurusan.create') }}"> Tambah Jurusan +</a>
          
     
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
     
        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th>Nama Jurusan</th>
                <th>Harga Kursus</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
            @foreach ($jurusan as $jur)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $jur->nama }}</td>
                <td>{{ $jur->harga }}</td>
                <td class="text-center">
                    <form action="{{ route('admin.jurusan.destroy',$jur->id) }}" method="POST">
     
                        <a class="btn btn-info btn-sm" href="{{ route('admin.jurusan.show',$jur->id) }}">Detail</a>
     
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.jurusan.edit',$jur->id) }}">Ubah</a>
     
                        @csrf
                        @method('DELETE')
     
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
     
        {!! $jurusan->links() !!}
    </div>
@endsection