@extends('admin.admin-layout')

@section('title', 'Kontrol Berita | Admin Dashboard')

@section('content')
    <main class="admin-container">
        <div class="admin-form-container">
            <div class="admin-form-header">
                <h1>Kontrol Berita</h1>
                <p>Kelola berita, foto, dan video yang tampil di halaman utama</p>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="admin-back-btn">← Kembali ke Dashboard</a>

            <div class="form-box">
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 24px; flex-wrap: wrap;">
                    <h2 style="margin: 0; font-size: 1.4rem;">Daftar Berita</h2>
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">+ Tambah Berita</a>
                </div>

                @if($news->isEmpty())
                    <p style="color: var(--apotek-muted); text-align: center; padding: 40px; margin: 0;">
                        Belum ada berita. <a href="{{ route('admin.news.create') }}" style="color: var(--apotek-primary);">Tambahkan berita pertama</a>
                    </p>
                @else
                    <div class="table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Media</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Urutan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $item)
                                    <tr>
                                        <td>
                                            @if($item->media_type === 'video')
                                                <video controls muted style="width: 120px; height: 80px; object-fit: cover; border-radius: 10px; background: #000;">
                                                    <source src="{{ asset($item->media_url) }}" type="video/mp4">
                                                </video>
                                            @else
                                                <img src="{{ asset($item->media_url) }}" alt="Berita" style="width: 120px; height: 80px; object-fit: cover; border-radius: 10px;">
                                            @endif
                                        </td>
                                        <td style="max-width: 420px; color: var(--apotek-text);">
                                            {{ Str::limit($item->description, 120) }}
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $item->is_active ? 'active' : 'inactive' }}">
                                                {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            <div class="action-group">
                                                <a href="{{ route('admin.news.edit', $item) }}" class="action-btn edit">Edit</a>
                                                <form action="{{ route('admin.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn delete">Hapus</button>
                                                </form>
                                            </div>
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

    <style>
        .table-wrap {
            overflow-x: auto;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .status-badge.active {
            background: rgba(34, 197, 94, 0.12);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.25);
        }

        .status-badge.inactive {
            background: rgba(248, 113, 113, 0.1);
            color: #fca5a5;
            border: 1px solid rgba(248, 113, 113, 0.22);
        }

        .action-group {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 12px;
            border-radius: 8px;
            border: 1px solid var(--apotek-border);
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
        }

        .action-btn.edit {
            background: rgba(57, 208, 207, 0.1);
            color: var(--apotek-primary);
        }

        .action-btn.delete {
            background: rgba(239, 68, 68, 0.1);
            color: #fca5a5;
        }

        form {
            margin: 0;
        }
    </style>
@endsection
