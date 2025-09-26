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
      }
      .card:hover {
        transform: translateY(-5px);
      }
      .card-border {
        border: 1px solid #0d6efd;
        border-radius: 0.375rem;
      }
      
      /* Gaya baru untuk card status */
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
      }
      .success-icon {
        color: #28a745;
      }
      .process-card {
        border-left: 5px solid #fd7e14;
      }
      .process-icon {
        color: #fd7e14;
      }
      .pending-card {
        border-left: 5px solid #dc3545;
      }
      .pending-icon {
        color: #dc3545;
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
      }
    </style>
  </head>
  <body>
    <div class="d-flex">
      <!-- Sidebar -->
      <x-sidebar/>

      <!-- Konten Utama -->
      <div id="content" class="flex-grow-1">
        <h2 class="mb-4">Dashboard Laporan</h2>
        
        <div class="card-container d-flex flex-wrap justify-content-center">
          <!-- Card laporan sukses -->
          <div class="card status-card success-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Sukses</h5>
              <i class="bi bi-check-circle status-icon success-icon"></i>
              <p class="card-text status-value">42</p>
            </div>
          </div>

          <!-- Card laporan proses -->
          <div class="card status-card process-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Proses</h5>
              <i class="bi bi-gear status-icon process-icon"></i>
              <p class="card-text status-value">42</p>
            </div>
          </div>

          <!-- Card laporan pending -->
          <div class="card status-card pending-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Pending</h5>
              <i class="bi bi-bookmark-x status-icon pending-icon"></i>
              <p class="card-text status-value">42</p>
            </div>
          </div>
        </div>
          
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>