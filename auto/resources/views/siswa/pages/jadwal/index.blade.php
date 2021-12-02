@extends('siswa.index')
@section('konten')

<div class="section">
    <div class="container">
        <div class="row">
            <h2 class="mt-5 mb-5 text-center">Cari Jadwal Kursus Mengemudi Auto Mitsuda</h2>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row">
            <form class="col-md-6 col-md-offset-3" method="POST" action="{{ route('user.jadwaluser.store') }}">
                @csrf
                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <label for="mulai">Tanggal Awal:</label>
                        <input type="datetime-local" class="form-control" name="mulai">
                    </div>
                </div>
                
                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <label for="selesai">Tanggal Akhir:</label>
                        <input type="datetime-local" class="form-control" name="selesai">
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Cari Jadwal</button>
            </form>
        </div>
    </div>
</div>
@stop