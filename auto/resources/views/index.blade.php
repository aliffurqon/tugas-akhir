@auth
    @include('siswa.pages.kursus.index')
@else
    @include('pengunjung.pages.index')
@endauth