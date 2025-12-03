<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan - SIPIR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            overflow-x: hidden;
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
        
        /* Main Content */
        .main-container {
            display: flex;
            min-height: 100vh;
        }
        
        .content-wrapper {
            flex: 1;
            padding: 2rem;
            width: calc(100% - 280px);
            background-color: var(--light);
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            border: 1px solid var(--light-gray);
        }
        
        .header {
            margin-bottom: 2.5rem;
        }
        
        .meta-info {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .author-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 1rem;
            font-size: 1.1rem;
        }
        
        .author-info {
            display: flex;
            flex-direction: column;
        }
        
        .author-name {
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
        }
        
        .post-date {
            font-size: 0.875rem;
            color: var(--gray);
        }
        
        .title {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .status-completed {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            color: var(--secondary);
            border: 1px solid var(--secondary);
        }
        
        .status-progress {
            background: linear-gradient(135deg, #fffbeb, #fef3c7);
            color: var(--accent);
            border: 1px solid var(--accent);
        }
        
        .status-pending {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .subtitle {
            font-size: 1.25rem;
            color: var(--gray);
            margin-bottom: 2rem;
            font-weight: 400;
            line-height: 1.5;
        }
        
        .featured-image {
            width: 100%;
            height: 400px;
            background-color: var(--light);
            border-radius: 8px;
            margin-bottom: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            font-size: 1.125rem;
            overflow: hidden;
            border: 1px solid var(--light-gray);
        }
        
        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .content {
            font-size: 1.125rem;
            line-height: 1.8;
            color: var(--dark);
            margin-bottom: 2.5rem;
        }
        
        .content p {
            margin-bottom: 1.5rem;
        }
        
        .divider {
            height: 1px;
            background-color: var(--light-gray);
            margin: 2.5rem 0;
        }
        
        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }
        
        .tag {
            background-color: var(--light);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            color: var(--gray);
            border: 1px solid var(--light-gray);
        }
        
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--light-gray);
        }
        
        .action-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--light-gray);
            color: var(--gray);
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .stats {
            display: flex;
            gap: 1.5rem;
            color: var(--gray);
            font-size: 0.875rem;
        }
        
        .stat {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .attachment-section {
            margin: 2.5rem 0;
            padding: 1.5rem;
            background-color: var(--light);
            border-radius: 8px;
            border: 1px solid var(--light-gray);
        }
        
        .attachment-section h3 {
            margin-bottom: 1rem;
            font-size: 1.125rem;
            color: var(--dark);
            font-weight: 600;
        }
        
        .attachment-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        
        .attachment-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .attachment-item:last-child {
            border-bottom: none;
        }
        
        .attachment-icon {
            margin-right: 1rem;
            color: var(--primary);
            font-size: 1.25rem;
        }
        
        .attachment-name {
            flex-grow: 1;
            font-size: 1rem;
            color: var(--dark);
        }
        
        .attachment-download {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s;
        }
        
        .attachment-download:hover {
            color: var(--primary-dark);
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }
            
            #sidebar {
                width: 100%;
                min-height: auto;
                position: fixed;
                transform: translateX(-100%);
                transition: transform 0.3s;
                z-index: 1000;
            }
            
            #sidebar.show {
                transform: translateX(0);
            }
            
            .content-wrapper {
                width: 100%;
                padding: 1rem;
            }
            
            .container {
                padding: 1.5rem;
            }
            
            .title {
                font-size: 1.75rem;
            }
            
            .subtitle {
                font-size: 1.125rem;
            }
            
            .featured-image {
                height: 250px;
            }
            
            .content {
                font-size: 1rem;
            }
            
            .actions {
                flex-direction: column;
                gap: 1.5rem;
                align-items: flex-start;
            }
            
            .action-buttons {
                width: 100%;
                justify-content: space-between;
            }
            
            .btn {
                flex: 1;
                justify-content: center;
            }
            
            .mobile-menu-btn {
                display: block !important;
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 1001;
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
    <div class="main-container">

        <!-- Main Content -->
        <div class="content-wrapper">
            <div class="container">
                <div class="header">
                    <div class="meta-info">
                        <div class="author-avatar">
                            {{ substr($report->user->name, 0, 2) }}
                        </div>
                        <div class="author-info">
                            <span class="author-name">{{ $report->user->name }}</span>
                            <span class="author-name">{{ $report->tanggal_laporan }}</span>
                        </div>
                    </div>
                    
                    <h1 class="title">{{ $report->judul_laporan }}</h1>
                    
                    <!-- Status Badge -->
                    @if($report->status === 'completed')
                        <div class="status-badge status-completed">
                            <i class="fas fa-check-circle"></i>
                            <span>Selesai Diproses</span>
                        </div>
                    @elseif($report->status === 'progress')
                        <div class="status-badge status-progress">
                            <i class="fas fa-cog"></i>
                            <span>Sedang Diproses</span>
                        </div>
                    @else
                        <div class="status-badge status-pending">
                            <i class="fas fa-clock"></i>
                            <span>Menunggu Tindakan</span>
                        </div>
                    @endif
                    
                    <p class="subtitle">Laporan lengkap mengenai masalah infrastruktur yang dilaporkan beserta detail dan dokumentasi pendukung.</p>
                    
                    <div class="tags">
                        <span class="tag">Infrastruktur</span>
                        <span class="tag">Laporan Warga</span>
                        <span class="tag">{{ $report->kategori ?? 'Umum' }}</span>
                        <span class="tag">Prioritas {{ $report->status === 'pending' ? 'Tinggi' : 'Sedang' }}</span>
                    </div>
                </div>
                
                <div class="featured-image">
                    @if($report->foto_bukti)
                        <img src="{{ $report->foto_bukti ? Storage::url($report->foto_bukti) : asset('image/Wa.jpg') }}" alt="Foto Laporan">
                    @else
                        <div class="d-flex flex-column align-items-center">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <span>Tidak ada foto terlampir</span>
                        </div>
                    @endif
                </div>
                
                <div class="content">
                    <p>{!! $report->isi_laporan !!}</p>
                    
                    @if($report->lokasi)
                        <div class="mt-4">
                            <h4><i class="fas fa-map-marker-alt text-primary me-2"></i> Lokasi</h4>
                            <p>{{ $report->lokasi }}</p>
                        </div>
                    @endif
                </div>
                
                <!-- Attachments Section -->
                @if($report->foto || $report->dokumen_pendukung)
                <div class="attachment-section">
                    <h3><i class="fas fa-paperclip me-2"></i> Lampiran</h3>
                    <ul class="attachment-list">
                        @if($report->foto)
                        <li class="attachment-item">
                            <i class="fas fa-image attachment-icon"></i>
                            <span class="attachment-name">Foto Bukti</span>
                            <a href="{{ $report->foto_bukti ? Storage::url($report->foto_bukti) : asset('image/Wa.jpg') }}" class="attachment-download" download>
                                <i class="fas fa-download"></i> Unduh
                            </a>
                        </li>
                        @endif
                        @if($report->dokumen_pendukung)
                        <li class="attachment-item">
                            <i class="fas fa-file-pdf attachment-icon"></i>
                            <span class="attachment-name">Dokumen Pendukung</span>
                            <a href="{{ asset('storage/' . $report->dokumen_pendukung) }}" class="attachment-download" download>
                                <i class="fas fa-download"></i> Unduh
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                @endif
                
                <div class="divider"></div>
                
                <div class="actions">
                    <div class="action-buttons">
                        <a href="{{ route('daftar-laporan') }}" class="btn btn-outline border border-dark">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        {{-- <button class="btn btn-outline">
                            <i class="far fa-bookmark"></i> Simpan
                        </button> --}}
                            @if ($report->user_id == auth()->id())
                                    <a href="{{ url('/edit-laporan/' . $report->id_laporan) }}" class="btn btn-sm border border-dark">
                                        Edit
                                    </a>
                                @endif
                    </div>
                    
                    {{-- <div class="stats">
                        <div class="stat">
                            <i class="far fa-eye"></i>
                            <span>{{ $report->views ?? 0 }} dilihat</span>
                        </div>
                        <div class="stat">
                            <i class="far fa-comment"></i>
                            <span>{{ $report->comments_count ?? 0 }} komentar</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Modal Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLogoutLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle text-warning me-3" style="font-size: 1.5rem;"></i>
                        <p class="mb-0">Apakah Anda yakin ingin keluar dari sistem?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="{{ route('logout') }}" class="btn btn-primary">Ya, Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
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