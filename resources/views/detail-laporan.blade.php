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
            <span style="margin-left: 10px;">Foto bukti</span>
        </div>
        
        <div class="content">
            <p>{{ $report->isi_laporan }}</p>
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