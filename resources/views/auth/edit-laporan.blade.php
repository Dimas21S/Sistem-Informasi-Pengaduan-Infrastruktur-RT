<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, sans-serif;
        }
        body {
            background-color: #fafafa;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 100%;
            max-width: 500px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 40px 30px;
        }
        h1 {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 30px;
            text-align: center;
            color: #222;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
            font-weight: 500;
        }
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 15px;
            min-height: 120px;
            resize: vertical;
            background-color: #fcfcfc;
            transition: border 0.2s;
        }
        textarea:focus {
            outline: none;
            border-color: #888;
        }
        .file-upload {
            border: 1px dashed #e0e0e0;
            border-radius: 6px;
            padding: 25px 20px;
            text-align: center;
            background-color: #fcfcfc;
            transition: all 0.2s;
            cursor: pointer;
        }
        .file-upload:hover {
            border-color: #888;
        }
        .file-input { display: none; }
        .upload-icon {
            font-size: 24px;
            margin-bottom: 8px;
            color: #666;
        }
        .upload-text { font-size: 14px; color: #666; margin-bottom: 5px; }
        .upload-subtext { font-size: 12px; color: #999; }
        .preview-container { margin-top: 15px; display: none; }
        .preview-image {
            max-width: 100%;
            max-height: 150px;
            border-radius: 4px;
        }
        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }
        button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-submit { background-color: #222; color: white; }
        .btn-submit:hover { background-color: #333; }
        .btn-reset {
            background-color: #f5f5f5;
            color: #666;
            border: 1px solid #e0e0e0;
        }
        .btn-reset:hover { background-color: #eee; }
        .char-count {
            text-align: right;
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }
        @media (max-width: 480px) {
            .container { padding: 30px 20px; }
            h1 { font-size: 22px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buat Laporan</h1>
        
        <form id="laporanForm" action="{{ route('form-laporan.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Jelaskan laporan Anda..." maxlength="500" required></textarea>
                <div class="char-count"><span id="charCount">0</span>/500</div>
            </div>
            
            <div class="form-group">
                <label for="foto">Lampiran Foto (Opsional)</label>
                <div class="file-upload" onclick="document.getElementById('foto').click()">
                    <div class="upload-icon">📷</div>
                    <div class="upload-text">Unggah foto</div>
                    <div class="upload-subtext">Klik untuk memilih file</div>
                    <input type="file" id="foto" name="foto" class="file-input" accept="image/*">
                </div>
                <div class="preview-container" id="previewContainer">
                    <img src="" alt="Pratinjau Foto" class="preview-image" id="previewImage">
                </div>
            </div>
            
            <div class="btn-group">
                <button type="reset" class="btn-reset">Reset</button>
                <button type="submit" class="btn-submit">Kirim</button>
            </div>
        </form>
    </div>

    <script>
        const deskripsiTextarea = document.getElementById('deskripsi');
        const charCount = document.getElementById('charCount');
        const fileInput = document.getElementById('foto');
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('previewImage');

        // Hitung karakter
        deskripsiTextarea.addEventListener('input', () => {
            charCount.textContent = deskripsiTextarea.value.length;
        });

        // Preview gambar
        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 5MB.');
                    this.value = '';
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
            }
        });

        // Reset preview
        document.getElementById('laporanForm').addEventListener('reset', function() {
            charCount.textContent = '0';
            previewContainer.style.display = 'none';
        });
    </script>
</body>
</html>
