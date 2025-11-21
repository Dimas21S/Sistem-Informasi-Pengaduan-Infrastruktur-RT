@php
  use App\Enums\UserRole;
  $role = auth()->user()->role ?? null;
@endphp

<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-0">
        <div class="sidebar-logo">
          <div class="logo">
            <i class="fas fa-tools"></i>
            <span class="logo-text">SI NGADU</span>
          </div>
          <div class="logo-subtitle">Sistem Informasi Pengaduan Infrastruktur RT</div>
        </div>
        
        <hr class="my-2 mx-3">
        
        @switch($role)
          @case(UserRole::Petugas)
            <ul class="nav nav-pills flex-column mb-auto px-3">
              <li class="nav-item">
                <a href="{{ route('petugas.dashboard') }}" class="nav-link {{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}">
                  <i class="fas fa-home"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('daftar-laporan') }}" class="nav-link {{ request()->routeIs('daftar-laporan') ? 'active' : '' }}">
                  <i class="fas fa-list"></i>
                  <span>Daftar Laporan</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('get-verifikasi') }}" class="nav-link {{ request()->routeIs('get-verifikasi') ? 'active' : '' }}">
                  <i class="fas fa-clipboard-check"></i>
                  <span>Verifikasi Laporan</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profil') }}" class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}">
                  <i class="fas fa-user"></i>
                  <span>Profil</span>
                </a>
              </li>
            </ul>
            @break
            @case(UserRole::Admin)
            <ul class="nav nav-pills flex-column mb-auto px-3">
              <li class="nav-item">
                <a href="{{ route('warga.dashboard') }}" class="nav-link {{ request()->routeIs('warga.dashboard') ? 'active' : '' }}">
                  <i class="fas fa-home"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('daftar-laporan') }}" class="nav-link {{ request()->routeIs('daftar-laporan') ? 'active' : '' }}">
                  <i class="fas fa-list"></i>
                  <span>Daftar Laporan</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('get-role') }}" class="nav-link {{ request()->routeIs('get-role') ? 'active' : '' }}">
                  <i class="fas fa-clipboard-check"></i>
                  <span>Kelola Warga</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profil') }}" class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}">
                  <i class="fas fa-user"></i>
                  <span>Profil</span>
                </a>
              </li>
            </ul>
            @break
        
          @default
            <ul class="nav nav-pills flex-column mb-auto px-3">
              <li class="nav-item">
                <a href="{{ route('warga.dashboard') }}" class="nav-link {{ request()->routeIs('warga.dashboard') ? 'active' : '' }}">
                  <i class="fas fa-home"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('daftar-laporan') }}" class="nav-link {{ request()->routeIs('daftar-laporan') ? 'active' : '' }}">
                  <i class="fas fa-list"></i>
                  <span>Daftar Laporan</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profil') }}" class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}">
                  <i class="fas fa-user"></i>
                  <span>Profil</span>
                </a>
              </li>
            </ul>
            
        @endswitch
        
        <hr class="my-2 mx-3">
        
        <div class="mt-auto p-3">
          <a href="#" class="logout-btn" data-bs-toggle="modal" data-bs-target="#modalLogout">
            <i class="fas fa-sign-out-alt me-2"></i>
            <span>Log Out</span>
          </a>
        </div>
      </div>

<script>
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
  }
  
  // Close sidebar when clicking on a link in mobile view
  document.querySelectorAll('#sidebar .nav-link').forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth < 768) {
        document.getElementById('sidebar').classList.remove('show');
      }
    });
  });
</script>