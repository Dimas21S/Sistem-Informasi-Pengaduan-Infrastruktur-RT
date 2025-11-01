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
      
      /* Chart container */
      .chart-container {
        margin-top: 30px;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      
      @media (max-width: 768px) {
        #sidebar {
          width: 100% !important;
          min-height: auto;
        }
        #content {
          width: 100%;
          padding: 15px;
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
        <h2 class="mb-4">Dashboard Laporan</h2>
        
        <div class="card-container d-flex flex-wrap justify-content-center">
          <!-- Card laporan sukses -->
          <div class="card status-card success-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Sukses</h5>
              <i class="bi bi-check-circle status-icon success-icon"></i>
              <p class="card-text status-value">{{ $completed }}</p>
            </div>
          </div>

          <!-- Card laporan proses -->
          <div class="card status-card process-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Proses</h5>
              <i class="bi bi-gear status-icon process-icon"></i>
              <p class="card-text status-value">{{ $progress }}</p>
            </div>
          </div>

          <!-- Card laporan pending -->
          <div class="card status-card pending-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Pending</h5>
              <i class="bi bi-bookmark-x status-icon pending-icon"></i>
              <p class="card-text status-value">{{ $pending }}</p>
            </div>
          </div>
        </div>
          
        <!-- Chart container -->
        <div class="chart-container">
          <canvas id="lineChart" width="400" height="150"></canvas>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.5.0/chart.min.js" integrity="sha512-n/G+dROKbKL3GVngGWmWfwK0yPctjZQM752diVYnXZtD/48agpUKLIn0xDQL9ydZ91x6BiOmTIFwWjjFi2kEFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
      // Script untuk chart dipindahkan ke sini
      document.addEventListener('DOMContentLoaded', function() {
        const labels = @json($label);
        const data = @json($values);
        
        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'Laporan',
              data: data,
              borderColor: '#0d6efd',
              backgroundColor: 'rgba(13, 110, 253, 0.2)',
              pointStyle: 'circle',
              pointRadius: 5,
              pointHoverRadius: 7,
              fill: true,
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Laporan Bulanan'
              }
            }
          }
        });
      });
    </script>
  </body>
</html>