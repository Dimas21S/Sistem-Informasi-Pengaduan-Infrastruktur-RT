<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Pengguna - SIPIR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --secondary: #059669;
        --accent: #f59e0b;
        --light: #f8fafc;
        --dark: #1e293b;
        --gray: #64748b;
        --light-gray: #e2e8f0;
      }
      
      body {
        overflow-x: hidden;
        background-color: var(--light);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      
      /* Sidebar Styles */
      #sidebar {
        min-height: 100vh;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        z-index: 100;
        background-color: white;
        width: 280px;
      }
      
      .sidebar-logo {
        padding: 1.5rem 1rem 1rem;
      }
      
      .sidebar-logo .logo {
        display: flex;
        align-items: center;
        gap: 10px;
      }
      
      .sidebar-logo i {
        font-size: 1.8rem;
        color: var(--primary);
      }
      
      .sidebar-logo .logo-text {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--primary);
      }
      
      .sidebar-logo .logo-subtitle {
        font-size: 0.75rem;
        color: var(--gray);
        margin-left: 2.8rem;
        margin-top: -0.5rem;
      }
      
      .nav-link {
        color: var(--gray);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
        font-weight: 500;
        margin-bottom: 0.25rem;
      }
      
      .nav-link:hover {
        color: var(--primary);
        background-color: rgba(37, 99, 235, 0.1);
      }
      
      .nav-link.active {
        color: var(--primary);
        background-color: rgba(37, 99, 235, 0.15);
        font-weight: 600;
      }
      
      .nav-link i {
        width: 20px;
        text-align: center;
        margin-right: 0.5rem;
      }
      
      .logout-btn {
        color: var(--gray);
        transition: all 0.3s;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        text-decoration: none;
        display: flex;
        align-items: center;
      }
      
      .logout-btn:hover {
        color: #dc2626;
        background-color: rgba(220, 38, 38, 0.1);
      }
      
      /* Content Styles */
      #content {
        padding: 2rem;
        width: calc(100% - 280px);
        background-color: var(--light);
      }
      
      .page-title {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 0.5rem;
      }
      
      .page-subtitle {
        color: var(--gray);
        margin-bottom: 2rem;
      }
      
      /* Profile Section */
      .profile-section {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--light-gray);
      }
      
      .profile-image-container {
        text-align: center;
        position: relative;
      }
      
      .profile-image {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid var(--light-gray);
        transition: all 0.3s;
      }
      
      .profile-image:hover {
        border-color: var(--primary);
      }
      
      .profile-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-left: 2rem;
      }
      
      .user-name {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 0.5rem;
      }
      
      .user-email {
        color: var(--gray);
        margin-bottom: 1rem;
      }
      
      .user-detail {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        color: var(--dark);
      }
      
      .user-detail i {
        color: var(--primary);
        width: 20px;
        margin-right: 0.75rem;
      }
      
      .profile-actions {
        margin-top: 1.5rem;
      }
      
      .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s;
      }
      
      .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
      }
      
      .btn-outline-secondary {
        border-color: var(--light-gray);
        color: var(--gray);
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s;
      }
      
      .btn-outline-secondary:hover {
        background-color: var(--light-gray);
        border-color: var(--gray);
        color: var(--dark);
      }
      
      /* Stats Section */
      .stats-section {
        margin-bottom: 2rem;
      }
      
      .stats-card {
        text-align: center;
        padding: 1.5rem;
        border-radius: 12px;
        background: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--light-gray);
        transition: all 0.3s;
        height: 100%;
      }
      
      .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      }
      
      .stats-number {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
      }
      
      .stats-label {
        color: var(--gray);
        font-size: 0.9rem;
        font-weight: 500;
      }
      
      .text-primary { color: var(--primary) !important; }
      .text-success { color: var(--secondary) !important; }
      .text-warning { color: var(--accent) !important; }
      .text-info { color: var(--primary) !important; }
      
      /* Reports Section */
      .reports-section {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--light-gray);
      }
      
      .section-title {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid var(--light-gray);
      }
      
      /* Report Card Styles */
      .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
        overflow: hidden;
        background-color: white;
      }
      
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      }
      
      .card-img-container {
        height: 200px;
        overflow: hidden;
        position: relative;
      }
      
      .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
      }
      
      .card:hover .card-img-top {
        transform: scale(1.05);
      }
      
      .card-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 2;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
      }
      
      .card-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        height: 100%;
      }
      
      .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.75rem;
        line-height: 1.4;
      }
      
      .card-text {
        color: var(--gray);
        font-size: 0.9rem;
        line-height: 1.5;
        flex-grow: 1;
        margin-bottom: 1rem;
      }
      
      .btn-outline-primary {
        color: var(--primary);
        border-color: var(--primary);
        border-radius: 20px;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
        transition: all 0.3s;
        align-self: flex-start;
      }
      
      .btn-outline-primary:hover {
        background-color: var(--primary);
        border-color: var(--primary);
        color: white;
      }
      
      /* Mobile Responsive */
      @media (max-width: 768px) {
        #sidebar {
          width: 100% !important;
          min-height: auto;
          position: fixed;
          transform: translateX(-100%);
          transition: transform 0.3s;
        }
        
        #sidebar.show {
          transform: translateX(0);
        }
        
        #content {
          width: 100%;
          padding: 1rem;
        }
        
        .profile-info {
          padding-left: 0;
          text-align: center;
          margin-top: 1.5rem;
        }
        
        .profile-actions .btn {
          width: 100%;
          margin-bottom: 0.5rem;
        }
        
        .user-detail {
          justify-content: center;
        }
        
        .mobile-menu-btn {
          display: block !important;
          position: fixed;
          bottom: 20px;
          right: 20px;
          z-index: 101;
          border-radius: 50%;
          width: 50px;
          height: 50px;
          background-color: var(--primary);
          color: white;
          border: none;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
      }
      
      @media (min-width: 769px) {
        .mobile-menu-btn {
          display: none !important;
        }
      }
    </style>
  </head>
  <body>
    <div class="d-flex">
      <!-- Sidebar -->
      <x-sidebar/>

      <!-- Konten Utama -->
      <div id="content" class="flex-grow-1">
        <h3 class="page-title">Profil Pengguna</h3>
        <p class="page-subtitle">Kelola informasi profil dan lihat statistik laporan Anda</p>
        
        <!-- Informasi Profil -->
        <div class="profile-section">
          <div class="row">
            <div class="col-md-4">
              <div class="profile-image-container">
                <img src="{{ $user->profile_photo ? Storage::url($user->profile_photo) : asset('Wa.jpg') }}" alt="Foto Profil" class="profile-image">
              </div>
            </div>
            <div class="col-md-8">
              <div class="profile-info">
                <h4 class="user-name">{{ $user->name }}</h4>
                <p class="user-email">{{ $user->email }}</p>
                
                <div class="user-detail">
                  <i class="fas fa-phone"></i>
                  <span>{{ $user->phone ?? 'Belum diatur' }}</span>
                </div>
                
                <div class="user-detail">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>{{ $user->address ?? 'Belum diatur' }}</span>
                </div>

                <div class="profile-actions">
                  <button class="btn btn-primary me-2 mb-2" onClick="window.location='{{ route('form-edit-profil') }}'">
                    <i class="fas fa-edit me-2"></i> Edit Profil
                  </button>
                  <button class="btn btn-outline-secondary mb-2">
                    <i class="fas fa-key me-2"></i> Ubah Password
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Statistik -->
        <div class="stats-section">
          <div class="row">
            <div class="col-md-3 mb-3">
              <div class="stats-card">
                <div class="stats-number text-primary">{{ $count }}</div>
                <div class="stats-label">Total Laporan</div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="stats-card">
                <div class="stats-number text-success">{{ $completed }}</div>
                <div class="stats-label">Laporan Selesai</div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="stats-card">
                <div class="stats-number text-warning">{{ $progress }}</div>
                <div class="stats-label">Dalam Proses</div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="stats-card">
                <div class="stats-number text-info">{{ $pending }}</div>
                <div class="stats-label">Menunggu</div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Laporan Saya -->
        <div class="reports-section">
          <h4 class="section-title">Laporan Saya</h4>

          <div class="row">
            @foreach ($user->reports as $report)
              <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <div class="card h-100">
                  <!-- Gambar laporan -->
                  <div class="card-img-container">
                    <img src="{{ asset('image/Wa.jpg') }}" 
                        class="card-img-top" 
                        alt="Foto Laporan">
                    
                    <!-- Badge status di pojok atas gambar -->
                    <div class="card-badge 
                      @if ($report->status === 'completed') bg-success
                      @elseif ($report->status === 'progress') bg-warning text-dark
                      @elseif ($report->status === 'pending') bg-danger
                      @else bg-secondary @endif">
                      @if ($report->status === 'completed') Selesai
                      @elseif ($report->status === 'progress') Diproses
                      @elseif ($report->status === 'pending') Menunggu
                      @else Belum Diketahui @endif
                    </div>
                  </div>

                  <!-- Isi kartu -->
                  <div class="card-body">
                    <h5 class="card-title">{{ $report->judul_laporan }}</h5>
                    <p class="card-text">{{ Str::limit($report->isi_laporan ?? 'Tidak ada deskripsi', 90) }}</p>
                    
                    <div class="mt-auto">
                      <a href="{{ url('/detail-laporan/' . $report->id_laporan) }}" class="btn btn-outline-primary">
                        <i class="fas fa-eye me-1"></i> Lihat Detail
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Modal Logout -->
    <x-modal-logout/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script>
      // Toggle sidebar for mobile
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
  </body>
</html>