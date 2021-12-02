<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-3">
      AMTC - ADMIN
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.transaksi.index') }}">
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>Siswa</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.jadwal.index') }}">
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>Jadwal Belajar</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.jurusan.index') }}">
      <i class="fas fa-fw fa-images"></i>
      <span>Jurusan</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.karyawan.index') }}">
      <i class="fas fa-fw fa-hotel"></i>
      <span>Karyawan</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.rekening.index') }}">
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>Rekening</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.mobil.index') }}">
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>Mobil</span></a>
  </li>

  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
