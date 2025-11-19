<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, sans-serif;
        }

        body {
            background: #f5f6f7;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 520px;
            background: white;
            padding: 32px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 600;
        }

        .form-group { margin-bottom: 25px; }

        label {
            font-size: 14px;
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #444;
        }

        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            resize: vertical;
            min-height: 120px;
        }

        .char-count {
            text-align: right;
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }

        #deskripsiError {
            color: red;
            font-size: 12px;
            margin-top: 4px;
            display: none;
        }

        .file-upload {
            padding: 20px;
            border: 2px dashed #ccc;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            background: #fafafa;
        }

        .file-input { display: none; }

        .preview-container {
            margin-top: 12px;
            display: none;
        }

        .preview-image {
            max-width: 100%;
            border-radius: 6px;
            max-height: 200px;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        button {
            padding: 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
        }

        .btn-submit { background: #1d1d1d; color: white; }
        .btn-submit:hover { background: #333; }

        .btn-reset {
            background: #efefef;
            border: 1px solid #ddd;
        }
        .btn-reset:hover { background: #e4e4e4; }

    </style>
</head>

<body>

<div class="container">

    <h1>Edit Laporan</h1>

    <form id="laporanForm" action="{{ route('edit-laporan.post', ['id' => $report->id_laporan]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- DESKRIPSI -->
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" maxlength="500" required>{!! $report->isi_laporan !!}</textarea>

            <div class="char-count"><span id="charCount">0</span>/500</div>
            <div id="deskripsiError">Deskripsi tidak boleh kosong.</div>
        </div>

        <!-- FOTO -->
        <div class="form-group">
            <label for="foto">Lampiran Foto (Opsional)</label>

            <div class="file-upload" onclick="document.getElementById('foto').click()">
                📷 <br>
                Klik untuk memilih foto
            </div>

            <input type="file" id="foto" name="foto" class="file-input" accept="image/*">

            <!-- FOTO EXISTING -->
            @if ($report->foto_bukti)
                <div class="preview-container" style="display:block;">
                    <p style="font-size: 13px; margin-bottom: 5px;">Foto saat ini:</p>
                    <img src="{{ Storage::url($report->foto_bukti) }}" class="preview-image">
                </div>
            @endif

            <!-- PREVIEW FOTO BARU -->
            <div class="preview-container" id="previewContainer">
                <img src="" id="previewImage" class="preview-image">
            </div>
        </div>

        <div class="btn-group">
            <button type="reset" class="btn-reset">Reset</button>
            <button type="submit" class="btn-submit">Simpan</button>
        </div>

    </form>

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

<script>
    let editor;
    const charCount = document.getElementById('charCount');
    const deskripsiError = document.getElementById('deskripsiError');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');

    // CKEditor
    ClassicEditor.create(document.querySelector('#deskripsi')).then(newEditor => {
        editor = newEditor;

        // Hitung karakter awal
        const initialText = editor.getData().replace(/<[^>]*>/g, '');
        charCount.textContent = initialText.length;

        editor.model.document.on('change:data', () => {
            const data = editor.getData();
            const textContent = data.replace(/<[^>]*>/g, '');
            charCount.textContent = textContent.length;

            if (textContent.trim().length > 0) {
                deskripsiError.style.display = 'none';
            }
        });
    });

    // Preview gambar baru
    document.getElementById('foto').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return previewContainer.style.display = 'none';

        if (file.size > 5 * 1024 * 1024) {
            alert("Ukuran foto maksimal 5MB.");
            this.value = "";
            return;
        }

        const reader = new FileReader();
        reader.onload = e => {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'block';
        };
        reader.readAsDataURL(file);
    });

    // Submit validasi
    document.getElementById('laporanForm').addEventListener('submit', function (e) {
        const text = editor.getData().replace(/<[^>]*>/g, '');

        if (text.trim().length === 0) {
            e.preventDefault();
            deskripsiError.style.display = 'block';
            return;
        }

        // Set data ke textarea
        document.getElementById('deskripsi').value = editor.getData();
    });

    // Reset form
    document.getElementById('laporanForm').addEventListener('reset', function () {
        if (editor) editor.setData('');
        charCount.textContent = 0;
        deskripsiError.style.display = 'none';
        previewContainer.style.display = 'none';
    });
</script>

</body>
</html>
