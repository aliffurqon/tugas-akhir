@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
        <h2 class="mt-5 mb-5 text-center">Data Rekening Bank Auto Mitsuda</h2>
            
        <a class="btn btn-success mt-5" href="{{ route('admin.rekening.create') }}"> Tambah Rekening Bank +</a>
          
     
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
     
        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th>Nama Bank</th>
                <th>Atas Nama</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
            @foreach ($rekening as $rek)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $rek->nama_bank }}</td>
                <td>{{ $rek->nama_pemilik }}</td>
                <td class="text-center">
                    <form action="{{ route('admin.rekening.destroy',$rek->id) }}" method="POST">
     
                        <a class="btn btn-info btn-sm" href="{{ route('admin.rekening.show',$rek->id) }}">Detail</a>
     
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.rekening.edit',$rek->id) }}">Ubah</a>
     
                        @csrf
                        @method('DELETE')
     
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
     
        {!! $rekening->links() !!}
    </div>
@endsection