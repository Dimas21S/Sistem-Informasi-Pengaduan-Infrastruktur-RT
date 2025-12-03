<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Laporan - SIPIR</title>
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
      
      .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--light-gray);
      }
      
      .page-title {
        color: var(--dark);
        font-weight: 600;
        margin: 0;
      }
      
      .page-subtitle {
        color: var(--gray);
        margin-top: 0.5rem;
      }
      
      /* Filter Section */
      .filter-section {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--light-gray);
      }
      
      .form-label {
        font-weight: 500;
        color: var(--dark);
        margin-bottom: 0.5rem;
      }
      
      .form-control, .form-select {
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
      }
      
      .form-control:focus, .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
      }
      
      /* Card Styles */
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
      
      .card-footer {
        background: transparent;
        border-top: 1px solid var(--light-gray);
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      
      .btn-outline-primary {
        color: var(--primary);
        border-color: var(--primary);
        border-radius: 20px;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
        transition: all 0.3s;
      }
      
      .btn-outline-primary:hover {
        background-color: var(--primary);
        border-color: var(--primary);
        color: white;
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
      
      /* Pagination */
      .pagination {
        margin-top: 2rem;
      }
      
      .page-link {
        color: var(--primary);
        border: 1px solid var(--light-gray);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        margin: 0 0.25rem;
      }
      
      .page-link:hover {
        color: var(--primary-dark);
        background-color: rgba(37, 99, 235, 0.1);
        border-color: var(--primary);
      }
      
      .page-item.active .page-link {
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
        
        .page-header {
          flex-direction: column;
          align-items: flex-start;
        }
        
        .header-actions {
          margin-top: 1rem;
          width: 100%;
        }
        
        .btn-primary {
          width: 100%;
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
        <!-- Header Halaman -->
        <div class="page-header">
          <div>
            <h1 class="page-title">Daftar Laporan</h1>
            <p class="page-subtitle">Kelola dan pantau semua laporan Anda di satu tempat</p>
          </div>
          <div class="header-actions">
            <button class="btn btn-primary" onClick="location.href='{{ route('form-laporan') }}'">
              <i class="fas fa-plus-circle me-2"></i> Buat Laporan Baru
            </button>
          </div>
        </div>
        
        <!-- Filter dan Pencarian -->
        <form method="GET" action="{{ route('search-laporan') }}">
          <div class="filter-section">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="searchInput" class="form-label">Cari Laporan</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="searchInput" placeholder="Masukkan kata kunci..." name="search" value="{{ request('search') }}">
                  <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="statusFilter" class="form-label">Status</label>
                <select class="form-select" id="statusFilter" name="status" onchange="this.form.submit()">
                  <option value="" {{ request('status')=='' ? 'selected' : '' }}>Semua Status</option>
                  <option value="completed" {{ request('status')=='completed' ? 'selected' : '' }}>Selesai</option>
                  <option value="progress" {{ request('status')=='progress' ? 'selected' : '' }}>Dalam Proses</option>
                  <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Menunggu</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="sortBy" class="form-label">Urutkan</label>
                <select class="form-select" id="sortBy"  name="sort" onchange="this.form.submit()">
                  <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>Terbaru</option>
                  <option value="oldest" {{ request('sort')=='oldest' ? 'selected' : '' }}>Terlama</option>
                  <option value="title" {{ request('sort')=='title' ? 'selected' : '' }}>Judul A-Z</option>
                </select>
              </div>
            </div>
          </div>
        </form>
        
        <div class="row">
          @foreach ($reports as $report)
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
              <div class="card h-100">
                <!-- Gambar laporan -->
                <div class="card-img-container">
                  <img src="{{ $report->foto_bukti ? Storage::url($report->foto_bukti) : asset('image/Wa.jpg') }}" 
                      class="card-img-top" 
                      alt="Foto Laporan">
                </div>

                <!-- Isi kartu -->
                <div class="card-body">
                                    <!-- Badge status di pojok atas gambar -->
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ $report->judul_laporan }}</h5>

                    <!-- Badge status di samping judul -->
                    <span class="badge 
                        @if ($report->status === 'completed') bg-success
                        @elseif ($report->status === 'progress') bg-warning text-dark
                        @elseif ($report->status === 'pending') bg-danger
                        @else bg-secondary @endif">
                        
                        @if ($report->status === 'completed') Selesai
                        @elseif ($report->status === 'progress') Diproses
                        @elseif ($report->status === 'pending') Menunggu
                        @else Belum Diketahui @endif
                    </span>
                </div>
                
                  <p class="card-text">{!! Str::limit($report->isi_laporan ?? 'Tidak ada deskripsi', 90) !!}</p>
                  
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

        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
          {{ $reports->links() }}
          </ul>
        </nav>
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
      
      // Filter functionality
      document.getElementById('searchInput').addEventListener('input', filterReports);
      document.getElementById('statusFilter').addEventListener('change', filterReports);
      document.getElementById('sortBy').addEventListener('change', sortReports);
      
      function filterReports() {
        // Implementasi filter laporan
        console.log('Filtering reports...');
      }
      
      function sortReports() {
        // Implementasi sorting laporan
        console.log('Sorting reports...');
      }
    </script>
  </body>
</html>