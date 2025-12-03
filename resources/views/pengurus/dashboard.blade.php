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
      
      .page-title {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 1.5rem;
      }
      
      /* Card Styles */
      .card {
        margin: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: none;
        border-radius: 12px;
        transition: transform 0.3s, box-shadow 0.3s;
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
      
      /* Chart container */
      .chart-container {
        margin-top: 30px;
        padding: 1.5rem;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      }
      
      .chart-title {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 1rem;
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
        <h2 class="page-title">Dashboard Laporan</h2>
        
        <div class="card-container d-flex flex-wrap justify-content-center">
          <!-- Card laporan sukses -->
          <div class="card status-card success-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Selesai</h5>
              <i class="fas fa-check-circle status-icon success-icon"></i>
              <p class="card-text status-value">{{ $completed }}</p>
            </div>
          </div>

          <!-- Card laporan proses -->
          <div class="card status-card process-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Proses</h5>
              <i class="fas fa-cog status-icon process-icon"></i>
              <p class="card-text status-value">{{ $progress }}</p>
            </div>
          </div>

          <!-- Card laporan pending -->
          <div class="card status-card pending-card">
            <div class="card-body status-card-body">
              <h5 class="card-title status-title">Status: Pending</h5>
              <i class="fas fa-clock status-icon pending-icon"></i>
              <p class="card-text status-value">{{ $pending }}</p>
            </div>
          </div>
        </div>
          
        <!-- Chart container -->
        <div class="chart-container">
          <h4 class="chart-title">Statistik Laporan Bulanan</h4>
          <canvas id="lineChart" width="400" height="150"></canvas>
        </div>
      </div>
    </div>

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Modal Logout -->
    <x-modal-logout/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>    
    <script>
      // Script untuk chart
      document.addEventListener('DOMContentLoaded', function() {
      const labels = @json($label);
      const values = @json($values);

      const ctx = document.getElementById('lineChart').getContext('2d');

      const data = {
          labels: labels,
          datasets: [{
              label: 'Jumlah Laporan',
              data: values,
              backgroundColor: '#2563eb', // warna batang
              borderWidth: 1,
              borderColor: '#1d4ed8',
          }]
      };

      const config = {
          type: 'bar', // ⇐ diganti menjadi BAR
          data: data,
          options: {
              responsive: true,
              plugins: {
                  legend: {
                      position: 'top',
                  },
                  title: {
                      display: true,         // tampilkan judul chart
                      text: 'Statistik Laporan Bulanan'
                  }
              },
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      };

      new Chart(ctx, config);
  });
      
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