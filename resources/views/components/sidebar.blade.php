@php
  use App\Enums\UserRole;
  $role = auth()->user()->role ?? null;
@endphp

<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>Kang Ngadu</strong>
    </a>
    <ul class="dropdown-menu text-small shadow">
      <li><a class="dropdown-item" href="#">Proyek Baru</a></li>
      <li><a class="dropdown-item" href="#">Pengaturan</a></li>
      <li><a class="dropdown-item" href="#">Profil</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Keluar</a></li>
    </ul>
  </div>
  <hr> 
  <ul class="nav nav-pills flex-column mb-auto">
    @switch( $role)
      @case(UserRole::Admin)
        <li class="nav-item">
          <x-navlink href="{{ route('warga.dashboard') }}" :active="request()->routeIs('warga.dashboard')" icon="bi bi-house-door-fill">Beranda</x-navlink>
        </li>
        <li>
          <x-navlink href="{{ route('daftar-laporan') }}" :active="request()->routeIs('daftar-laporan')" icon="bi bi-card-list">Daftar Laporan</x-navlink>
        </li>
        <li>
          <x-navlink href="{{ route('get-role') }}" :active="request()->routeIs('get-role')" icon="bi bi-card-list">Data Warga</x-navlink>
        </li>
        <li>
          <x-navlink href="{{ route('profil') }}" :active="request()->routeIs('profil')" icon="bi bi-person-fill">Profil</x-navlink>
        </li>
        @break
      @case(UserRole::Petugas)
        <li class="nav-item">
          <x-navlink href="{{ route('petugas.dashboard') }}" :active="request()->routeIs('petugas.dashboard')" icon="bi bi-house-door-fill">Dashboard</x-navlink>
        </li>
        <li>
          <x-navlink href="{{ route('daftar-laporan') }}" :active="request()->routeIs('daftar-laporan')" icon="bi bi-card-list">Daftar Laporan</x-navlink>
        </li>
        <li>
          <x-navlink href="{{ route('get-verifikasi') }}" :active="request()->routeIs('get-verifikasi')" icon="bi bi-card-list">Verifikasi Laporan</x-navlink>
        </li>
        <li>
          <x-navlink href="{{ route('profil') }}" :active="request()->routeIs('profil')" icon="bi bi-person-fill">Profil</x-navlink>
        </li>
        @break
    
      @default
        <li class="nav-item">
          <x-navlink href="{{ route('warga.dashboard') }}" :active="request()->routeIs('warga.dashboard')" icon="bi bi-house-door-fill">Beranda</x-navlink>
        </li>
        <li>
          <x-navlink href="{{ route('daftar-laporan') }}" :active="request()->routeIs('daftar-laporan')" icon="bi bi-card-list">Daftar Laporan</x-navlink>
        </li>
        <li>
          <x-navlink href="{{ route('profil') }}" :active="request()->routeIs('profil')" icon="bi bi-person-fill">Profil</x-navlink>
        </li>
        
    @endswitch
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalLogout">
      <i class="bi bi-box-arrow-left me-2"></i>
      Log Out
    </a>
  </div>
</div>