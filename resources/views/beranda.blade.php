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
      #content {
        padding: 20px;
        width: calc(100% - 280px);
      }

      #sidebar {
        min-height: 100vh;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 100;
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
      
      /* Gaya untuk card status */
      .status-card {
        position: relative;
        width: 18rem; 
        height: 8rem; 
      }
      .status-card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
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
        font-size: 1.1rem;
      }
      .status-value {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 0;
      }
      
      /* Warna khusus untuk setiap status */
      .success-card {
        border-left: 5px solid #28a745;
        background: linear-gradient(135deg, #f8fff9, #e8f5e9);
      }
      .success-icon {
        color: #28a745;
      }
      .process-card {
        border-left: 5px solid #fd7e14;
        background: linear-gradient(135deg, #fff8f1, #ffe8d6);
      }
      .process-icon {
        color: #fd7e14;
      }
      .pending-card {
        border-left: 5px solid #dc3545;
        background: linear-gradient(135deg, #fff5f5, #ffe6e6);
      }
      .pending-icon {
        color: #dc3545;
      }
      
      /* Gaya untuk card informasi */
      .info-card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }
      .info-card-img {
        height: 200px;
        object-fit: cover;
      }
      
      /* Header dashboard */
      .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e9ecef;
      }
      
      /* Responsif */
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
        .status-card {
          width: 100%;
          max-width: 18rem;
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
          <h2 class="mb-0">Dashboard Laporan</h2>
          <div class="d-flex align-items-center">
            <div class="me-3">
              <small class="text-muted">Selamat datang,</small>
              <div class="fw-bold">Nama Pengguna</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profil</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i> Keluar</a></li>
              </ul>
            </div>
          </div>
        </div>
        
        <!-- Card Status Laporan -->
        <h4 class="mb-3">Statistik Laporan</h4>
        <div class="card-container d-flex flex-wrap justify-content-center mb-5">
          <!-- Card laporan sukses -->

          <x-card-status 
            judul="Sukses" 
            angka="{{ $completed }}" 
            deskripsi="Laporan berhasil diproses" 
            ikon="bi-check-circle" 
            warna="success"/>
          
          <x-card-status 
            judul="Proses" 
            angka="{{ $progress }}" 
            deskripsi="Laporan sedang diproses" 
            ikon="bi-gear" 
            warna="process"/>

          <x-card-status 
            judul="Pending"
            angka="{{ $pending }}" 
            deskripsi="Laporan menunggu tindakan" 
            ikon="bi-clock" 
            warna="pending"/>
        </div>
        
        <!-- Informasi Penting -->
        @if ($firstReport)
          <div class="alert alert-info">
            <strong>Informasi Penting:</strong> Laporan terbaru Anda adalah "<em>{{ $firstReport->title }}</em>".
          </div>

          <h4 class="mb-3">Informasi Penting</h4>
            <div class="mt-5 d-flex justify-content-center">
              <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="width: 38rem; background: transparent;">
                <img src="{{ asset('image/Wa.jpg') }}" class="card-img-top" alt="WhatsApp" style="object-fit:cover; height: 200px;">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <button class="btn btn-primary">Go somewhere</button>
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="alert alert-warning">
            <strong>Perhatian:</strong> Anda belum memiliki laporan. Silakan buat laporan baru untuk melihat informasi penting di sini.
          </div>
        @endif

      </div>
    </div>

    <x-modal-logout/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>