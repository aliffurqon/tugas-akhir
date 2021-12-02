@extends('admin.dashboard.index')
 
@section('content')
    <div class="container-fluid">
        <h2 class="mt-5 mb-5 text-center">Data Siswa Auto Mitsuda</h2>
            
        <a class="btn btn-success mt-5 mb-3" href="{{ route('admin.transaksi.create') }}"> Tambah Siswa Baru +</a>
        
    
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    
        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th>Nama Siswa</th>
                <th>Email Siswa</th>
                <th>Jurusan Siswa</th>
                <th>Status Pembayaran Siswa</th>
                <th>Via Bank</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
            @foreach ($transaksi as $tra)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $tra->user_transaksi->name }}</td>
                <td>{{ $tra->user_transaksi->email }}</td>
                <td>{{ $tra->jurusan_transaksi->nama }}</td>
                <td>{{ $tra->status_pembayaran }}</td>
                <td>{{ $tra->rekening_transaksi->nama_bank }}</td>
                <td class="text-center">
                    <form action="{{ route('admin.transaksi.destroy',$tra->id) }}" method="POST">
    
                        <a class="btn btn-info btn-sm mt-2" href="{{ route('admin.transaksi.show',$tra->id) }}">Detail</a>
    
                        <a class="btn btn-primary btn-sm mt-2" href="{{ route('admin.transaksi.edit',$tra->id) }}">Ubah Status</a>
    
                        @csrf
                        @method('DELETE')
    
                        <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    
        {!! $transaksi->links() !!}
    </div>
@endsection