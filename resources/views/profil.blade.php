<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
      body {
        overflow-x: hidden;
        background-color: #f8f9fa;
      }
      #sidebar {
        min-height: 100vh;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 100;
      }
      #content {
        padding: 20px;
        width: calc(100% - 280px);
      }
      .card {
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
        border: none;
        border-radius: 10px;
      }
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
      }
      .card-border {
        border: 1px solid #0d6efd;
        border-radius: 0.375rem;
      }

      .profile-image-container {
        position: relative;
        text-align: center;
      }

      .profile-image {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #EECFC0;
      }

      .profile-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-left: 20px;
      }
      
      .profile-actions {
        margin-top: 20px;
      }
      
      .section-title {
        color: #2c3e50;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e9ecef;
      }
      
      .stats-card {
        text-align: center;
        padding: 15px;
      }
      
      .stats-number {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 5px;
      }
      
      .stats-label {
        color: #6c757d;
        font-size: 0.9rem;
      }
      
      .report-card {
        transition: all 0.3s ease;
      }
      
      .report-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      }

      @media (max-width: 768px) {
        #sidebar {
          width: 100% !important;
          min-height: auto;
        }
        #content {
          width: 100%;
        }
        .card-container {
          flex-direction: column;
          align-items: center;
        }
        .profile-info {
          padding-left: 0;
          text-align: center;
          margin-top: 20px;
        }
        .profile-actions .btn {
          width: 100%;
          margin-bottom: 10px;
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
        <h3 class="mt-2">Profil Pengguna</h3>
        <hr>
        
        <!-- Informasi Profil -->
        <div class="row mt-3">
          <div class="col-md-4 text-center mb-4">
            <div class="profile-image-container">
              <img src="{{ asset('image/Wa.jpg') }}" alt="Foto Profil" class="img-fluid rounded-circle profile-image">
              <div class="mt-3">
                <button class="btn btn-outline-primary btn-sm">
                  <i class="bi bi-camera me-1"></i> Ubah Foto
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-8 mb-4">
            <div class="profile-info">
              <h4>Nama Pengguna</h4>
              <p class="text-muted">email@example.com</p>
              <p><i class="bi bi-telephone me-2"></i> +62 812-3456-7890</p>
              <p><i class="bi bi-geo-alt me-2"></i> Jakarta, Indonesia</p>
              
              <div class="profile-actions">
                <button class="btn btn-primary me-2">
                  <i class="bi bi-pencil-square me-1"></i> Edit Profil
                </button>
                <button class="btn btn-outline-secondary">
                  <i class="bi bi-key me-1"></i> Ubah Password
                </button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Statistik -->
        <div class="row mt-4">
          <div class="col-md-3 mb-3">
            <div class="card stats-card">
              <div class="stats-number text-primary">15</div>
              <div class="stats-label">Total Laporan</div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card stats-card">
              <div class="stats-number text-success">10</div>
              <div class="stats-label">Laporan Selesai</div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card stats-card">
              <div class="stats-number text-warning">3</div>
              <div class="stats-label">Dalam Proses</div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card stats-card">
              <div class="stats-number text-info">2</div>
              <div class="stats-label">Menunggu</div>
            </div>
          </div>
        </div>
        
        <!-- Laporan Saya -->
        <div class="mt-5">
          <h4 class="section-title">Laporan Saya</h4>
          <div class="d-flex flex-wrap">
            <div class="card report-card" style="width: 18rem;">
              <div class="card-body">
                <span class="badge bg-success mb-2">Selesai</span>
                <h5 class="card-title">Laporan 1</h5>
                <p class="card-text">Deskripsi singkat tentang laporan 1. Laporan ini berisi informasi penting mengenai...</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">12 Mar 2023</small>
                  <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="card report-card" style="width: 18rem;">
              <div class="card-body">
                <span class="badge bg-warning mb-2">Proses</span>
                <h5 class="card-title">Laporan 2</h5>
                <p class="card-text">Deskripsi singkat tentang laporan 2. Laporan ini berisi informasi penting mengenai...</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">5 Mar 2023</small>
                  <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="card report-card" style="width: 18rem;">
              <div class="card-body">
                <span class="badge bg-info mb-2">Menunggu</span>
                <h5 class="card-title">Laporan 3</h5>
                <p class="card-text">Deskripsi singkat tentang laporan 3. Laporan ini berisi informasi penting mengenai...</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">1 Mar 2023</small>
                  <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="card report-card" style="width: 18rem;">
              <div class="card-body">
                <span class="badge bg-success mb-2">Selesai</span>
                <h5 class="card-title">Laporan 4</h5>
                <p class="card-text">Deskripsi singkat tentang laporan 4. Laporan ini berisi informasi penting mengenai...</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">25 Feb 2023</small>
                  <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>