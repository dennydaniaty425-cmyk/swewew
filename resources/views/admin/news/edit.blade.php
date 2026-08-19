@extends('admin.admin-layout')

@section('title', 'Edit Berita | Admin Dashboard')

@section('content')
    <main class="admin-container">
        <div class="admin-form-container">
            <div class="admin-form-header">
                <h1>Edit Berita</h1>
                <p>Perbarui foto atau video dan deskripsi berita</p>
            </div>

            <a href="{{ route('admin.news.index') }}" class="admin-back-btn">← Kembali ke Daftar Berita</a>

            <div class="form-box">
                <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="media">Upload Foto / Video</label>
                        <input type="file" id="media" name="media" accept="image/*,video/*">

                        <div id="media-preview-wrapper" class="media-preview-wrapper" style="margin-top: 12px;">
                            @if($news->media_type === 'video')
                                <video id="media-preview-video" controls muted class="media-preview" style="width: 100%; max-height: 260px; background: #000; border-radius: 10px;">
                                    <source src="{{ asset($news->media_url) }}" type="video/mp4">
                                </video>
                                <img id="media-preview-image" src="" alt="Preview media" class="media-preview" style="display: none;">
                            @else
                                <img id="media-preview-image" src="{{ asset($news->media_url) }}" alt="Preview media" class="media-preview">
                                <video id="media-preview-video" controls muted class="media-preview" style="display: none; width: 100%; max-height: 260px; background: #000; border-radius: 10px;"></video>
                            @endif
                        </div>
                        <small style="color: var(--apotek-muted); display: block; margin-top: 8px;">Biarkan kosong jika tidak ingin mengganti media saat ini.</small>
                        @error('media')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gallery">Foto Carousel Tambahan (Opsional)</label>
                        <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple>
                        <small style="color: var(--apotek-muted); display: block; margin-top: 8px;">Upload foto baru untuk menggantikan galeri berita. Jika kosong, galeri lama tetap dipakai.</small>
                        @error('gallery')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi *</label>
                        <textarea id="description" name="description" rows="5" required>{{ old('description', $news->description) }}</textarea>
                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="order">Urutan Tampilan (Opsional)</label>
                        <input type="number" id="order" name="order" value="{{ old('order', $news->order) }}" min="0">
                        @error('order')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ $news->is_active ? 'checked' : '' }}>
                        <label for="is_active" style="margin: 0;">Aktifkan berita ini</label>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Perbarui Berita</button>
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

        if (mediaInput && mediaPreviewImage && mediaPreviewVideo) {
            mediaInput.addEventListener('change', function () {
                const file = this.files && this.files[0];

                if (!file) {
                    return;
                }

                const isVideo = file.type.startsWith('video/');

                if (isVideo) {
                    mediaPreviewImage.style.display = 'none';
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        mediaPreviewVideo.src = event.target.result;
                        mediaPreviewVideo.style.display = 'block';
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
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
@endsection
