<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Laporan - SIPIR</title>
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
      
      .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--light-gray);
      }
      
      .page-title {
        color: var(--dark);
        font-weight: 600;
        margin: 0;
      }
      
      .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
      }
      
      .user-name {
        color: var(--dark);
        font-weight: 500;
      }
      
      .user-role {
        color: var(--gray);
        font-size: 0.875rem;
      }
      
      /* Card Styles */
      .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
        background-color: white;
      }
      
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      }
      
      /* Status Card Styles */
      .status-card {
        position: relative;
        width: 18rem; 
        height: 8rem; 
        overflow: hidden;
      }
      
      .status-card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        padding: 1.25rem;
      }
      
      .status-icon {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 1.8rem;
        opacity: 0.8;
      }
      
      .status-title {
        margin-bottom: 0.5rem;
        font-size: 1rem;
        font-weight: 500;
        color: var(--gray);
      }
      
      .status-value {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 0;
        color: var(--dark);
      }
      
      .status-description {
        font-size: 0.875rem;
        color: var(--gray);
        margin: 0;
      }
      
      /* Warna khusus untuk setiap status */
      .success-card {
        border-left: 4px solid var(--secondary);
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
      }
      
      .success-icon {
        color: var(--secondary);
      }
      
      .process-card {
        border-left: 4px solid var(--accent);
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
      }
      
      .process-icon {
        color: var(--accent);
      }
      
      .pending-card {
        border-left: 4px solid #ef4444;
        background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
      }
      
      .pending-icon {
        color: #ef4444;
      }
      
      /* Alert Styles */
      .alert {
        border-radius: 10px;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }
      
      .alert-info {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-left: 4px solid var(--primary);
        color: var(--dark);
      }
      
      .alert-warning {
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
        border-left: 4px solid var(--accent);
        color: var(--dark);
      }
      
      /* Info Card Styles */
      .info-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--light-gray);
      }
      
      .info-card-img {
        height: 200px;
        object-fit: cover;
      }
      
      .info-card-body {
        padding: 1.5rem;
      }
      
      .info-card-title {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 0.75rem;
      }
      
      .info-card-text {
        color: var(--gray);
        margin-bottom: 1rem;
      }
      
      .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        border-radius: 8px;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
        transition: all 0.3s;
      }
      
      .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
      }
      
      /* Section Titles */
      .section-title {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid var(--light-gray);
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
        
        .dashboard-header {
          flex-direction: column;
          align-items: flex-start;
          gap: 1rem;
        }
        
        .user-info {
          width: 100%;
          justify-content: space-between;
        }
        
        .card-container {
          flex-direction: column;
          align-items: center;
        }
        
        .status-card {
          width: 100%;
          max-width: 18rem;
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
        <div class="dashboard-header">
          <h2 class="page-title">Dashboard Laporan</h2>
          <div class="user-info">
            <div class="text-end">
              <div class="user-name">{{ auth()->user()->name ?? 'Nama Pengguna' }}</div>
            </div>
          </div>
        </div>
        
        <!-- Card Status Laporan -->
        <div class="card-container d-flex flex-wrap justify-content-center mb-5">
          <!-- Card laporan sukses -->
          <div class="card status-card success-card me-3">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Selesai</h5>
              <i class="fas fa-check-circle status-icon success-icon"></i>
              <p class="card-text status-value">{{ $completed ?? 0 }}</p>
              <p class="status-description">Laporan berhasil diproses</p>
            </div>
          </div>

          <!-- Card laporan proses -->
          <div class="card status-card process-card me-3">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Proses</h5>
              <i class="fas fa-cog status-icon process-icon"></i>
              <p class="card-text status-value">{{ $progress ?? 0 }}</p>
              <p class="status-description">Laporan sedang diproses</p>
            </div>
          </div>

          <!-- Card laporan pending -->
          <div class="card status-card pending-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Menunggu</h5>
              <i class="fas fa-clock status-icon pending-icon"></i>
              <p class="card-text status-value">{{ $pending ?? 0 }}</p>
              <p class="status-description">Laporan menunggu tindakan</p>
            </div>
          </div>
        </div>
        
        <!-- Informasi Penting -->
        @if (isset($firstReport) && $firstReport)
          <div class="alert alert-info mb-4">
            <strong>Informasi Penting:</strong> Laporan terbaru Anda adalah "<em>{{ $firstReport->title }}</em>".
          </div>

          <h4 class="section-title">Informasi Penting</h4>
          <div class="d-flex justify-content-center">
            <div class="card info-card" style="width: 38rem;">
              <img src="{{ asset('image/Wa.jpg') }}" class="info-card-img" alt="Informasi Penting">
              <div class="info-card-body">
                <h5 class="info-card-title">Tips Membuat Laporan yang Efektif</h5>
                <p class="info-card-text">
                  Untuk memastikan laporan Anda ditangani dengan cepat, pastikan untuk melampirkan foto yang jelas 
                  dan memberikan deskripsi yang detail tentang lokasi dan kondisi masalah.
                </p>
                <a href="{{ route('form-laporan') }}" class="btn btn-primary">
                  <i class="fas fa-plus me-2"></i> Buat Laporan Baru
                </a>
              </div>
            </div>
          </div>
        @else
          <div class="alert alert-warning mb-4">
            <strong>Perhatian:</strong> Anda belum memiliki laporan. Silakan buat laporan baru untuk melihat informasi penting di sini.
          </div>

          <h4 class="section-title">Mulai Laporkan Masalah</h4>
          <div class="d-flex justify-content-center">
            <div class="card info-card" style="width: 38rem;">
              <img src="{{ asset('image/Wa.jpg') }}" class="info-card-img" alt="Mulai Laporkan">
              <div class="info-card-body">
                <h5 class="info-card-title">Laporkan Masalah Infrastruktur di Lingkungan Anda</h5>
                <p class="info-card-text">
                  Bantu perbaiki lingkungan RT dengan melaporkan masalah infrastruktur yang Anda temukan. 
                  Laporan Anda akan membantu petugas menangani masalah dengan lebih cepat dan efisien.
                </p>
                <a href="{{ route('form-laporan') }}" class="btn btn-primary">
                  <i class="fas fa-plus me-2"></i> Buat Laporan Pertama
                </a>
              </div>
            </div>
          </div>
        @endif
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