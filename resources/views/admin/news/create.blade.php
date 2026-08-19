@extends('admin.admin-layout')

@section('title', 'Tambah Berita | Admin Dashboard')

@section('content')
    <main class="admin-container">
        <div class="admin-form-container">
            <div class="admin-form-header">
                <h1>Tambah Berita Baru</h1>
                <p>Masukkan foto atau video beserta deskripsi untuk ditampilkan di halaman utama</p>
            </div>

            <a href="{{ route('admin.news.index') }}" class="admin-back-btn">← Kembali ke Daftar Berita</a>

            <div class="form-box">
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="media">Upload Foto / Video *</label>
                        <input type="file" id="media" name="media" accept="image/*,video/*" required>
                        <div id="media-preview-wrapper" class="media-preview-wrapper" style="display: none; margin-top: 12px;">
                            <img id="media-preview-image" src="" alt="Preview media" class="media-preview" style="display: none;">
                            <video id="media-preview-video" controls muted class="media-preview" style="display: none; width: 100%; max-height: 260px; background: #000; border-radius: 10px;"></video>
                        </div>
                        <small style="color: var(--apotek-muted); display: block; margin-top: 8px;">Dapat menggunakan gambar (.jpg .png .webp) atau video (.mp4 .webm .ogg).</small>
                        @error('media')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gallery">Foto Carousel Tambahan (Opsional)</label>
                        <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple>
                        <small style="color: var(--apotek-muted); display: block; margin-top: 8px;">Bisa memilih lebih dari satu foto untuk slide galeri berita.</small>
                        @error('gallery')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi *</label>
                        <textarea id="description" name="description" rows="5" placeholder="Tulis deskripsi singkat berita..." required>{{ old('description') }}</textarea>
                        @error('description')
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
                        <label for="is_active" style="margin: 0;">Aktifkan berita ini</label>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan Berita</button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <style>
        .media-preview-wrapper {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--apotek-border);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.02);
        }

        .media-preview {
            width: 100%;
            max-height: 260px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
            border: 1px solid rgba(57, 208, 207, 0.2);
        }
    </style>

    <script>
        const mediaInput = document.getElementById('media');
        const mediaPreviewImage = document.getElementById('media-preview-image');
        const mediaPreviewVideo = document.getElementById('media-preview-video');
        const mediaPreviewWrapper = document.getElementById('media-preview-wrapper');

        if (mediaInput && mediaPreviewImage && mediaPreviewVideo && mediaPreviewWrapper) {
            mediaInput.addEventListener('change', function () {
                const file = this.files && this.files[0];

                if (!file) {
                    mediaPreviewWrapper.style.display = 'none';
                    mediaPreviewImage.style.display = 'none';
                    mediaPreviewVideo.style.display = 'none';
                    mediaPreviewVideo.src = '';
                    mediaPreviewImage.src = '';
                    return;
                }

                const isVideo = file.type.startsWith('video/');

                if (isVideo) {
                    mediaPreviewImage.style.display = 'none';
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        mediaPreviewVideo.src = event.target.result;
                        mediaPreviewVideo.style.display = 'block';
                        mediaPreviewWrapper.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                    return;
                }

                mediaPreviewVideo.style.display = 'none';
                mediaPreviewVideo.src = '';
                const reader = new FileReader();
                reader.onload = function (event) {
                    mediaPreviewImage.src = event.target.result;
                    mediaPreviewImage.style.display = 'block';
                    mediaPreviewWrapper.style.display = 'block';
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
@endsection
