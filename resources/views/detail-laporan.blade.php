<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan - Medium Style</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 740px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .header {
            margin-bottom: 40px;
        }
        
        .meta-info {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
            font-size: 14px;
            color: #6b6b6b;
        }
        
        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 12px;
        }
        
        .author-info {
            display: flex;
            flex-direction: column;
        }
        
        .author-name {
            font-weight: 600;
            color: #333;
        }
        
        .post-date {
            font-size: 13px;
            color: #6b6b6b;
        }
        
        .title {
            font-size: 36px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #242424;
        }
        
        .subtitle {
            font-size: 20px;
            color: #6b6b6b;
            margin-bottom: 30px;
            font-weight: 400;
            line-height: 1.4;
        }
        
        .featured-image {
            width: 100%;
            height: 400px;
            background-color: #e0e0e0;
            border-radius: 4px;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-size: 18px;
            overflow: hidden;
        }
        
        .content {
            font-size: 18px;
            line-height: 1.8;
            color: #242424;
        }
        
        .content p {
            margin-bottom: 24px;
        }
        
        .content h2 {
            font-size: 24px;
            margin: 40px 0 20px;
            font-weight: 600;
            color: #242424;
        }
        
        .content h3 {
            font-size: 20px;
            margin: 30px 0 15px;
            font-weight: 600;
            color: #242424;
        }
        
        .content blockquote {
            border-left: 4px solid #e0e0e0;
            padding-left: 20px;
            margin: 30px 0;
            font-style: italic;
            color: #6b6b6b;
        }
        
        .content ul, .content ol {
            margin: 20px 0;
            padding-left: 30px;
        }
        
        .content li {
            margin-bottom: 10px;
        }
        
        .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 40px 0;
        }
        
        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }
        
        .tag {
            background-color: #f2f2f2;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            color: #6b6b6b;
        }
        
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid #e0e0e0;
            color: #6b6b6b;
        }
        
        .btn-primary {
            background-color: #242424;
            color: white;
        }
        
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .stats {
            display: flex;
            gap: 20px;
            color: #6b6b6b;
            font-size: 14px;
        }
        
        .stat {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .attachment-section {
            margin: 40px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        
        .attachment-section h3 {
            margin-bottom: 15px;
            font-size: 18px;
        }
        
        .attachment-list {
            list-style-type: none;
        }
        
        .attachment-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .attachment-item:last-child {
            border-bottom: none;
        }
        
        .attachment-icon {
            margin-right: 12px;
            color: #6b6b6b;
            font-size: 18px;
        }
        
        .attachment-name {
            flex-grow: 1;
            font-size: 16px;
        }
        
        .attachment-download {
            color: #242424;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }
            
            .title {
                font-size: 28px;
            }
            
            .subtitle {
                font-size: 18px;
            }
            
            .featured-image {
                height: 250px;
            }
            
            .content {
                font-size: 16px;
            }
            
            .actions {
                flex-direction: column;
                gap: 20px;
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
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="meta-info">
                <div class="author-avatar">AF</div>
                <div class="author-info">
                    <span class="author-name">{{ $report->user->name }}</span>
                    <span class="post-date">{{ $report->tanggal_laporan }} · 8 min read</span>
                </div>
            </div>
            
            <h1 class="title">{{ $report->judul_laporan }} </h1>
            
            <p class="subtitle">Laporan lengkap mengenai kerusakan infrastruktur jembatan yang menghubungkan Desa Sukamaju dan Desa Sukarami beserta rencana penanganannya.</p>
            
            <div class="tags">
                <span class="tag">Infrastruktur</span>
                <span class="tag">Jembatan</span>
                <span class="tag">Desa Sukamaju</span>
                <span class="tag">Prioritas Tinggi</span>
            </div>
        </div>
        
        <div class="featured-image">
            <i class="fas fa-image fa-3x"></i>
            <img src="{{ asset('image/Wa.jpg') }}" >
            <span style="margin-left: 10px;">Gambar Jembatan yang Rusak</span>
        </div>
        
        <div class="content">
            <p>{{ $report->isi_laporan }}</p>
            <p>Jembatan penghubung antara Desa Sukamaju dan Desa Sukarami mengalami kerusakan parah pada bagian struktur penyangga. Kerusakan ini terjadi akibat banjir bandang yang melanda daerah tersebut seminggu yang lalu. Saat ini, akses transportasi antara kedua desa terputus total, mengganggu aktivitas ekonomi dan sosial warga.</p>
            
            <p>Kerusakan terlihat pada pilar jembatan bagian tengah yang retak dan miring sekitar 15 derajat. Permukaan jembatan juga sudah tidak rata dan berpotensi membahayakan pengendara jika dipaksakan untuk dilintasi.</p>
            
            <h2>Dampak Kerusakan</h2>
            
            <p>Akibat putusnya akses transportasi ini, beberapa masalah serius telah muncul:</p>
            
            <ul>
                <li>Akses siswa ke sekolah terhambat, dengan 45 siswa dari Desa Sukarami harus menempuh jarak 12 km lebih jauh untuk mencapai sekolah di Desa Sukamaju</li>
                <li>Distribusi hasil pertanian terhambat, menyebabkan penurunan pendapatan petani</li>
                <li>Layanan kesehatan darurat terganggu karena akses terdekat ke puskesmas terputus</li>
                <li>Aktivitas perdagangan antara kedua desa terhenti total</li>
            </ul>
            
            <blockquote>
                "Kerusakan jembatan ini telah mengisolasi dua desa yang sebelumnya memiliki hubungan ekonomi dan sosial yang erat. Penanganan segera sangat dibutuhkan untuk memulihkan aktivitas warga."
            </blockquote>
            
            <h2>Langkah Penanganan</h2>
            
            <p>Tim teknis telah melakukan assessment mendalam terhadap kerusakan jembatan dan menyusun rencana penanganan sebagai berikut:</p>
            
            <ol>
                <li>Pemasangan rambu dan pembatas area untuk mencegah akses ke jembatan yang rusak</li>
                <li>Pembangunan jembatan darurat sementara untuk akses pedestrian dan sepeda motor</li>
                <li>Perbaikan struktur jembatan utama dengan metode perkuatan dan penggantian komponen yang rusak</li>
                <li>Pengawasan ketat selama proses perbaikan untuk memastikan standar keamanan</li>
            </ol>
            
            <p>Proses perbaikan diperkirakan akan memakan waktu 7-10 hari, dengan anggaran yang telah disetujui sebesar Rp 185 juta dari dana darurat infrastruktur daerah.</p>
            
            <div class="attachment-section">
                <h3><i class="fas fa-paperclip"></i> Lampiran Dokumen</h3>
                <ul class="attachment-list">
                    <li class="attachment-item">
                        <span class="attachment-icon"><i class="far fa-image"></i></span>
                        <span class="attachment-name">foto_kerusakan_jembatan_1.jpg</span>
                        <a href="#" class="attachment-download">Unduh <i class="fas fa-download"></i></a>
                    </li>
                    <li class="attachment-item">
                        <span class="attachment-icon"><i class="far fa-image"></i></span>
                        <span class="attachment-name">foto_kerusakan_jembatan_2.jpg</span>
                        <a href="#" class="attachment-download">Unduh <i class="fas fa-download"></i></a>
                    </li>
                    <li class="attachment-item">
                        <span class="attachment-icon"><i class="far fa-file-pdf"></i></span>
                        <span class="attachment-name">laporan_teknis_kerusakan.pdf</span>
                        <a href="#" class="attachment-download">Unduh <i class="fas fa-download"></i></a>
                    </li>
                    <li class="attachment-item">
                        <span class="attachment-icon"><i class="far fa-file-alt"></i></span>
                        <span class="attachment-name">rencana_anggaran_biaya.xlsx</span>
                        <a href="#" class="attachment-download">Unduh <i class="fas fa-download"></i></a>
                    </li>
                </ul>
            </div>
            
            <h2>Kronologi Kejadian</h2>
            
            <p>Kerusakan jembatan ini bermula dari banjir bandang yang melanda kawasan tersebut pada tanggal 8 Oktober 2023. Debit air yang tinggi dan membawa material kayu serta sampah menyebabkan tekanan berlebihan pada struktur jembatan.</p>
            
            <p>Warga pertama kali melaporkan keretakan pada pilar jembatan pada tanggal 10 Oktober 2023. Dua hari kemudian, terjadi kemiringan yang signifikan pada struktur jembatan, sehingga akses kendaraan ditutup total untuk alasan keamanan.</p>
            
            <p>Tim assessment dari Dinas Pekerjaan Umum tiba pada tanggal 13 Oktober 2023 dan langsung melakukan evaluasi menyeluruh terhadap kondisi jembatan.</p>
        </div>
        
        <div class="divider"></div>
        
        <div class="actions">
            <div class="action-buttons">
                <button class="btn btn-outline">
                    <i class="far fa-bookmark"></i> Simpan
                </button>
                <button class="btn btn-outline">
                    <i class="fas fa-share-alt"></i> Bagikan
                </button>
            </div>
            
            <div class="stats">
                <div class="stat">
                    <i class="far fa-eye"></i>
                    <span>1.2k dilihat</span>
                </div>
                <div class="stat">
                    <i class="far fa-comment"></i>
                    <span>24 komentar</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>