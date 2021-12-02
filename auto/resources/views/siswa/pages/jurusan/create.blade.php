@extends('siswa.index')
@section('konten')

<div class="section">
    <div class="container">
        <div class="row">
            <h2 class="mt-5 mb-5 text-center">Pilih Rekening Tujuan</h2>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row">
            <form class="col-md-6 col-md-offset-3" method="POST" action="{{ route('user.pilihjurusan.update',$jurusan) }}">
                @csrf
                @method('PUT')
                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <label for="mulai">Pilih Rekening:</label>
                        <select name="rekening_id" class="form-control">
                            <option value="">---Pilih Bank Tujuan Transfer----</option>
                            @foreach ($rekening as $rek)
                            <option value="{{ $rek->id }}">{{ $rek->nama_bank }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Proses</button>
            </form>
        </div>
    </div>
</div>
@stop