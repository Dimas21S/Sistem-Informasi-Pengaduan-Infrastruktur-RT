<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPIR - Sistem Informasi Pengaduan Infrastruktur RT</title>
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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header & Navigation */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
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
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .nav-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
        }
        
        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }
        
        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Hero Section */
        .hero {
            padding: 5rem 0;
            background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 100%);
        }
        
        .hero-content {
            display: flex;
            align-items: center;
            gap: 3rem;
        }
        
        .hero-text {
            flex: 1;
        }
        
        .hero-image {
            flex: 1;
            text-align: center;
        }
        
        .hero-image img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: var(--gray);
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
        }
        
        /* Features Section */
        .features {
            padding: 5rem 0;
            background-color: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }
        
        .section-title p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }
        
        .feature-icon i {
            font-size: 1.8rem;
            color: white;
        }
        
        .feature-card h3 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .feature-card p {
            color: var(--gray);
        }
        
        /* How It Works */
        .how-it-works {
            padding: 5rem 0;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        }
        
        .steps {
            display: flex;
            justify-content: space-between;
            margin-top: 3rem;
            position: relative;
        }
        
        .steps::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 10%;
            right: 10%;
            height: 3px;
            background: var(--primary);
            z-index: 1;
        }
        
        .step {
            text-align: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }
        
        .step-number {
            width: 80px;
            height: 80px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0 auto 1.5rem;
        }
        
        .step h3 {
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .step p {
            color: var(--gray);
            max-width: 250px;
            margin: 0 auto;
        }
        
        /* Testimonials */
        .testimonials {
            padding: 5rem 0;
            background-color: white;
        }
        
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary);
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: var(--gray);
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: bold;
        }
        
        .author-info h4 {
            color: var(--dark);
        }
        
        .author-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        /* CTA Section */
        .cta {
            padding: 5rem 0;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            text-align: center;
        }
        
        .cta h2 {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
        }
        
        .cta p {
            max-width: 600px;
            margin: 0 auto 2rem;
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        
        .btn-light {
            background: white;
            color: var(--primary);
        }
        
        .btn-light:hover {
            background: var(--light-gray);
        }
        
        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 4rem 0 2rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background: var(--primary);
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .contact-info {
            list-style: none;
        }
        
        .contact-info li {
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
        }
        
        .contact-info i {
            color: var(--primary);
            margin-top: 0.2rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: background 0.3s;
        }
        
        .social-links a:hover {
            background: var(--primary);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #94a3b8;
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-content {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .steps {
                flex-direction: column;
                gap: 3rem;
            }
            
            .steps::before {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links, .nav-buttons {
                display: none;
            }
            
            .mobile-menu {
                display: block;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <i class="fas fa-tools"></i>
                    <span class="logo-text">SIPIR</span>
                </div>
                
                <div class="nav-links">
                    <a href="#home">Beranda</a>
                    <a href="#features">Fitur</a>
                    <a href="#how-it-works">Cara Kerja</a>
                    <a href="#testimonials">Testimoni</a>
                    <a href="#contact">Kontak</a>
                </div>
                
                <div class="nav-buttons">
                    <a href="#" class="btn btn-outline">Masuk</a>
                    <a href="#" class="btn btn-primary">Daftar</a>
                </div>
                
                <div class="mobile-menu">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Sistem Informasi Pengaduan Infrastruktur RT</h1>
                    <p>Laporkan masalah infrastruktur di lingkungan RT Anda dengan mudah dan cepat. Bersama kita wujudkan lingkungan yang lebih baik.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-primary">Laporkan Masalah</a>
                        <a href="#" class="btn btn-outline">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Infrastruktur RT">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Fitur Unggulan SIPIR</h2>
                <p>Nikmati kemudahan dalam melaporkan dan memantau perkembangan perbaikan infrastruktur di lingkungan RT Anda</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3>Pengaduan Mudah</h3>
                    <p>Laporkan masalah infrastruktur dengan mudah melalui website atau aplikasi mobile hanya dengan beberapa klik.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h3>Pelacakan Status</h3>
                    <p>Pantau status pengaduan Anda secara real-time dari proses verifikasi hingga penyelesaian.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3>Lokasi Presisi</h3>
                    <p>Tandai lokasi masalah secara tepat di peta digital untuk memudahkan tim perbaikan menemukan lokasi.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Laporan Statistik</h3>
                    <p>Akses data statistik pengaduan untuk mengetahui masalah infrastruktur yang paling sering terjadi.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Kolaborasi Warga</h3>
                    <p>Warga dapat memberikan dukungan atau informasi tambahan pada pengaduan yang dilaporkan.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h3>Notifikasi Real-time</h3>
                    <p>Dapatkan pemberitahuan terkini tentang perkembangan pengaduan yang Anda laporkan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>Cara Menggunakan SIPIR</h2>
                <p>Hanya dengan 4 langkah mudah, masalah infrastruktur di lingkungan RT Anda akan segera teratasi</p>
            </div>
            
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Daftar / Masuk</h3>
                    <p>Buat akun atau masuk ke sistem menggunakan data diri Anda.</p>
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Laporkan Masalah</h3>
                    <p>Isi formulir pengaduan dengan detail masalah dan lokasi yang tepat.</p>
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Pantau Status</h3>
                    <p>Lihat perkembangan pengaduan Anda dari verifikasi hingga penanganan.</p>
                </div>
                
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Konfirmasi Selesai</h3>
                    <p>Berikan konfirmasi setelah masalah telah ditangani dengan baik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Apa Kata Warga</h2>
                <p>Testimoni dari warga yang telah menggunakan SIPIR untuk melaporkan masalah infrastruktur</p>
            </div>
            
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Sangat membantu! Jalan rusak di depan rumah saya sudah diperbaiki dalam waktu 3 hari setelah saya laporkan melalui SIPIR."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">BS</div>
                        <div class="author-info">
                            <h4>Budi Santoso</h4>
                            <p>RT 05, Kelurahan Merdeka</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Sistem yang transparan. Saya bisa memantau kapan lampu penerangan jalan yang mati akan diganti."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">SD</div>
                        <div class="author-info">
                            <h4>Sari Dewi</h4>
                            <p>RT 08, Kelurahan Sejahtera</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Sebelum ada SIPIR, harus datang ke ketua RT untuk lapor. Sekarang cukup dari rumah, lebih praktis dan cepat ditanggapi."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">AW</div>
                        <div class="author-info">
                            <h4>Ahmad Wijaya</h4>
                            <p>RT 03, Kelurahan Bahagia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Siap Melaporkan Masalah Infrastruktur di Lingkungan Anda?</h2>
            <p>Bergabunglah dengan ratusan warga lainnya yang telah menggunakan SIPIR untuk memperbaiki infrastruktur RT mereka</p>
            <div class="cta-buttons">
                <a href="#" class="btn btn-light">Laporkan Sekarang</a>
                <a href="#" class="btn btn-outline" style="color: white; border-color: white;">Lihat Demo</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Tentang SIPIR</h3>
                    <p>Sistem Informasi Pengaduan Infrastruktur RT (SIPIR) adalah platform digital untuk memudahkan warga melaporkan masalah infrastruktur di lingkungan RT.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Link Cepat</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#features">Fitur</a></li>
                        <li><a href="#how-it-works">Cara Kerja</a></li>
                        <li><a href="#testimonials">Testimoni</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Kontak Kami</h3>
                    <ul class="contact-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Merdeka No. 123, Kelurahan Sejahtera, Kecamatan Bahagia</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>(021) 1234-5678</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>info@sipir-rt.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 SIPIR - Sistem Informasi Pengaduan Infrastruktur RT. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        document.querySelector('.mobile-menu').addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            const navButtons = document.querySelector('.nav-buttons');
            
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            navButtons.style.display = navButtons.style.display === 'flex' ? 'none' : 'flex';
            
            if (window.innerWidth <= 768) {
                if (navLinks.style.display === 'flex') {
                    navLinks.style.flexDirection = 'column';
                    navLinks.style.position = 'absolute';
                    navLinks.style.top = '100%';
                    navLinks.style.left = '0';
                    navLinks.style.right = '0';
                    navLinks.style.background = 'white';
                    navLinks.style.padding = '1rem';
                    navLinks.style.boxShadow = '0 5px 10px rgba(0,0,0,0.1)';
                    
                    navButtons.style.flexDirection = 'column';
                    navButtons.style.position = 'absolute';
                    navButtons.style.top = 'calc(100% + 180px)';
                    navButtons.style.left = '0';
                    navButtons.style.right = '0';
                    navButtons.style.background = 'white';
                    navButtons.style.padding = '1rem';
                    navButtons.style.boxShadow = '0 5px 10px rgba(0,0,0,0.1)';
                }
            }
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (window.innerWidth <= 768) {
                        document.querySelector('.nav-links').style.display = 'none';
                        document.querySelector('.nav-buttons').style.display = 'none';
                    }
                }
            });
        });
    </script>
</body>
</html>