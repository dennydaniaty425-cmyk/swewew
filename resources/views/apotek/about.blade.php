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
                                    <img src="{{ asset('Logo sintang.jpg') }}" alt="Logo Alfa Sintang">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Sintang</span>
                                    <div class="branch-address">Jl. MT. Haryono, Kapuas Kanan Hulu, Kec. Sintang, Kabupaten Sintang, Kalimantan Barat 78613</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo Air upas.jpg') }}" alt="Logo Alfa Air Upas">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Air Upas</span>
                                    <div class="branch-address">MRMF+FM9, Air Upas, Kec. Air Upas, Kabupaten Ketapang, Kalimantan Barat 78863</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo kendawangan.jpeg') }}" alt="Logo Alfa Kendawangan">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Kendawangan</span>
                                    <div class="branch-address">F6F8+44V, Jl. Pangeran Adi, Kendawangan Kiri, Kec. Kendawangan, Kabupaten Ketapang, Kalimantan Barat 78862</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo balai berkuak.jpg') }}" alt="Logo Alfa Balai Berkuak">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Balai Berkuak</span>
                                    <div class="branch-address">Jl. Istana Jaya, Kelurahan Balai Pinang, Kec. Simpang Hulu, Kabupaten Ketapang, Kalimantan Barat 78854</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo nangatayap.jpg') }}" alt="Logo Alfa Nanga Tayap">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Nanga Tayap</span>
                                    <div class="branch-address">FHG8+859, Nanga Tayap, Kec. Nanga Tayap, Kabupaten Ketapang, Kalimantan Barat 78873</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo tumbang titi.jpg') }}" alt="Logo Alfa Tumbang Titi">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Tumbang Titi</span>
                                    <div class="branch-address">Jl. Kyai Yauma, Desa Tumbang Titi Baru, Kec. Tumbang Titi, Kabupaten Ketapang, Kalimantan Barat 78874</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo Sosok.jpg') }}" alt="Logo Alfa Sosok">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Sosok</span>
                                    <div class="branch-address">Sosok, Kec. Tayan Hulu, Kabupaten Sanggau, Kalimantan Barat 78562</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo bodok.jpg') }}" alt="Logo Alfa Bodok">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Bodok</span>
                                    <div class="branch-address">6C5M+89Q, Palem Jaya, Kec. Parindu, Kabupaten Sanggau, Kalimantan Barat 78561</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo kembayan.jpg') }}" alt="Logo Alfa Kembayan">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Kembayan</span>
                                    <div class="branch-address">APOTEK ALFA, Tj. Merpati, Kec. Kembayan, Kabupaten Sanggau, Kalimantan Barat 78516</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo ambawang.jpg') }}" alt="Logo Alfa Ambawang">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Ambawang</span>
                                    <div class="branch-address">Jl. Trans Kalimantan, Desa Jawa Tengah, Kec. Sungai Ambawang, Kabupaten Kubu Raya, Kalimantan Barat 78319</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo jungkat.jpg') }}" alt="Logo Alfa Jungkat">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Jungkat</span>
                                    <div class="branch-address">Jl. Raya Jungkat, Sei Nipah, Kec. Jongkat, Kab. Mempawah, Kalimantan Barat 78351</div>
                                </div>
                            </div>
                            <div class="branch-item">
                                <div class="branch-image">
                                    <img src="{{ asset('Logo mempawah.jpg') }}" alt="Logo Alfa Mempawah">
                                </div>
                                <div class="branch-info">
                                    <span class="branch-name">Alfa Mempawah</span>
                                    <div class="branch-address">Jl. Sujarwo, Terusan, Kec. Mempawah Hilir, Kab. Mempawah, Kalimantan Barat 78912</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="branch-detail-modal" id="branch-detail-modal" aria-hidden="true">
                        <div class="branch-detail-dialog" role="dialog" aria-modal="true" aria-labelledby="branch-detail-title">
                            <button type="button" class="branch-detail-close" aria-label="Tutup detail cabang">&times;</button>
                            <div class="branch-detail-heading">
                                <img src="" alt="" class="branch-detail-logo" id="branch-detail-logo">
                                <div>
                                    <div class="eyebrow">Detail cabang</div>
                                    <h3 id="branch-detail-title"></h3>
                                    <p id="branch-detail-address"></p>
                                </div>
                            </div>

                            <div class="branch-detail-section">
                                <h4>Ikuti cabang kami</h4>
                                <div class="branch-social-links">
                                    <a href="https://www.tiktok.com/@aptalfagroup" target="_blank" rel="noopener" aria-label="TikTok Apotek Alfa Group" class="branch-social-link branch-social-tiktok">
                                        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16.7 3c.3 1.8 1.3 3.2 3.3 3.8v3.1c-1.2-.1-2.3-.5-3.3-1.1v6.3c0 3.2-2.5 5.7-5.7 5.7-3.1 0-5.5-2.3-5.5-5.3 0-3.1 2.5-5.5 5.7-5.5.3 0 .6 0 .9.1v3.1c-.3-.1-.6-.2-.9-.2-1.4 0-2.5 1-2.5 2.4 0 1.3 1 2.3 2.4 2.3 1.5 0 2.5-1.1 2.5-2.7V3h3.1z"/></svg>
                                        <span>TikTok</span>
                                    </a>
                                    <a href="https://www.instagram.com/alfa_kencana_sukses/" target="_blank" rel="noopener" aria-label="Instagram Apotek Alfa Group" class="branch-social-link branch-social-instagram">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                                        <span>Instagram</span>
                                    </a>
                                    <a href="https://shopee.co.id/search?keyword=apotek%20alfa%20group" target="_blank" rel="noopener" aria-label="Shopee Apotek Alfa Group" class="branch-social-link branch-social-shopee">
                                        <img src="{{ asset('logoshopee.jpeg') }}" alt="">
                                        <span>Shopee</span>
                                    </a>
                                </div>
                            </div>

                            <div class="branch-detail-section">
                                <h4>Foto apotek</h4>
                                <div class="branch-photo-grid" aria-label="Galeri foto cabang">
                                    <div class="branch-photo-slot">Foto cabang segera hadir</div>
                                    <div class="branch-photo-slot">Foto cabang segera hadir</div>
                                    <div class="branch-photo-slot">Foto cabang segera hadir</div>
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
        .page-about .branch-item {
            cursor: pointer;
        }

        .page-about .branch-item:focus-visible {
            outline: 3px solid var(--apotek-primary);
            outline-offset: 3px;
        }

        .branch-detail-modal {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: block;
            overflow-y: auto;
            background: rgba(10, 24, 30, 0.72);
            opacity: 0;
            pointer-events: none;
            transition: opacity 180ms ease;
        }

        .branch-detail-modal.is-open {
            opacity: 1;
            pointer-events: auto;
        }

        .branch-detail-dialog {
            position: relative;
            width: 100%;
            min-height: 100vh;
            padding: 56px clamp(22px, 6vw, 96px) 48px;
            border: 0;
            border-radius: 0;
            background: var(--apotek-surface);
            transform: translateY(20px);
            transition: transform 180ms ease;
        }

        .branch-detail-modal.is-open .branch-detail-dialog {
            transform: translateY(0);
        }

        .branch-detail-close {
            position: absolute;
            top: 14px;
            right: 16px;
            width: 36px;
            height: 36px;
            border: 1px solid var(--apotek-border);
            border-radius: 50%;
            background: transparent;
            color: var(--apotek-text);
            font-size: 1.6rem;
            line-height: 1;
            cursor: pointer;
        }

        .branch-detail-heading {
            display: flex;
            gap: 18px;
            align-items: center;
            padding-right: 38px;
        }

        .branch-detail-logo {
            width: 96px;
            height: 96px;
            flex: 0 0 96px;
            object-fit: cover;
            border-radius: 14px;
            border: 1px solid var(--apotek-border);
        }

        .branch-detail-heading h3 {
            margin: 3px 0 7px;
            color: var(--apotek-text);
        }

        .branch-detail-heading p {
            margin: 0;
            color: var(--apotek-muted);
            line-height: 1.5;
        }

        .branch-detail-section {
            width: min(100%, 980px);
            margin: 34px auto 0;
        }

        .branch-detail-section h4 {
            margin: 0 0 12px;
            color: var(--apotek-text);
        }

        .branch-social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .branch-social-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 42px;
            padding: 8px 13px;
            border-radius: 9px;
            color: #fff;
            font-size: 0.84rem;
            font-weight: 700;
            text-decoration: none;
        }

        .branch-social-link svg,
        .branch-social-link img {
            width: 22px;
            height: 22px;
            object-fit: cover;
            border-radius: 5px;
        }

        .branch-social-tiktok { background: #111; }
        .branch-social-instagram { background: linear-gradient(135deg, #feda75, #d62976 52%, #4f5bd5); }
        .branch-social-shopee { background: #ee4d2d; }

        .branch-photo-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .branch-photo-slot {
            display: grid;
            min-height: clamp(180px, 28vw, 320px);
            place-items: center;
            padding: 14px;
            border: 1px dashed var(--apotek-primary);
            border-radius: 10px;
            background: rgba(57, 208, 207, 0.06);
            color: var(--apotek-muted);
            font-size: 0.78rem;
            text-align: center;
        }

        @media (min-width: 720px) {
            .branch-detail-heading {
                width: min(100%, 980px);
                margin: 0 auto;
            }
        }

        @media (max-width: 600px) {
            .branch-detail-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .branch-detail-logo {
                width: 112px;
                height: 112px;
                flex-basis: 112px;
            }

            .branch-photo-grid {
                grid-template-columns: 1fr;
            }
        }

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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('branch-detail-modal');
            const closeButton = modal.querySelector('.branch-detail-close');
            const title = document.getElementById('branch-detail-title');
            const address = document.getElementById('branch-detail-address');
            const logo = document.getElementById('branch-detail-logo');

            const closeModal = function () {
                modal.classList.remove('is-open');
                modal.setAttribute('aria-hidden', 'true');
            };

            document.querySelectorAll('.branch-item').forEach(function (branch) {
                branch.setAttribute('role', 'button');
                branch.setAttribute('tabindex', '0');

                const branchName = branch.querySelector('.branch-name').textContent;
                const branchSlug = branchName
                    .replace(/^Alfa\s+/i, '')
                    .trim()
                    .toLowerCase()
                    .replace(/\s+/g, '-');
                const viewButton = document.createElement('a');
                viewButton.href = '/cabang/' + branchSlug;
                viewButton.className = 'branch-view-button';
                viewButton.textContent = 'Lihat';
                viewButton.setAttribute('aria-label', 'Lihat detail ' + branchName);
                viewButton.addEventListener('click', function (event) {
                    event.stopPropagation();
                });
                branch.querySelector('.branch-info').appendChild(viewButton);

                const openModal = function () {
                    window.location.href = '/cabang/' + branchSlug;
                };

                branch.addEventListener('click', openModal);
                branch.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        openModal();
                    }
                });
            });

            closeButton.addEventListener('click', closeModal);
            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    closeModal();
                }
            });
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modal.classList.contains('is-open')) {
                    closeModal();
                }
            });
        });
    </script>
@endsection
