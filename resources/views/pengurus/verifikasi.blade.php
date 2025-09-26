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
          
        <table class="table table-striped mt-4 table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Judul Laporan</th>
                    <th scope="col">Tanggal Laporan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>John Doe</td>
                    <td>Jalan Rusak di RT 05</td>
                    <td>2024-01-15</td>
                    <td><span class="badge bg-success">Sukses</span></td>
                    <td>
                        <button class="btn btn-primary btn-sm">Lihat</button>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jane Smith</td>
                    <td>Pohon Tumbang di Jalan Merdeka</td>
                    <td>2024-01-16</td>
                    <td><span class="badge bg-warning text-dark">Proses</span></td>
                    <td>
                        <button class="btn btn-primary btn-sm">Lihat</button>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Ahmad Fauzi</td>
                    <td>Sampah Menumpuk di RT 03</td>
                    <td>2024-01-17</td>
                    <td><span class="badge bg-danger">Pending</span></td>
                    <td>
                        <button class="btn btn-primary btn-sm">Lihat</button>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>