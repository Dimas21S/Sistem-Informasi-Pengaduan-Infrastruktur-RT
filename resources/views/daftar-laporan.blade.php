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
      .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
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
      <div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">Proyek Baru</a></li>
            <li><a class="dropdown-item" href="#">Pengaturan</a></li>
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Keluar</a></li>
          </ul>
        </div>
        <hr> 
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
              <i class="bi bi-house-door-fill"></i>
              Beranda
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-dark">
              <i class="bi bi-card-list"></i>
              Daftar Laporan
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-dark">
              <i class="bi bi-person-fill"></i>
              Profil
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center link-dark text-decoration-none">
            <i class="bi bi-box-arrow-left me-2"></i>
            Log Out
          </a>
        </div>
      </div>

      <!-- Konten Utama -->
      <div id="content" class="flex-grow-1">
        <h2 class="mb-4">Daftar Laporan</h2>
          
        <div class="mt-5 card-container">
          <div class="card card-border" style="width: 18rem;">
            <img src="/public/image/Wa.jpg" class="card-img-top" alt="WhatsApp" style="object-fit:cover; height: 100px;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <button class="btn btn-primary">Go somewhere</button>
            </div>
          </div>

          <div class="card card-border" style="width: 18rem;">
            <img src="/public/image/Wa.jpg" class="card-img-top" alt="WhatsApp" style="object-fit:cover; height: 100px;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <button class="btn btn-primary">Go somewhere</button>
            </div>
          </div>
          
          <div class="card card-border" style="width: 18rem;">
            <img src="/public/image/Wa.jpg" class="card-img-top" alt="WhatsApp" style="object-fit:cover; height: 100px;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <button class="btn btn-primary">Go somewhere</button>
            </div>
          </div>

          <div class="card card-border" style="width: 18rem;">
            <img src="/public/image/Wa.jpg" class="card-img-top" alt="WhatsApp" style="object-fit:cover; height: 100px;">
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