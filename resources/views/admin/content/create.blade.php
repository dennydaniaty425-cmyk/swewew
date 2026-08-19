@extends('admin.admin-layout')

@section('title', 'Tambah Konten | Admin Dashboard')

@section('content')
    <main class="admin-container">
        <div class="admin-form-container">
            <div class="admin-form-header">
                <h1>Tambah Konten</h1>
                <p>Tambahkan data konten halaman website Apotek Alfa</p>
            </div>

            <a href="{{ route('admin.content.index') }}" class="admin-back-btn">← Kembali ke Daftar Konten</a>

            <div class="form-box">
                <form action="{{ route('admin.content.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Pilih Jenis Media *</label>
                        <div class="media-type-options">
                            <label class="media-option">
                                <input type="radio" name="media_type" value="video" checked>
                                <span>Video</span>
                            </label>
                            <label class="media-option">
                                <input type="radio" name="media_type" value="carousel">
                                <span>Foto Carousel</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="video-upload-group">
                        <label for="video">Upload Video *</label>
                        <input type="file" id="video" name="video" accept="video/*">
                        <div id="video-preview-wrapper" class="media-preview-wrapper" style="display: none; margin-top: 12px;">
                            <video id="video-preview" controls muted playsinline style="width: 100%; max-height: 240px; border-radius: 10px; background: #000;"></video>
                        </div>
                        @error('video')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="image-upload-group" style="display: none;">
                        <label for="images">Upload Foto Carousel *</label>
                        <input type="file" id="images" name="images[]" accept="image/*" multiple>
                        <div id="image-preview-wrapper" class="media-preview-wrapper" style="display: none; margin-top: 12px; display: grid; grid-template-columns: repeat(auto-fit, minmax(110px, 1fr)); gap: 10px;">
                        </div>
                        @error('images')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi Berita *</label>
                        <textarea id="description" name="description" rows="4" placeholder="Tulis deskripsi singkat untuk berita..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="carousel_count">Jumlah Foto Yang Tampil</label>
                        <input type="number" id="carousel_count" name="carousel_count" value="{{ old('carousel_count', 3) }}" min="1" max="10" placeholder="3">
                        @error('carousel_count')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                        <label for="is_active" style="margin: 0;">Aktifkan konten ini</label>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan Konten</button>
                        <a href="{{ route('admin.content.index') }}" class="btn btn-secondary">Batal</a>
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

        .media-type-options {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .media-option {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border: 1px solid var(--apotek-border);
            border-radius: 8px;
            background: rgba(255,255,255,0.02);
            cursor: pointer;
        }

        .media-option input {
            accent-color: var(--apotek-primary);
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group input[type="file"] {
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

        .btn-primary:hover {
            background-color: #2eb0ae;
        }

        .btn-secondary {
            background-color: var(--apotek-muted);
            color: var(--apotek-text);
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #666;
        }

        .media-preview-wrapper {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--apotek-border);
            border-radius: 12px;
            background: rgba(255,255,255,0.02);
        }

        .media-preview-thumb {
            display: block;
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(57,208,207,0.2);
        }
    </style>

    <script>
        const mediaTypeInputs = document.querySelectorAll('input[name="media_type"]');
        const videoUploadGroup = document.getElementById('video-upload-group');
        const imageUploadGroup = document.getElementById('image-upload-group');
        const videoInput = document.getElementById('video');
        const videoPreview = document.getElementById('video-preview');
        const videoPreviewWrapper = document.getElementById('video-preview-wrapper');
        const imageInput = document.getElementById('images');
        const imagePreviewWrapper = document.getElementById('image-preview-wrapper');

        mediaTypeInputs.forEach(function (input) {
            input.addEventListener('change', function () {
                const isVideo = this.value === 'video';
                videoUploadGroup.style.display = isVideo ? 'block' : 'none';
                imageUploadGroup.style.display = isVideo ? 'none' : 'block';
            });
        });

        if (videoInput && videoPreview) {
            videoInput.addEventListener('change', function () {
                const file = this.files && this.files[0];
                if (!file) {
                    videoPreviewWrapper.style.display = 'none';
                    videoPreview.src = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (event) {
                    videoPreview.src = event.target.result;
                    videoPreviewWrapper.style.display = 'block';
                };
                reader.readAsDataURL(file);
            });
        }

        if (imageInput && imagePreviewWrapper) {
            imageInput.addEventListener('change', function () {
                const files = Array.from(this.files || []);
                imagePreviewWrapper.innerHTML = '';

                if (!files.length) {
                    imagePreviewWrapper.style.display = 'none';
                    return;
                }

                files.forEach(function (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.className = 'media-preview-thumb';
                        imagePreviewWrapper.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });

                imagePreviewWrapper.style.display = 'grid';
            });
        }
    </script>
@endsection
