@extends('apotek.layout')

@section('title', 'Tentang Kami | Apotek Alfa Group')

@section('content')
    <main class="section page-about">
        <div class="container">
            <div class="section-head">
                <div class="eyebrow">Tentang kami</div>
                <h2>Komitmen kami untuk kesehatan dan pelayanan yang lebih baik</h2>
            </div>

            <div class="about-grid">
                <div class="hero-card">
                    <div class="brand" style="justify-content: center; margin-bottom: 18px;">
                        <img src="{{ asset('apotek alfa group logo.png') }}" alt="Logo Apotek Alfa Group" class="brand-logo" style="width: 120px; height: 120px;">
                    </div>

                    <div class="mini-card">
                        <h3>
                            <svg viewBox="0 0 24 24" fill="currentColor" style="width: 22px; height: 22px; flex-shrink: 0;">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                            </svg>
                            Visi
                        </h3>
                        <p>Menjadi apotek yang paling dipercaya dalam menyediakan layanan kesehatan dan produk terbaik untuk masyarakat.</p>
                    </div>

                    <div class="mini-card">
                        <h3>
                            <svg viewBox="0 0 24 24" fill="currentColor" style="width: 22px; height: 22px; flex-shrink: 0;">
                                <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/>
                            </svg>
                            Misi
                        </h3>
                        <p>Menyediakan produk berkualitas, konsultasi tepat, dan pelayanan yang menjadikan kesehatan lebih mudah dijangkau.</p>
                    </div>

                    <div class="about-box" style="margin-top: 18px;">
                        <h3 class="branch-title">Cabang Apotek Alfa Group</h3>

                        <div class="branch-grid">
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Sintang</span>
                                    <div class="branch-address">Jl. MT. Haryono, Kapuas Kanan Hulu, Kec. Sintang, Kabupaten Sintang, Kalimantan Barat 78613</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Air Upas</span>
                                    <div class="branch-address">MRMF+FM9, Air Upas, Kec. Air Upas, Kabupaten Ketapang, Kalimantan Barat 78863</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Kendawangan</span>
                                    <div class="branch-address">F6F8+44V, Jl. Pangeran Adi, Kendawangan Kiri, Kec. Kendawangan, Kabupaten Ketapang, Kalimantan Barat 78862</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Balai Berkuak</span>
                                    <div class="branch-address">Jl. Istana Jaya, Kelurahan Balai Pinang, Kec. Simpang Hulu, Kabupaten Ketapang, Kalimantan Barat 78854</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Nanga Tayap</span>
                                    <div class="branch-address">FHG8+859, Nanga Tayap, Kec. Nanga Tayap, Kabupaten Ketapang, Kalimantan Barat 78873</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Tumbang Titi</span>
                                    <div class="branch-address">Jl. Kyai Yauma, Desa Tumbang Titi Baru, Kec. Tumbang Titi, Kabupaten Ketapang, Kalimantan Barat 78874</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Sosok</span>
                                    <div class="branch-address">Sosok, Kec. Tayan Hulu, Kabupaten Sanggau, Kalimantan Barat 78562</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Bodok</span>
                                    <div class="branch-address">6C5M+89Q, Palem Jaya, Kec. Parindu, Kabupaten Sanggau, Kalimantan Barat 78561</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Kembayan</span>
                                    <div class="branch-address">APOTEK ALFA, Tj. Merpati, Kec. Kembayan, Kabupaten Sanggau, Kalimantan Barat 78516</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Ambawang</span>
                                    <div class="branch-address">Jl. Trans Kalimantan, Desa Jawa Tengah, Kec. Sungai Ambawang, Kabupaten Kubu Raya, Kalimantan Barat 78319</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Jungkat</span>
                                    <div class="branch-address">Jl. Raya Jungkat, Sei Nipah, Kec. Jongkat, Kab. Mempawah, Kalimantan Barat 78351</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <div class="branch-image-placeholder">
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 40px; height: 40px;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Mempawah</span>
                                    <div class="branch-address">Jl. Sujarwo, Terusan, Kec. Mempawah Hilir, Kab. Mempawah, Kalimantan Barat 78912</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-copy">
                    <div class="about-box">
                        <p>
                            Apotek Alfa berkomitmen menyediakan obat dan produk kesehatan berkualitas, dengan pelayanan profesional dari tenaga farmasi berkompeten. Kami beroperasi sesuai regulasi, memastikan keamanan dan kepercayaan pelanggan, serta terus memberikan pelayanan kesehatan terbaik untuk masyarakat.
                        </p>
                    </div>

                    <div class="about-box">
                        <h3 style="margin: 0 0 14px; color: var(--apotek-primary);">Keunggulan Kami</h3>
                        <ul>
                            <li><strong>Jaringan Luas</strong> — Apotek Alfa hadir di berbagai kota, memudahkan Anda mendapatkan obat dengan cepat. Dengan pengalaman lebih dari 20 tahun dan rantai suplai yang terpercaya, kami siap sebagai distributor farmasi yang andal.</li>
                            <li><strong>Pelayanan Profesional</strong> — Dengan komitmen terhadap pelayanan prima, tim farmasi kami hadir untuk memenuhi kebutuhan obat, suplemen, dan vitamin Anda secara aman dan akurat.</li>
                            <li><strong>Produk Lengkap &amp; Berkualitas</strong> — Kami menyediakan berbagai macam jenis obat mulai dari suplemen kesehatan, vitamin, obat herbal, alat kesehatan, hingga resep obat lainnya.</li>
                        </ul>
                    </div>
                </div>
            </div>

                    <div class="pill-list">
                        <span class="pill">Konsultasi Apoteker</span>
                        <span class="pill">Produk Berkualitas</span>
                        <span class="pill">Pelayanan Ramah</span>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <style>
        .page-about .branch-image-placeholder {
            background-image: url("{{ asset('foto apotek.jpeg') }}");
            background-position: center;
            background-size: cover;
            color: transparent;
        }

        .page-about .branch-image-placeholder svg {
            display: none;
        }
    </style>
@endsection
