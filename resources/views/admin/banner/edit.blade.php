@extends('admin.admin-layout')

@section('title', 'Edit Banner | Admin Dashboard')

@section('content')
    <main class="admin-container">
        <div class="admin-form-container">
            <div class="admin-form-header">
                <h1>Edit Banner</h1>
                <p>Ubah informasi banner yang ditampilkan di halaman utama</p>
            </div>

            <a href="{{ route('admin.banner.index') }}" class="admin-back-btn">← Kembali ke Daftar Banner</a>

            <div class="form-box">
                <form action="{{ route('admin.banner.update', $banner) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Judul Banner *</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $banner->title) }}" placeholder="Contoh: Layanan Utama Apotek" required>
                        @error('title')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Gambar Baru</label>
                        <input type="file" id="image" name="image" accept="image/*">

                        @if($banner->image_url)
                            <div id="current-image-wrapper" class="image-preview-wrapper" style="margin-top: 12px;">
                                <small style="color: var(--apotek-muted); display: block; margin-bottom: 8px;">Pratinjau gambar saat ini:</small>
                                <img src="{{ asset($banner->image_url) }}" alt="{{ $banner->title }}" class="image-preview current-image-preview">
                            </div>
                        @endif

                        <div id="image-preview-wrapper" class="image-preview-wrapper" style="display: none; margin-top: 12px;">
                            <small style="color: var(--apotek-muted); display: block; margin-bottom: 8px;">Preview baru:</small>
                            <img id="image-preview" src="" alt="Preview banner" class="image-preview">
                        </div>

                        <small style="color: var(--apotek-muted); display: block; margin-top: 8px;">Biarkan kosong jika tidak ingin mengganti gambar saat ini.</small>
                        @error('image')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="order">Urutan Tampilan (Opsional)</label>
                        <input type="number" id="order" name="order" value="{{ old('order', $banner->order) }}" placeholder="0" min="0">
                        <small style="color: var(--apotek-muted); display: block; margin-top: 8px;">Angka lebih kecil akan tampil lebih dulu</small>
                        @error('order')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $banner->is_active) ? 'checked' : '' }}>
                        <label for="is_active" style="margin: 0;">Aktifkan banner ini</label>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Perbarui Banner</button>
                        <a href="{{ route('admin.banner.index') }}" class="btn btn-secondary">Batal</a>
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
        .form-group input[type="url"],
        .form-group input[type="number"],
        .form-group textarea {
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

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #6b7280;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="url"]:focus,
        .form-group input[type="number"]:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--apotek-primary);
            box-shadow: 0 0 0 2px rgba(57, 208, 207, 0.1);
        }

        .form-group textarea {
            resize: vertical;
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
            object-fit: cover;
            border-radius: 10px;
            display: block;
            border: 1px solid rgba(57, 208, 207, 0.2);
        }
    </style>

    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const imagePreviewWrapper = document.getElementById('image-preview-wrapper');
        const currentImageWrapper = document.getElementById('current-image-wrapper');

        if (imageInput && imagePreview && imagePreviewWrapper) {
            imageInput.addEventListener('change', function () {
                const file = this.files && this.files[0];

                if (!file) {
                    imagePreviewWrapper.style.display = 'none';
                    imagePreview.src = '';
                    if (currentImageWrapper) {
                        currentImageWrapper.style.display = 'block';
                    }
                    return;
                }

                if (currentImageWrapper) {
                    currentImageWrapper.style.display = 'none';
                }

                const reader = new FileReader();
                reader.onload = function (event) {
                    imagePreview.src = event.target.result;
                    imagePreviewWrapper.style.display = 'block';
                };

                reader.readAsDataURL(file);
            });
        }
    </script>
@endsection
