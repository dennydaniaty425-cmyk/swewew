@extends('admin.admin-layout')

@section('title', 'Kontrol Banner | Admin Dashboard')

@section('content')
    <main class="admin-container">
        <div class="admin-form-container">
            <div class="admin-form-header">
                <h1>Kontrol Banner Slideshow</h1>
                <p>Kelola gambar banner yang ditampilkan di halaman utama</p>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="admin-back-btn">← Kembali ke Dashboard</a>

            <div class="form-box">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <h2 style="margin: 0; font-size: 1.4rem;">Daftar Banner</h2>
                    <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">+ Tambah Banner</a>
                </div>

                @if(session('success'))
                    <div style="background-color: #d4edda; color: #155724; padding: 12px 16px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                        {{ session('success') }}
                    </div>
                @endif

                @if($banners->isEmpty())
                    <p style="color: var(--apotek-muted); text-align: center; padding: 40px;">
                        Belum ada banner. <a href="{{ route('admin.banner.create') }}" style="color: var(--apotek-primary);">Tambahkan banner pertama Anda</a>
                    </p>
                @else
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background-color: var(--apotek-primary);">
                                    <th style="padding: 12px; text-align: left; color: var(--apotek-text); font-weight: 600;">Urutan</th>
                                    <th style="padding: 12px; text-align: left; color: var(--apotek-text); font-weight: 600;">Judul</th>
                                    <th style="padding: 12px; text-align: left; color: var(--apotek-text); font-weight: 600;">Gambar</th>
                                    <th style="padding: 12px; text-align: left; color: var(--apotek-text); font-weight: 600;">Status</th>
                                    <th style="padding: 12px; text-align: left; color: var(--apotek-text); font-weight: 600;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banners as $banner)
                                    <tr style="border-bottom: 1px solid var(--apotek-border);">
                                        <td style="padding: 12px;">{{ $banner->order ?? '-' }}</td>
                                        <td style="padding: 12px;">{{ $banner->title }}</td>
                                        <td style="padding: 12px;">
                                            <img src="{{ asset($banner->image_url) }}" alt="{{ $banner->title }}" style="height: 50px; object-fit: cover; border-radius: 4px;">
                                        </td>
                                        <td style="padding: 12px;">
                                            <span style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; {{ $banner->is_active ? 'background-color: #d4edda; color: #155724;' : 'background-color: #f8d7da; color: #721c24;' }}">
                                                {{ $banner->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                            </span>
                                        </td>
                                        <td style="padding: 12px;">
                                            <a href="{{ route('admin.banner.edit', $banner) }}" style="background-color: var(--apotek-primary); color: var(--apotek-text); padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; display: inline-block; margin-right: 5px;">Edit</a>
                                            <form action="{{ route('admin.banner.destroy', $banner) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: #dc3545; color: white; padding: 6px 12px; border-radius: 4px; border: none; font-size: 12px; cursor: pointer;" onclick="return confirm('Yakin akan menghapus banner ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
