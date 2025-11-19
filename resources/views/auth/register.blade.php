<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - SIPIR</title>
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
          <h1 class="login-title">Masuk ke Akun</h1>
          <p class="login-subtitle">Selamat datang kembali di SIPIR</p>
        </div>
        
        <form action="{{  route('register.post') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Masukkan nama" name="name">
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email" required>
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password" required>
          </div>

          <!-- Remember Me -->
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Ingat saya</label>
          </div>

          <!-- Button -->
          <button type="submit" class="btn btn-login w-100">Register</button>
        </form>

        <!-- Footer -->
        <div class="login-footer">
          <p class="mb-0">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>