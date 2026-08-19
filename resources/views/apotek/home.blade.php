@extends('apotek.layout')

@section('title', 'Apotek Alfa Group | Home')

@section('content')
    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div data-aos="fade-up">
                    <div class="eyebrow">Jaringan kesehatan terpercaya</div>
                    <h1>Apotek Alfa Group</h1>
                    <p>
                        Satu jaringan untuk kebutuhan kesehatan keluarga. Temukan obat, vitamin, produk perawatan,
                        dan konsultasi dari tim farmasi yang ramah di cabang terdekat Anda.
                    </p>

                    <div class="button-row">
                        <a href="https://wa.me/6282114422093?text=Halo%20Apotek%20Alfa%20Group%2C%20saya%20ingin%20bergabung%20sebagai%20mitra.%20Tolong%20berikan%20informasi%20lebih%20lanjut." class="btn btn-primary" target="_blank" rel="noopener">Gabung Mitra</a>
                        <a href="{{ route('contact') }}" class="btn btn-secondary">Hubungi Kami</a>
                    </div>

                    <div class="hero-stats" data-aos="fade-up" data-aos-delay="150">
                        <div class="stat">
                            <strong data-count-target="10" data-count-prefix="" data-count-suffix="K+">0K+</strong>
                            <span>Pelanggan Terlayani</span>
                        </div>
                        <div class="stat">
                            <strong data-count-target="24" data-count-prefix="" data-count-suffix="/7">0/7</strong>
                            <span>Pelayanan Konsultasi</span>
                        </div>
                        <div class="stat">
                            <strong data-count-target="100" data-count-prefix="" data-count-suffix="%">0%</strong>
                            <span>Produk Original</span>
                        </div>
                    </div>
                </div>

                <div class="hero-card" data-aos="fade-left" data-aos-delay="120">
                    @include('components.service-slideshow')
                </div>
            </div>
        </section>

        <section class="network-band" aria-label="Jaringan cabang Apotek Alfa Group">
            <div class="container network-band-inner">
                <div class="network-intro" data-aos="fade-right">
                    <span class="network-kicker">Jaringan kami</span>
                    <strong>Hadir lebih dekat<br>di Kalimantan Barat</strong>
                </div>
                <div class="network-cities" data-aos="fade-left" data-aos-delay="120">
                    <span>✦ Sintang</span>
                    <span>✦ Ketapang</span>
                    <span>✦ Sanggau</span>
                    <span>✦ Kubu Raya</span>
                    <span>✦ Mempawah</span>
                    <a href="{{ route('about') }}">Lihat semua cabang <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </section>

        <section class="section news-section" data-aos="fade-up">
            <div class="container">
                <div class="news-label">BERITA TERBARU</div>
                <h2 class="news-title">Informasi seputar kesehatan dan layanan kami</h2>

                @php
                    $newsItems = \App\Models\News::getActive();
                    $contentItems = \App\Models\Content::where('is_active', true)->orderBy('order')->get();
                    $featuredItems = $newsItems->merge($contentItems)->sortBy('order')->values();

                    $resolveMediaUrl = function ($item) {
                        $media = $item->media_url ?? null;

                        if (! empty($item->gallery) && is_array($item->gallery)) {
                            $media = $item->gallery[0] ?? $media;
                        }

                        if (empty($media)) {
                            return null;
                        }

                        if (str_starts_with($media, 'http')) {
                            return $media;
                        }

                        if (str_starts_with($media, 'news/')) {
                            return route('media.show', ['path' => str_replace('news/', '', $media)]);
                        }

                        if (str_starts_with($media, 'news/gallery/')) {
                            return route('media.show', ['path' => str_replace('news/', '', $media)]);
                        }

                        return asset($media);
                    };
                @endphp

                @if($featuredItems->isEmpty())
                    <div class="news-empty">
                        <p>Belum ada berita yang dipublikasikan saat ini.</p>
                    </div>
                @else
                    <div class="news-carousel-wrap">
                        <button type="button" class="news-arrow news-arrow-left" aria-label="Berita sebelumnya">‹</button>

                        <div class="news-carousel">
                            @foreach($featuredItems as $newsItem)
                                <article class="news-card">
                                    <div class="news-image-frame">
                                        @if(($newsItem->media_type ?? 'image') === 'video' && ! empty($newsItem->media_url))
                                            <video class="news-media" muted playsinline autoplay loop>
                                                <source src="{{ route('media.show', ['path' => str_replace('news/', '', $newsItem->media_url)]) }}" type="video/mp4">
                                            </video>
                                        @else
                                            @php $mediaUrl = $resolveMediaUrl($newsItem); @endphp
                                            @if($mediaUrl)
                                                <img src="{{ $mediaUrl }}" alt="Berita Apotek Alfa Group" class="news-media">
                                            @else
                                                <div class="news-media news-media-empty">No Media</div>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="news-card-body">
                                        <h3>{{ Str::limit($newsItem->description ?? 'Berita terbaru', 140) }}</h3>
                                        @if($newsItem instanceof \App\Models\News)
                                            <a href="{{ route('news.show', $newsItem) }}" class="news-button">Lihat</a>
                                        @else
                                            <a href="{{ route('content.show', $newsItem) }}" class="news-button">Lihat</a>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <button type="button" class="news-arrow news-arrow-right" aria-label="Berita berikutnya">›</button>
                    </div>
                @endif
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-head" data-aos="fade-up">
                    <div class="eyebrow" style="margin-bottom: 12px;">Tentang Kami</div>
                    <h2>Apotek Alfa berkomitmen pada kualitas kesehatan dan pelayanan terpercaya</h2>
                </div>

                <div class="about-box" style="margin-bottom: 28px;" data-aos="fade-up" data-aos-delay="100">
                    <p>
                        Apotek Alfa berkomitmen menyediakan obat dan produk kesehatan berkualitas dengan pelayanan profesional dari tenaga farmasi berkompeten. Kami beroperasi sesuai regulasi, memastikan keamanan dan kepercayaan pelanggan dalam memberikan pelayanan kesehatan terbaik.
                    </p>
                </div>

                @php
                    $apotekGallery = [
                        '1 (1).jpeg',
                        '1 (2).jpeg',
                        '1 (3).jpeg',
                        '1 (4).jpeg',
                        '1 (5).jpeg',
                        '1 (6).jpeg',
                        '1 (7).jpeg',
                    ];
                @endphp

                <div class="apotek-gallery" data-aos="zoom-in" data-aos-delay="160" aria-label="Galeri Apotek Alfa Group">
                    <div class="apotek-gallery-stage" style="--gallery-rotation: 0deg;">
                        @foreach($apotekGallery as $index => $photo)
                            <img
                                src="{{ asset($photo) }}"
                                alt="Foto Apotek Alfa Group {{ $index + 1 }}"
                                class="apotek-gallery-slide {{ $index === 0 ? 'is-active' : '' }}"
                                data-gallery-index="{{ $index }}"
                                style="--photo-angle: {{ $index * (360 / count($apotekGallery)) }}deg;"
                            >
                        @endforeach

                        <img src="{{ asset('apotek alfa group logo.png') }}" alt="Logo Apotek Alfa Group" class="apotek-gallery-center-logo">

                        <button type="button" class="apotek-gallery-arrow apotek-gallery-prev" aria-label="Foto sebelumnya">‹</button>
                        <button type="button" class="apotek-gallery-arrow apotek-gallery-next" aria-label="Foto berikutnya">›</button>
                    </div>

                    <div class="apotek-gallery-dots" role="tablist" aria-label="Pilih foto galeri">
                        @foreach($apotekGallery as $index => $photo)
                            <button type="button" class="apotek-gallery-dot {{ $index === 0 ? 'is-active' : '' }}" data-gallery-dot="{{ $index }}" aria-label="Tampilkan foto {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                </div>

                <div class="section-head" style="margin-top: 24px;">
                    <div class="eyebrow" style="margin-bottom: 12px;">Keunggulan Kami</div>
                    <h2>Kenapa memilih Apotek Alfa</h2>
                </div>

                <div class="feature-grid">
                    <article class="service-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="icon-badge">🌐</div>
                        <h3>Jaringan Luas</h3>
                        <p>Apotek Alfa hadir di berbagai kota, memudahkan Anda mendapatkan obat dengan cepat. Dengan pengalaman lebih dari 20 tahun dan rantai suplai yang terpercaya, kami siap sebagai distributor farmasi yang andal.</p>
                    </article>

                    <article class="service-card" data-aos="fade-up" data-aos-delay="120">
                        <div class="icon-badge">🩺</div>
                        <h3>Pelayanan Profesional</h3>
                        <p>Dengan komitmen terhadap pelayanan prima, tim farmasi kami hadir untuk memenuhi kebutuhan obat, suplemen, dan vitamin Anda secara aman dan akurat.</p>
                    </article>

                    <article class="service-card" data-aos="fade-up" data-aos-delay="240">
                        <div class="icon-badge">💊</div>
                        <h3>Produk Lengkap</h3>
                        <p>Kami menyediakan berbagai macam jenis obat mulai dari suplemen kesehatan, vitamin, obat herbal, alat kesehatan, hingga resep obat lainnya.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" style="background: rgba(255,255,255,0.01);">
            <div class="container">
                <div class="section-head" data-aos="fade-up">
                    <div class="eyebrow" style="margin-bottom: 12px;">Proses layanan</div>
                    <h2>Bagaimana kami membantu Anda</h2>
                </div>

                <div class="process-grid">
                    <article class="process-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="step">1</div>
                        <h3>Konsultasi</h3>
                        <p>Jelaskan kebutuhan kesehatan Anda kepada tim kami.</p>
                    </article>
                    <article class="process-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="step">2</div>
                        <h3>Rekomendasi</h3>
                        <p>Apoteker kami akan merekomendasikan produk sesuai kondisi Anda.</p>
                    </article>
                    <article class="process-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="step">3</div>
                        <h3>Persiapan</h3>
                        <p>Kami menyiapkan produk dengan cepat dan aman.</p>
                    </article>
                    <article class="process-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="step">4</div>
                        <h3>Pengiriman</h3>
                        <p>Produk sampai tepat waktu dengan layanan yang ramah.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="container">
                <div class="cta-box" data-aos="zoom-in">
                    <div>
                        <h3>Siap membantu kebutuhan kesehatan Anda?</h3>
                        <p>Hubungi tim Apotek Alfa Group untuk konsultasi produk dan layanan kesehatan terbaik.</p>
                    </div>
                    <a href="{{ route('contact') }}" class="btn btn-primary">Hubungi Sekarang</a>
                </div>
            </div>
        </section>
    </main>

    <style>
        .news-section {
            padding-top: 16px;
            padding-bottom: 64px;
        }

        .apotek-gallery {
            margin: 0 0 38px;
            padding: 14px;
            border: 1px solid var(--apotek-border);
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.025);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
        }

        .apotek-gallery-stage {
            position: relative;
            overflow: hidden;
            container-type: inline-size;
            width: min(620px, 100%);
            aspect-ratio: 1;
            min-height: 0;
            margin: 0 auto;
            border: 8px solid rgba(71, 214, 176, 0.18);
            border-radius: 50%;
            background: #092224;
            box-shadow: 0 0 0 1px rgba(168, 207, 202, 0.16), 0 22px 44px rgba(0, 0, 0, 0.28), inset 0 0 32px rgba(0, 0, 0, 0.3);
        }

        .apotek-gallery-slide {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 25%;
            height: 18%;
            display: block;
            object-fit: cover;
            opacity: 0.6;
            border: 3px solid rgba(168, 207, 202, 0.32);
            border-radius: 12px;
            box-shadow: 0 10px 18px rgba(0, 0, 0, 0.28);
            transform: translate(-50%, -50%) rotate(calc(var(--photo-angle) + var(--gallery-rotation))) translateY(calc(-1 * min(34cqw, 220px))) rotate(calc(-1 * (var(--photo-angle) + var(--gallery-rotation))));
            transform-origin: center;
            transition: opacity 0.7s ease, width 0.7s ease, height 0.7s ease, border-color 0.7s ease, box-shadow 0.7s ease, transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .apotek-gallery-slide.is-active {
            opacity: 1;
            width: 31%;
            height: 22%;
            border-color: var(--apotek-primary);
            box-shadow: 0 0 0 4px rgba(71, 214, 176, 0.18), 0 14px 24px rgba(0, 0, 0, 0.38);
        }

        .apotek-gallery-stage::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 16%;
            aspect-ratio: 1;
            border: 2px solid rgba(71, 214, 176, 0.5);
            border-radius: 50%;
            background: radial-gradient(circle, rgba(71, 214, 176, 0.2), rgba(5, 23, 25, 0.85));
            box-shadow: 0 0 22px rgba(71, 214, 176, 0.22);
            transform: translate(-50%, -50%);
            z-index: 1;
            pointer-events: none;
        }

        .apotek-gallery-center-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 2;
            width: 12%;
            height: 12%;
            object-fit: contain;
            transform: translate(-50%, -50%);
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.35));
            pointer-events: none;
        }

        .apotek-gallery-arrow {
            position: absolute;
            top: 50%;
            z-index: 3;
            width: 44px;
            height: 44px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            background: rgba(5, 23, 25, 0.72);
            color: #ffffff;
            font-size: 2rem;
            line-height: 1;
            cursor: pointer;
            transform: translateY(-50%);
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .apotek-gallery-arrow:hover {
            background: var(--apotek-primary-strong);
            transform: translateY(-50%) scale(1.08);
        }

        .apotek-gallery-prev { left: 16px; }
        .apotek-gallery-next { right: 16px; }

        .apotek-gallery-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            padding-top: 14px;
        }

        .apotek-gallery-dot {
            width: 8px;
            height: 8px;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background: rgba(168, 207, 202, 0.35);
            cursor: pointer;
            transition: width 0.25s ease, border-radius 0.25s ease, background 0.25s ease;
        }

        .apotek-gallery-dot.is-active {
            width: 26px;
            border-radius: 999px;
            background: var(--apotek-primary);
        }

        @media (max-width: 680px) {
            .apotek-gallery {
                padding: 8px;
                border-radius: 18px;
            }

            .apotek-gallery-stage {
                width: min(400px, 100%);
                border-width: 6px;
            }

            .apotek-gallery-slide {
                width: 29%;
                height: 18%;
                border-width: 2px;
                transform: translate(-50%, -50%) rotate(calc(var(--photo-angle) + var(--gallery-rotation))) translateY(calc(-1 * min(34cqw, 140px))) rotate(calc(-1 * (var(--photo-angle) + var(--gallery-rotation))));
            }

            .apotek-gallery-slide.is-active {
                width: 36%;
                height: 22%;
            }

            .apotek-gallery-arrow {
                width: 36px;
                height: 36px;
                font-size: 1.6rem;
            }

            .apotek-gallery-prev { left: 10px; }
            .apotek-gallery-next { right: 10px; }
        }

        @media (prefers-reduced-motion: reduce) {
            .apotek-gallery-slide,
            .apotek-gallery-dot,
            .apotek-gallery-arrow {
                transition: none;
            }
        }

        .network-band {
            background: #0a292b;
            color: #ffffff;
            padding: 24px 0;
        }

        .network-band-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 32px;
        }

        .network-intro {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-shrink: 0;
        }

        .network-kicker {
            color: #82d8c0;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .network-intro strong {
            font-family: 'Manrope', sans-serif;
            font-size: 1.05rem;
            line-height: 1.3;
        }

        .network-cities {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 10px 22px;
            color: #c8e9e0;
            font-size: 0.88rem;
            font-weight: 600;
        }

        .network-cities span {
            white-space: nowrap;
        }

        .network-cities a {
            color: #82d8c0;
            font-weight: 800;
            white-space: nowrap;
        }

        .network-cities a span {
            display: inline-block;
            margin-left: 5px;
            transition: transform 0.2s ease;
        }

        .network-cities a:hover span {
            transform: translateX(4px);
        }

        .news-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            border: 1px solid rgba(57, 208, 207, 0.7);
            border-radius: 999px;
            background: rgba(8, 34, 38, 0.75);
            color: var(--apotek-primary);
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .news-title {
            margin: 0 0 28px;
            font-size: clamp(2.2rem, 4vw, 4.8rem);
            line-height: 1.05;
            letter-spacing: -0.06em;
            color: var(--apotek-text);
            max-width: 1200px;
        }

        .news-empty {
            background: rgba(17, 33, 36, 0.9);
            border: 1px solid var(--apotek-border);
            border-radius: 26px;
            min-height: 260px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 28px 24px;
            color: var(--apotek-muted);
            font-size: 1.05rem;
        }

        .news-carousel-wrap {
            display: grid;
            grid-template-columns: 48px minmax(0, 1fr) 48px;
            align-items: center;
            gap: 18px;
        }

        .news-carousel {
            display: flex;
            gap: 24px;
            overflow: hidden;
            scroll-behavior: smooth;
            padding: 8px 0 10px;
        }

        .news-card {
            flex: 0 0 260px;
            background: rgba(10, 29, 31, 0.9);
            border: 1px solid rgba(111, 211, 217, 0.5);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
            min-height: 340px;
            display: flex;
            flex-direction: column;
        }

        .news-image-frame {
            height: 190px;
            overflow: hidden;
            background: #dbeafe;
        }

        .news-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            background: #000;
        }

        .news-card-body {
            display: flex;
            flex: 1;
            flex-direction: column;
            justify-content: space-between;
            background: rgba(8, 24, 26, 0.95);
            padding: 18px 18px 20px;
        }

        .news-card-body h3 {
            margin: 0 0 18px;
            color: var(--apotek-text);
            font-size: 0.92rem;
            line-height: 1.45;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }

        .news-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            border: none;
            border-radius: 999px;
            background: linear-gradient(135deg, #1f8fe3, #1d6fe0);
            color: #fff;
            font-size: 1.02rem;
            font-weight: 700;
            padding: 12px 18px;
            cursor: pointer;
            box-shadow: 0 10px 18px rgba(27, 108, 224, 0.22);
            text-decoration: none;
        }

        .news-arrow {
            width: 48px;
            height: 48px;
            border: 1px solid rgba(57, 208, 207, 0.55);
            border-radius: 14px;
            background: rgba(8, 34, 38, 0.7);
            color: var(--apotek-primary);
            font-size: 2.4rem;
            line-height: 1;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .network-band-inner {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .network-cities {
                justify-content: flex-start;
                gap: 9px 16px;
            }

            .news-carousel-wrap {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .news-carousel {
                display: flex;
                overflow-x: auto;
                overflow-y: hidden;
                gap: 12px;
                padding: 6px 2px 12px;
                scroll-snap-type: x proximity;
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .news-carousel::-webkit-scrollbar {
                display: none;
            }

            .news-arrow {
                display: none;
            }

            .news-card {
                flex: 0 0 210px;
                min-height: 290px;
                scroll-snap-align: start;
            }

            .news-image-frame {
                height: 150px;
            }

            .news-card-body {
                padding: 14px 14px 16px;
            }

            .news-card-body h3 {
                font-size: 0.8rem;
                line-height: 1.35;
                margin-bottom: 14px;
            }

            .news-button {
                font-size: 0.9rem;
                padding: 10px 14px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const statValues = document.querySelectorAll('[data-count-target]');

            if (statValues.length) {
                const animateStats = function () {
                    const duration = 2000;
                    const startTime = performance.now();

                    const updateStats = function (currentTime) {
                        const progress = Math.min((currentTime - startTime) / duration, 1);
                        const easedProgress = 1 - Math.pow(1 - progress, 3);

                        statValues.forEach(function (statValue) {
                            const target = Number(statValue.dataset.countTarget);
                            const currentValue = Math.floor(target * easedProgress);

                            statValue.textContent = `${statValue.dataset.countPrefix}${currentValue}${statValue.dataset.countSuffix}`;
                        });

                        if (progress < 1) {
                            window.requestAnimationFrame(updateStats);
                        }
                    };

                    window.requestAnimationFrame(updateStats);
                };

                animateStats();
            }

            const gallerySlides = document.querySelectorAll('.apotek-gallery-slide');
            const galleryDots = document.querySelectorAll('.apotek-gallery-dot');
            const galleryPrev = document.querySelector('.apotek-gallery-prev');
            const galleryNext = document.querySelector('.apotek-gallery-next');
            const galleryStage = document.querySelector('.apotek-gallery-stage');
            let galleryIndex = 0;
            let galleryTimer;

            if (gallerySlides.length) {
                const showGallerySlide = function (nextIndex) {
                    galleryIndex = (nextIndex + gallerySlides.length) % gallerySlides.length;
                    const angleStep = 360 / gallerySlides.length;

                    galleryStage.style.setProperty('--gallery-rotation', `${galleryIndex * -angleStep}deg`);

                    gallerySlides.forEach(function (slide, index) {
                        slide.classList.toggle('is-active', index === galleryIndex);
                    });

                    galleryDots.forEach(function (dot, index) {
                        dot.classList.toggle('is-active', index === galleryIndex);
                    });
                };

                const restartGallery = function () {
                    window.clearInterval(galleryTimer);
                    galleryTimer = window.setInterval(function () {
                        showGallerySlide(galleryIndex + 1);
                    }, 4500);
                };

                galleryDots.forEach(function (dot) {
                    dot.addEventListener('click', function () {
                        showGallerySlide(Number(dot.dataset.galleryDot));
                        restartGallery();
                    });
                });

                galleryPrev.addEventListener('click', function () {
                    showGallerySlide(galleryIndex - 1);
                    restartGallery();
                });

                galleryNext.addEventListener('click', function () {
                    showGallerySlide(galleryIndex + 1);
                    restartGallery();
                });

                restartGallery();
            }

            const carousel = document.querySelector('.news-carousel');
            const prevBtn = document.querySelector('.news-arrow-left');
            const nextBtn = document.querySelector('.news-arrow-right');

            if (!carousel || !prevBtn || !nextBtn) {
                return;
            }

            const scrollAmount = 360;

            prevBtn.addEventListener('click', function () {
                carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });

            nextBtn.addEventListener('click', function () {
                carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        });
    </script>
@endsection
