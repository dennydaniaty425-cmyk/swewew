@extends('admin.admin-layout')

@section('title', 'Dashboard Admin | Apotek Alfa Group')

@section('content')
    <main class="admin-container">
        <div class="admin-welcome">
            <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
            <p>Kelola konten, banner, dan mitra Apotek Alfa Group dari sini.</p>
        </div>

        <div class="admin-menu-grid">
            <a href="{{ route('admin.banner.index') }}" class="admin-menu-card">
                <div class="menu-icon">🖼️</div>
                <h3>Kontrol Banner</h3>
                <p>Kelola banner slideshow di halaman utama</p>
            </a>

            <a href="{{ route('admin.partner.index') }}" class="admin-menu-card">
                <div class="menu-icon">🤝</div>
                <h3>Kontrol Logo Mitra</h3>
                <p>Kelola logo dan daftar mitra bisnis</p>
            </a>

            <a href="{{ route('admin.content.index') }}" class="admin-menu-card">
                <div class="menu-icon">📝</div>
                <h3>Kontrol Konten</h3>
                <p>Kelola konten halaman website</p>
            </a>

            <a href="{{ route('admin.news.index') }}" class="admin-menu-card">
                <div class="menu-icon">📰</div>
                <h3>Kontrol Berita</h3>
                <p>Kelola berita dan konten media di halaman utama</p>
            </a>
        </div>
    </main>
@endsection
