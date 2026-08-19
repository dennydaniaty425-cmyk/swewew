@extends('admin.admin-layout')

@section('title', 'Kontrol Logo Mitra | Admin Dashboard')

@section('content')
    <main class="admin-container">
        <div class="admin-form-container">
            <div class="admin-form-header">
                <h1>Kontrol Logo Mitra</h1>
                <p>Kelola logo principal yang ditampilkan di halaman Mitra Kami</p>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="admin-back-btn">← Kembali ke Dashboard</a>

            <div class="form-box">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; gap: 16px; flex-wrap: wrap;">
                    <h2 style="margin: 0; font-size: 1.4rem;">Daftar Principal</h2>
                    <a href="{{ route('admin.partner.create') }}" class="btn btn-primary">+ Tambah Logo Mitra</a>
                </div>

                @if($partners->isEmpty())
                    <p style="color: var(--apotek-muted); text-align: center; padding: 40px; margin: 0;">
                        Belum ada logo principal. <a href="{{ route('admin.partner.create') }}" style="color: var(--apotek-primary);">Tambahkan logo pertama</a>
                    </p>
                @else
                    <div style="overflow-x:auto;">
                        <table class="admin-table" style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="padding: 12px; text-align: left;">Urutan</th>
                                    <th style="padding: 12px; text-align: left;">Logo</th>
                                    <th style="padding: 12px; text-align: left;">Nama Principal</th>
                                    <th style="padding: 12px; text-align: left;">Status</th>
                                    <th style="padding: 12px; text-align: left;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partners as $partner)
                                    <tr style="border-top: 1px solid var(--apotek-border);">
                                        <td style="padding: 12px;">{{ $partner->order ?? 0 }}</td>
                                        <td style="padding: 12px;">
                                            <img src="{{ asset($partner->logo_url) }}" alt="{{ $partner->name }}" style="width: 120px; max-height: 70px; object-fit: contain; border-radius: 8px; background: rgba(255,255,255,0.04); padding: 8px;">
                                        </td>
                                        <td style="padding: 12px; font-weight: 600;">{{ $partner->name }}</td>
                                        <td style="padding: 12px;">
                                            <span style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; {{ $partner->is_active ? 'background-color: #d4edda; color: #155724;' : 'background-color: #f8d7da; color: #721c24;' }}">
                                                {{ $partner->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                            </span>
                                        </td>
                                        <td style="padding: 12px;">
                                            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                                <a href="{{ route('admin.partner.edit', $partner) }}" style="background-color: var(--apotek-primary); color: var(--apotek-text); padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; display: inline-block;">Edit</a>
                                                <form action="{{ route('admin.partner.destroy', $partner) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background-color: #dc3545; color: white; padding: 6px 12px; border-radius: 4px; border: none; font-size: 12px; cursor: pointer;" onclick="return confirm('Yakin akan menghapus logo mitra ini?')">Hapus</button>
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
@endsection
