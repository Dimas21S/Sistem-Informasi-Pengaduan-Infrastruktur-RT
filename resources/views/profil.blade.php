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
              </div>
            </div>
          </div>
          <div class="col-md-8 mb-4">
            <div class="profile-info">
              <h4>{{ $user->name }}</h4>
              <p class="text-muted">{{ $user->email }}</p>
              <p><i class="bi bi-telephone me-2"></i> {{ $user->phone }}</p>
              <p><i class="bi bi-geo-alt me-2"></i> {{ $user->address }}</p>

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
              <div class="stats-number text-primary">{{ $count }}</div>
              <div class="stats-label">Total Laporan</div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card stats-card">
              <div class="stats-number text-success">{{ $completed }}</div>
              <div class="stats-label">Laporan Selesai</div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card stats-card">
              <div class="stats-number text-warning">{{ $progress }}</div>
              <div class="stats-label">Dalam Proses</div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card stats-card">
              <div class="stats-number text-info">{{ $pending }}</div>
              <div class="stats-label">Menunggu</div>
            </div>
          </div>
        </div>
        
        <!-- Laporan Saya -->
        <div class="mt-5">
          <h4 class="section-title">Laporan Saya</h4>

          <div class="d-flex flex-wrap">
            @foreach ($user->reports as $report)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                  <div class="card shadow-sm border-0 h-100" style="border-radius: 15px; overflow: hidden; background-color: #fdfdfd;">
                    
                    {{-- Gambar laporan --}}
                    <div class="position-relative">
                      <img src="{{ asset('image/Wa.jpg') }}" 
                          class="card-img-top" 
                          alt="Foto Laporan" 
                          style="object-fit: cover; height: 200px;">
                      
                      {{-- Badge status di pojok atas gambar --}}
                      <div class="position-absolute top-0 end-0 m-2">
                        @if ($report->status === 'completed')
                          <span class="badge bg-success shadow">Sukses</span>
                        @elseif ($report->status === 'progress')
                          <span class="badge bg-warning text-dark shadow">Diproses</span>
                        @elseif ($report->status === 'pending')
                          <span class="badge bg-danger shadow">Menunggu</span>
                        @else
                          <span class="badge bg-secondary shadow">Belum Diketahui</span>
                        @endif
                      </div>
                    </div>

                    {{-- Isi kartu --}}
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div>
                        <h5 class="card-title fw-semibold text-dark mb-2">{{ $report->judul_laporan }}</h5>
                        <p class="card-text text-muted small mb-3">{{ Str::limit($report->isi_laporan ?? 'Tidak ada deskripsi', 90) }}</p>
                      </div>

                      <div class="mt-auto text-end">
                        <a href="{{ url('/detail-laporan/' . $report->id_laporan) }}" class="btn btn-sm btn-outline-primary px-3 py-2 rounded-pill">
                          <i class="bi bi-eye-fill me-1"></i> Lihat Detail
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>