<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Petugas - SIPIR</title>
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
        margin-bottom: 1.5rem;
      }
      
      /* Status Card Styles */
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
      
      /* Table Styles */
      .table-container {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--light-gray);
        margin-top: 2rem;
      }
      
      .table-title {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid var(--light-gray);
      }
      
      .table {
        margin-bottom: 0;
      }
      
      .table thead th {
        background-color: var(--light);
        color: var(--dark);
        font-weight: 600;
        border-bottom: 2px solid var(--light-gray);
        padding: 1rem 0.75rem;
      }
      
      .table tbody td {
        padding: 1rem 0.75rem;
        vertical-align: middle;
        border-color: var(--light-gray);
      }
      
      .table tbody tr:hover {
        background-color: rgba(37, 99, 235, 0.05);
      }
      
      /* Badge Styles */
      .badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
      }
      
      .bg-success {
        background-color: var(--secondary) !important;
      }
      
      .bg-warning {
        background-color: var(--accent) !important;
      }
      
      .bg-danger {
        background-color: #ef4444 !important;
      }
      
      /* Button Styles */
      .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        border-radius: 6px;
        padding: 0.5rem 1rem;
        font-weight: 500;
        transition: all 0.3s;
        font-size: 0.875rem;
      }
      
      .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
      }
      
      .btn-warning {
        background-color: var(--accent);
        border-color: var(--accent);
        color: white;
        border-radius: 6px;
        padding: 0.5rem 1rem;
        font-weight: 500;
        transition: all 0.3s;
        font-size: 0.875rem;
      }
      
      .btn-warning:hover {
        background-color: #d97706;
        border-color: #d97706;
        color: white;
      }
      
      .btn-secondary {
        border-radius: 6px;
        padding: 0.5rem 1rem;
        font-weight: 500;
        transition: all 0.3s;
        font-size: 0.875rem;
      }
      
      /* Modal Styles */
      .modal-header {
        border-bottom: 1px solid var(--light-gray);
        padding: 1.5rem;
      }
      
      .modal-title {
        color: var(--dark);
        font-weight: 600;
      }
      
      .modal-body {
        padding: 1.5rem;
      }
      
      .modal-footer {
        border-top: 1px solid var(--light-gray);
        padding: 1.5rem;
      }
      
      .form-label {
        font-weight: 500;
        color: var(--dark);
        margin-bottom: 0.5rem;
      }
      
      .form-select {
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
      }
      
      .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
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
        
        .card-container {
          flex-direction: column;
          align-items: center;
        }
        
        .status-card {
          width: 100%;
          max-width: 18rem;
        }
        
        .table-container {
          padding: 1rem;
          overflow-x: auto;
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
        <h2 class="page-title">Verifikasi Laporan</h2>
          
        <!-- Tabel Laporan -->
        <div class="table-container">
          <h4 class="table-title">Daftar Laporan</h4>
          
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Judul Laporan</th>
                  <th scope="col">Tanggal Laporan</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($laporan as $item)
                  <tr>
                    <th scope="row">{{ $item->id_laporan }}</th>
                    <td>{{ $item->judul_laporan }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_laporan)->format('d M Y') }}</td>
                    @switch($item->status)
                      @case('completed')
                        <td><span class="badge bg-success">Selesai</span></td>
                        @break
                      @case('progress')
                        <td><span class="badge bg-warning text-dark">Dalam Proses</span></td>
                        @break
                      @case('pending')
                        <td><span class="badge bg-danger">Menunggu</span></td>
                        @break                        
                    @endswitch
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ url('/detail-laporan/' . $item->id_laporan) }}" 
                          class="btn btn-primary btn-sm" 
                          target="_blank" 
                          rel="noopener noreferrer">
                            Lihat
                        </a>
                        <button class="btn btn-warning btn-sm editBtn"
                          data-bs-toggle="modal" 
                          data-bs-target="#exampleModal"
                          data-report-nama="{{ $item->user->name }}" 
                          data-report-id="{{ $item->id_laporan }}" 
                          data-report-judul="{{ $item->judul_laporan }}" 
                          data-report-status="{{ $item->status }}">
                          <i class="fas fa-edit me-1"></i> Edit
                        </button>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Modal Edit Status -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="{{ route('post-verifikasi') }}">
            @csrf
            <input type="hidden" name="id_laporan" id="editId" value="">
            <div class="modal-header"> 
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Status Laporan Warga</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p><strong>Judul:</strong> <span id="editJudul"></span></p>
              <p><strong>Pelapor:</strong> <span id="editNama"></span></p>
              
              <div class="mb-3">
                <label for="editStatus" class="form-label">Pilih Status</label>
                <select name="status" id="editStatus" class="form-select" required>
                  <option value="completed">Selesai</option>
                  <option value="progress">Masih dalam progres</option>
                  <option value="pending">Menunggu</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLogoutLabel">Konfirmasi Logout</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-exclamation-triangle text-warning me-3" style="font-size: 1.5rem;"></i>
              <p class="mb-0">Apakah Anda yakin ingin keluar dari sistem?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <a href="{{ route('logout') }}" class="btn btn-primary">Ya, Logout</a>
          </div>
        </div>
      </div>
    </div>

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
      
      // Modal edit functionality
      const editButtons = document.querySelectorAll('.editBtn');
      const editId = document.getElementById('editId');
      const editNama = document.getElementById('editNama');
      const editJudul = document.getElementById('editJudul');
      const editStatus = document.getElementById('editStatus');

      editButtons.forEach(button => {
        button.addEventListener('click', () => {
          const id = button.getAttribute('data-report-id');
          const nama = button.getAttribute('data-report-nama');
          const judul = button.getAttribute('data-report-judul');
          const status = button.getAttribute('data-report-status');

          editId.value = id;
          editNama.textContent = nama;
          editJudul.textContent = judul;
          editStatus.value = status;
        });
      });
    </script>
  </body>
</html>