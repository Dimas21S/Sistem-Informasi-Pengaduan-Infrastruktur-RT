<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Data Warga</title>
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
        <h2 class="mb-4">Kelola Data Warga</h2>
          
        <table class="table table-striped mt-4 table-hover">
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
              @foreach ( $warga as $item )
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>22-22-22</td>
                    <td>{{ $item->role }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Lihat</button>
                        <button class="btn btn-warning btn-sm editBtn" 
                        data-bs-toggle="modal" 
                        data-bs-target="#exampleModal" 
                        data-user-id="{{ $item->id }}" 
                        data-user-name="{{ $item->name }}" 
                        data-user-role="{{ $item->role }}">Edit</button>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <form class="modal-content" method="POST" action="{{ route('post-role') }}">
            @csrf
            
            <input type="hidden" name="id" id="editId">
              <div class="modal-content">
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
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
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