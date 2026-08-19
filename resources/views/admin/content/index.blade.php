@extends('admin.admin-layout')

@section('title', 'Kontrol Konten | Admin Dashboard')

@section('content')
    <main class="admin-container">
        <div class="admin-form-container">
            <div class="admin-form-header">
                <h1>Kontrol Konten</h1>
                <p>Kelola konten halaman website Apotek Alfa</p>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="admin-back-btn">← Kembali ke Dashboard</a>

            <div class="form-box">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <h2 style="margin: 0; font-size: 1.4rem;">Daftar Konten</h2>
                    <a href="{{ route('admin.content.create') }}" class="btn btn-primary">+ Tambah Konten</a>
                </div>

                @if(session('success'))
                    <div style="background-color: #d4edda; color: #155724; padding: 12px 16px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                        {{ session('success') }}
                    </div>
                @endif

                @if($contents->isEmpty())
                    <p style="color: var(--apotek-muted); text-align: center; padding: 40px;">
                        Belum ada konten. <a href="{{ route('admin.content.create') }}" style="color: var(--apotek-primary);">Tambahkan konten halaman</a>
                    </p>
                @else
                    <div style="display: grid; gap: 16px;">
                        @foreach($contents as $content)
                            <div style="border: 1px solid var(--apotek-border); border-radius: 12px; padding: 16px; background: rgba(255,255,255,0.02);">
                                <div style="display: grid; grid-template-columns: 220px 1fr auto; gap: 16px; align-items: center;">
                                    <div>
                                        @if($content->media_type === 'video' && $content->media_url)
                                            <video src="{{ asset($content->media_url) }}" muted autoplay loop playsinline style="width: 100%; height: 120px; object-fit: cover; border-radius: 8px; background: #000;"></video>
                                        @elseif($content->gallery)
                                            <img src="{{ asset(optional($content->gallery)[0] ?? $content->media_url) }}" alt="Preview carousel" style="width: 100%; height: 120px; object-fit: cover; border-radius: 8px;">
                                        @elseif($content->media_url)
                                            <img src="{{ asset($content->media_url) }}" alt="Preview konten" style="width: 100%; height: 120px; object-fit: cover; border-radius: 8px;">
                                        @else
                                            <div style="width: 100%; height: 120px; border-radius: 8px; background: rgba(255,255,255,0.04); display: flex; align-items: center; justify-content: center; color: var(--apotek-muted);">No media</div>
                                        @endif
                                    </div>

                                    <div>
                                        <div style="font-size: 12px; color: var(--apotek-muted); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.08em;">
                                            {{ $content->media_type === 'video' ? 'Video' : 'Foto Carousel' }}
                                        </div>
                                        <div style="font-weight: 700; margin-bottom: 8px;">
                                            {{ $content->description ?: 'Tanpa deskripsi' }}
                                        </div>
                                        <div style="font-size: 12px; color: var(--apotek-muted);">
                                            Foto tampil: {{ $content->carousel_count ?? count($content->gallery ?? []) }}
                                        </div>
                                    </div>

                                    <div style="display: flex; gap: 8px; align-items: center;">
                                        <a href="{{ route('admin.content.edit', $content) }}" style="background-color: var(--apotek-primary); color: var(--apotek-text); padding: 8px 12px; border-radius: 4px; text-decoration: none; font-size: 12px;">Edit</a>
                                        <form action="{{ route('admin.content.destroy', $content) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus konten ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background-color: #dc3545; color: white; padding: 8px 12px; border-radius: 4px; border: none; cursor: pointer; font-size: 12px;">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
