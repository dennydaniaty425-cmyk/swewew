@extends('admin.admin-layout')

@section('title', 'Tambah Logo Mitra | Admin Dashboard')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">

    <main class="admin-container">
        <div class="admin-form-container">
            <div class="admin-form-header">
                <h1>Tambah Logo Principal</h1>
                <p>Upload logo principal yang akan tampil di halaman Mitra Kami</p>
            </div>

            <a href="{{ route('admin.partner.index') }}" class="admin-back-btn">← Kembali ke Daftar Mitra</a>

            <div class="form-box">
                <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Principal *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: PT. Kalbe Farma" required>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="logo">Upload Logo *</label>
                        <input type="file" id="logo" name="logo" required>
                        <div id="logo-crop-wrapper" class="image-preview-wrapper crop-wrapper" style="display: none; margin-top: 12px;">
                            <div class="crop-container">
                                <img id="logo-crop-image" src="" alt="Atur crop logo mitra">
                            </div>
                            <div class="crop-actions">
                                <button type="button" id="crop-reset" class="crop-btn">Reset Crop</button>
                                <span>Geser dan zoom foto, lalu simpan.</span>
                            </div>
                        </div>
                        <small style="color: var(--apotek-muted); display: block; margin-top: 8px;">Logo hanya untuk principal/mitra, file akan tersimpan di folder storage/partners.</small>
                        @error('logo')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="order">Urutan Tampilan (Opsional)</label>
                        <input type="number" id="order" name="order" value="{{ old('order', 0) }}" placeholder="0" min="0">
                        @error('order')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                        <label for="is_active" style="margin: 0;">Aktifkan logo ini</label>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan Logo</button>
                        <a href="{{ route('admin.partner.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <style>
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--apotek-text);
        }
        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--apotek-border);
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            background-color: #ffffff;
            color: #111827;
            box-sizing: border-box;
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus {
            outline: none;
            border-color: var(--apotek-primary);
            box-shadow: 0 0 0 2px rgba(57, 208, 207, 0.1);
        }
        .error-message {
            color: #dc3545;
            font-size: 12px;
            display: block;
            margin-top: 5px;
        }
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--apotek-border);
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: var(--apotek-primary);
            color: var(--apotek-text);
        }
        .btn-secondary {
            background-color: var(--apotek-muted);
            color: var(--apotek-text);
            text-decoration: none;
        }
        .image-preview-wrapper {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--apotek-border);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.02);
        }
        .image-preview {
            width: 100%;
            max-height: 260px;
            object-fit: contain;
            border-radius: 10px;
            display: block;
            border: 1px solid rgba(57, 208, 207, 0.2);
            background: rgba(255,255,255,0.06);
        }
        .crop-container {
            height: 300px;
            overflow: hidden;
            background: #0b2022;
        }
        .crop-container img {
            display: block;
            max-width: 100%;
        }
        .crop-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 12px;
            color: var(--apotek-muted);
            font-size: 12px;
        }
        .crop-btn {
            border: 1px solid var(--apotek-border);
            border-radius: 6px;
            padding: 7px 12px;
            background: rgba(255,255,255,0.06);
            color: var(--apotek-text);
            cursor: pointer;
        }
    </style>

    <script>
        const logoInput = document.getElementById('logo');
        const cropWrapper = document.getElementById('logo-crop-wrapper');
        const cropImage = document.getElementById('logo-crop-image');
        const cropReset = document.getElementById('crop-reset');
        const partnerForm = logoInput.closest('form');
        let logoCropper;

        if (logoInput && cropImage && cropWrapper) {
            logoInput.addEventListener('change', function () {
                const file = this.files && this.files[0];

                if (!file) {
                    cropWrapper.style.display = 'none';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (event) {
                    if (logoCropper) {
                        logoCropper.destroy();
                    }

                    cropImage.src = event.target.result;
                    cropWrapper.style.display = 'block';
                    logoCropper = new Cropper(cropImage, {
                        aspectRatio: 16 / 9,
                        viewMode: 1,
                        autoCropArea: 0.9,
                        responsive: true,
                    });
                };

                reader.readAsDataURL(file);
            });

            cropReset.addEventListener('click', function () {
                if (logoCropper) {
                    logoCropper.reset();
                }
            });

            partnerForm.addEventListener('submit', function (event) {
                if (!logoCropper || !logoInput.files.length) {
                    return;
                }

                event.preventDefault();
                logoCropper.getCroppedCanvas({
                    maxWidth: 1600,
                    maxHeight: 900,
                    imageSmoothingQuality: 'high',
                }).toBlob(function (blob) {
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(new File([blob], 'partner-logo.jpg', { type: 'image/jpeg' }));
                    logoInput.files = dataTransfer.files;
                    partnerForm.submit();
                }, 'image/jpeg', 0.92);
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
@endsection
