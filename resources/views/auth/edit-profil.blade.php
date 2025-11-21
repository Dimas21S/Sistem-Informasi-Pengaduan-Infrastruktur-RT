<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profil - SIPIR</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
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
    
    * {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    body {
      background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 100%);
      color: var(--dark);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    
    .navbar {
      background-color: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
    }
    
    .logo i {
      font-size: 2rem;
      color: var(--primary);
    }
    
    .logo-text {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary);
    }
    
    .login-container {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 0;
    }
    
    .login-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
      width: 100%;
      max-width: 400px;
      border: none;
      margin-top: -2rem; /* Mengangkat kartu sedikit ke atas */
    }
    
    .login-header {
      text-align: center;
      margin-bottom: 2rem;
    }
    
    .login-logo {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      margin-bottom: 1rem;
    }
    
    .login-logo i {
      font-size: 2.5rem;
      color: var(--primary);
    }
    
    .login-logo-text {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--primary);
    }
    
    .login-title {
      font-size: 1.8rem;
      font-weight: 600;
      color: var(--dark);
      margin-bottom: 0.5rem;
    }
    
    .login-subtitle {
      color: var(--gray);
      margin-bottom: 0;
    }
    
    .form-label {
      font-weight: 500;
      color: var(--dark);
      margin-bottom: 0.5rem;
    }
    
    .form-control {
      padding: 0.75rem 1rem;
      border: 1px solid var(--light-gray);
      border-radius: 8px;
      transition: all 0.3s;
    }
    
    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
    }
    
    .form-check-input:checked {
      background-color: var(--primary);
      border-color: var(--primary);
    }
    
    .form-check-label {
      color: var(--gray);
    }
    
    .btn-login {
      background: var(--primary);
      color: white;
      padding: 0.75rem;
      border-radius: 8px;
      font-weight: 500;
      border: none;
      transition: all 0.3s;
    }
    
    .btn-login:hover {
      background: var(--primary-dark);
    }
    
    .login-footer {
      text-align: center;
      margin-top: 1.5rem;
      color: var(--gray);
    }
    
    .login-footer a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }
    
    .login-footer a:hover {
      color: var(--primary-dark);
    }
    
    footer {
      background: var(--dark);
      color: white;
      padding: 2rem 0;
      margin-top: auto;
    }
    
    .footer-bottom {
      text-align: center;
      padding-top: 1.5rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      color: #94a3b8;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

  <!-- Login Form -->
  <div class="login-container">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
      <div class="login-card">
        <div class="login-header">
          <div class="login-logo">
            <i class="fas fa-tools"></i>
            <span class="login-logo-text">SIPIR</span>
          </div>
          <h1 class="login-title">Edit Profil</h1>
        </div>
        
        <form action="{{ route('post-edit-profil') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto Profil -->
            <div class="mb-3 text-center">
                <label class="form-label d-block">Foto Profil</label>

                <!-- Preview Foto -->
                <img 
                    src="{{ $user->photo ? asset('storage/profile/' . $user->photo) : 'https://via.placeholder.com/120' }}"
                    alt="Foto Profil"
                    class="rounded-circle mb-3"
                    width="120" height="120"
                    style="object-fit: cover; border: 3px solid var(--primary);"
                >

                <!-- Input File -->
                <input type="file" name="photo" class="form-control" accept="image/*">
                <small class="text-muted">Format: JPG, PNG | Max: 2MB</small>
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <!-- Tombol Update -->
            <button type="submit" class="btn btn-login w-100">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>