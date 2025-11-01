<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
      :root {
        --primary-color: #2c3e50;
        --secondary-color: #3498db;
        --accent-color: #e74c3c;
        --light-bg: #f8f9fa;
        --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }
      
      body {
        overflow-x: hidden;
        background-color: var(--light-bg);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

       #sidebar {
        min-height: 100vh;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 100;
      }
      
      #content {
        padding: 25px;
        width: calc(100% - 280px);
        transition: width 0.3s ease;}
      
      .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 1px solid #dee2e6;
      }
      
      .page-title {
        color: var(--primary-color);
        font-weight: 600;
        margin: 0;
      }
      
      .card {
        border: none;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        margin-bottom: 20px;
        overflow: hidden;
      }
      
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      }
      
      .card-img-container {
        height: 180px;
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
      }
      
      .card-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        height: 100%;
      }
      
      .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 10px;
        line-height: 1.4;
      }
      
      .card-text {
        color: #6c757d;
        font-size: 0.9rem;
        line-height: 1.5;
        flex-grow: 1;
        margin-bottom: 15px;
      }
      
      .card-footer {
        background: transparent;
        border-top: 1px solid #f1f1f1;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      
      .card-date {
        font-size: 0.8rem;
        color: #6c757d;
      }
      
      .filter-section {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: var(--card-shadow);
      }
      
      .stats-card {
        text-align: center;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
      }
      
      .stats-number {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 5px;
      }
      
      .stats-label {
        font-size: 0.9rem;
        color: #6c757d;
      }
      
      .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #6c757d;
      }
      
      .empty-state i {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #dee2e6;
      }
      
      @media (max-width: 992px) {
        #sidebar {
          width: 80px;
        }
        
        .sidebar-brand h4 {
          font-size: 1.2rem;
        }
        
        .nav-link span {
          display: none;
        }
        
        #content {
          width: calc(100% - 80px);
        }
      }
      
      @media (max-width: 768px) {
        #sidebar {
          width: 100%;
          min-height: auto;
          position: fixed;
          bottom: 0;
          top: auto;
          z-index: 1030;
        }
        
        .sidebar-nav {
          display: flex;
          justify-content: space-around;
        }
        
        .nav-item {
          flex: 1;
        }
        
        .nav-link {
          margin: 0;
          padding: 10px 5px;
          text-align: center;
          border-radius: 0;
        }
        
        #content {
          width: 100%;
          padding-bottom: 80px;
        }
        
        .page-header {
          flex-direction: column;
          align-items: flex-start;
        }
        
        .header-actions {
          margin-top: 15px;
          width: 100%;
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
            <p class="text-muted mb-0">Kelola dan pantau semua laporan Anda di satu tempat</p>
          </div>
          <div class="header-actions">
            <button class="btn btn-primary" onClick="location.href='{{ route('form-laporan') }}'">
              <i class="bi bi-plus-circle me-1"></i> Buat Laporan Baru
            </button>
          </div>
        </div>
        
        <!-- Statistik Cepat -->
        {{-- <div class="row mb-4">
          <div class="col-md-3 col-sm-6">
            <div class="stats-card bg-light">
              <div class="stats-number text-primary">24</div>
              <div class="stats-label">Total Laporan</div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="stats-card bg-light">
              <div class="stats-number text-success">18</div>
              <div class="stats-label">Selesai</div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="stats-card bg-light">
              <div class="stats-number text-warning">4</div>
              <div class="stats-label">Dalam Proses</div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="stats-card bg-light">
              <div class="stats-number text-danger">2</div>
              <div class="stats-label">Menunggu</div>
            </div>
          </div>
        </div> --}}
        
        <!-- Filter dan Pencarian -->
        <div class="filter-section">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="searchInput" class="form-label">Cari Laporan</label>
              <div class="input-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Masukkan kata kunci...">
                <button class="btn btn-outline-secondary" type="button">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="statusFilter" class="form-label">Status</label>
              <select class="form-select" id="statusFilter">
                <option value="">Semua Status</option>
                <option value="success">Selesai</option>
                <option value="warning">Dalam Proses</option>
                <option value="danger">Menunggu</option>
              </select>
            </div>
            <div class="col-md-3 mb-3">
              <label for="sortBy" class="form-label">Urutkan</label>
              <select class="form-select" id="sortBy">
                <option value="newest">Terbaru</option>
                <option value="oldest">Terlama</option>
                <option value="title">Judul A-Z</option>
              </select>
            </div>
          </div>
        </div>
        
        <!-- Daftar Laporan -->
        <div class="row">
          <!-- Laporan 1 -->
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="width: 18rem; background: transparent;">
              <img src="{{ asset('image/Wa.jpg') }}" class="card-img-top" alt="WhatsApp" style="object-fit:cover; height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn btn-primary">Go somewhere</button>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="width: 18rem; background: transparent;">
              <img src="{{ asset('image/Wa.jpg') }}" class="card-img-top" alt="WhatsApp" style="object-fit:cover; height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn btn-primary">Go somewhere</button>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="width: 18rem; background: transparent;">
              <img src="{{ asset('image/Wa.jpg') }}" class="card-img-top" alt="WhatsApp" style="object-fit:cover; height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn btn-primary">Go somewhere</button>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="width: 18rem; background: transparent;">
              <img src="{{ asset('image/Wa.jpg') }}" class="card-img-top" alt="WhatsApp" style="object-fit:cover; height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn btn-primary">Go somewhere</button>
              </div>
            </div>
          </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Selanjutnya</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>