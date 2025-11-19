<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Data Warga - SIPIR</title>
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
      
      /* Table Styles */
      .table-container {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--light-gray);
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
      
      .badge-warga {
        background-color: var(--primary);
        color: white;
      }
      
      .badge-petugas {
        background-color: var(--accent);
        color: white;
      }
      
      .badge-admin {
        background-color: var(--secondary);
        color: white;
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
        <h2 class="page-title">Kelola Data Warga</h2>
        
        <div class="table-container">
          <h4 class="table-title">Daftar Warga</h4>
          
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nama Warga</th>
                  <th scope="col">Email</th>
                  <th scope="col">Bergabung</th>
                  <th scope="col">Peran</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($warga as $item)
                  <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                    <td>
                      @if($item->role === 'Warga')
                        <span class="badge badge-warga">Warga</span>
                      @elseif($item->role === 'Petugas')
                        <span class="badge badge-petugas">Petugas</span>
                      @elseif($item->role === 'Admin')
                        <span class="badge badge-admin">Admin</span>
                      @else
                        <span class="badge bg-secondary">{{ $item->role }}</span>
                      @endif
                    </td>
                    <td>
                      <div class="d-flex gap-2">
                        <button class="btn btn-primary btn-sm">
                          <i class="fas fa-eye me-1"></i> Lihat
                        </button>
                        <button class="btn btn-warning btn-sm editBtn" 
                          data-bs-toggle="modal" 
                          data-bs-target="#exampleModal" 
                          data-user-id="{{ $item->id }}" 
                          data-user-name="{{ $item->name }}" 
                          data-user-role="{{ $item->role }}">
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

    <!-- Modal Edit Role -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="{{ route('post-role') }}">
            @csrf
            <input type="hidden" name="id" id="editId">
            <div class="modal-header"> 
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Role Warga</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p><strong>Nama:</strong> <span id="editName"></span></p>
              
              <div class="mb-3">
                <label for="editRole" class="form-label">Pilih Role Baru</label>
                <select name="role" id="editRole" class="form-select" required>
                  <option value="Warga">Warga</option>
                  <option value="Petugas">Petugas</option>
                  <option value="Admin">Admin</option>
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
      const editName = document.getElementById('editName');
      const editRole = document.getElementById('editRole');

      editButtons.forEach(button => {
        button.addEventListener('click', () => {
          const id = button.getAttribute('data-user-id');
          const name = button.getAttribute('data-user-name');
          const role = button.getAttribute('data-user-role');

          editId.value = id;
          editName.textContent = name;
          editRole.value = role;
        });
      });
    </script>
  </body>
</html>