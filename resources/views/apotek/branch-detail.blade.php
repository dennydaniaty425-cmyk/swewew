@extends('apotek.layout')

@section('title', $branch['name'] . ' | Apotek Alfa Group')

@section('content')
    <main class="branch-detail-page">
        <div class="container branch-detail-wrap">
            <a href="{{ route('about') }}" class="back-link">&larr; Kembali ke Tentang Kami</a>

            <article class="branch-detail-card">
                <div class="branch-detail-media">
                    <img src="{{ asset($branch['logo']) }}" alt="{{ $branch['name'] }}">
                </div>

                <div class="branch-detail-body">
                    <div class="news-detail-label">CABANG APOTEK ALFA GROUP</div>
                    <h1>{{ $branch['name'] }}</h1>
                    <p class="branch-detail-address">{{ $branch['address'] }}</p>
                    <div class="branch-phone">
                        <a href="https://wa.me/{{ '62'.ltrim(preg_replace('/[^0-9]/', '', $branch['phone']), '0') }}" target="_blank" rel="noopener" aria-label="WhatsApp {{ $branch['name'] }}" class="branch-whatsapp-link">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.52 3.48A11.86 11.86 0 0 0 12.08 0C5.53 0 .2 5.33.2 11.88c0 2.09.55 4.13 1.6 5.93L.1 24l6.34-1.66a11.87 11.87 0 0 0 5.64 1.43h.01c6.55 0 11.88-5.33 11.88-11.88 0-3.17-1.24-6.15-3.45-8.41zM12.09 21.7h-.01a9.84 9.84 0 0 1-5.02-1.37l-.36-.21-3.76.99 1-3.66-.23-.38a9.83 9.83 0 0 1-1.51-5.19C2.2 6.44 6.64 2 12.08 2a9.85 9.85 0 0 1 7.01 2.91 9.86 9.86 0 0 1 2.9 7.02c0 5.44-4.43 9.77-9.9 9.77zm5.4-7.35c-.3-.15-1.78-.88-2.05-.98-.28-.1-.47-.15-.67.15-.2.3-.77.98-.95 1.18-.17.2-.35.23-.65.08-.3-.15-1.26-.46-2.4-1.47-.89-.79-1.49-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.53.15-.18.2-.3.3-.5.1-.2.05-.38-.03-.53-.08-.15-.67-1.61-.92-2.2-.24-.57-.49-.5-.67-.51h-.57c-.2 0-.53.08-.8.38-.27.3-1.04 1.02-1.04 2.5 0 1.47 1.07 2.9 1.22 3.1.15.2 2.1 3.2 5.09 4.49.71.31 1.27.49 1.7.63.72.23 1.37.2 1.89.12.58-.09 1.78-.73 2.03-1.43.25-.7.25-1.3.17-1.43-.07-.12-.27-.2-.57-.35z"/></svg>
                            <span>{{ $branch['phone'] }}</span>
                        </a>
                    </div>

                    <section class="branch-detail-section">
                        <h2>Ikuti cabang kami</h2>
                        <div class="branch-social-links">
                            <a href="{{ $branch['tiktok'] }}" target="_blank" rel="noopener" class="branch-social-link branch-social-tiktok">
                                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16.7 3c.3 1.8 1.3 3.2 3.3 3.8v3.1c-1.2-.1-2.3-.5-3.3-1.1v6.3c0 3.2-2.5 5.7-5.7 5.7-3.1 0-5.5-2.3-5.5-5.3 0-3.1 2.5-5.5 5.7-5.5.3 0 .6 0 .9.1v3.1c-.3-.1-.6-.2-.9-.2-1.4 0-2.5 1-2.5 2.4 0 1.3 1 2.3 2.4 2.3 1.5 0 2.5-1.1 2.5-2.7V3h3.1z"/></svg>
                                TikTok
                            </a>
                            <a href="{{ $branch['instagram'] }}" target="_blank" rel="noopener" class="branch-social-link branch-social-instagram">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                                Instagram
                            </a>
                            <a href="{{ $branch['maps'] }}" target="_blank" rel="noopener" aria-label="Google Maps {{ $branch['name'] }}" class="branch-social-link branch-social-maps">
                                <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="#34a853" d="M12 2.5c-3.9 0-7 3.1-7 7 0 5.2 7 12 7 12s7-6.8 7-12c0-3.9-3.1-7-7-7z"/><path fill="#4285f4" d="M12 2.5c-1.7 0-3.2.6-4.4 1.6l4.4 3.8 4.4-3.8A6.9 6.9 0 0 0 12 2.5z"/><circle cx="12" cy="9.5" r="2.4" fill="#ea4335"/><circle cx="12" cy="9.5" r="1.1" fill="#fff"/></svg>
                                Google Maps
                            </a>
                            <a href="https://shopee.co.id/search?keyword=apotek%20alfa%20group" target="_blank" rel="noopener" class="branch-social-link branch-social-shopee">
                                <img src="{{ asset('logoshopee.jpeg') }}" alt="">
                                Shopee
                            </a>
                        </div>
                    </section>

                    <section class="branch-detail-section">
                        <h2>Foto apotek</h2>
                        <div class="branch-photo-grid">
                            @if($branch['name'] === 'Alfa Tumbang Titi')
                                @foreach(range(1, 5) as $photoNumber)
                                    <img src="{{ asset('TUMBANG TITI ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Tumbang Titi {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Sintang')
                                @foreach(range(1, 4) as $photoNumber)
                                    <img src="{{ asset('SINTANG ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Sintang {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Kendawangan')
                                @foreach(range(1, 5) as $photoNumber)
                                    <img src="{{ asset('KENDAWANGAN ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Kendawangan {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Mempawah')
                                @foreach(range(1, 3) as $photoNumber)
                                    <img src="{{ asset('mempawah ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Mempawah {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Kembayan')
                                @foreach(range(1, 2) as $photoNumber)
                                    <img src="{{ asset('kembayan ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Kembayan {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Balai Berkuak')
                                @foreach(range(1, 5) as $photoNumber)
                                    <img src="{{ asset('balai berkuak ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Balai Berkuak {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Ambawang')
                                @foreach(range(1, 4) as $photoNumber)
                                    <img src="{{ asset('ambawang ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Ambawang {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Bodok')
                                @foreach(range(1, 2) as $photoNumber)
                                    <img src="{{ asset('bodok ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Bodok {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Sosok')
                                @foreach(range(1, 2) as $photoNumber)
                                    <img src="{{ asset('sosok ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Sosok {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Air Upas')
                                @foreach(range(1, 2) as $photoNumber)
                                    <img src="{{ asset('air upas ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Air Upas {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Jungkat')
                                @foreach(range(1, 3) as $photoNumber)
                                    <img src="{{ asset('jungkat ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Jungkat {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @elseif($branch['name'] === 'Alfa Nanga Tayap')
                                @foreach(range(1, 2) as $photoNumber)
                                    <img src="{{ asset('nangatayap ('.$photoNumber.').jpeg') }}" alt="Foto Apotek Alfa Nanga Tayap {{ $photoNumber }}" class="branch-photo">
                                @endforeach
                            @else
                                <div class="branch-photo-slot">Foto cabang segera hadir</div>
                                <div class="branch-photo-slot">Foto cabang segera hadir</div>
                                <div class="branch-photo-slot">Foto cabang segera hadir</div>
                            @endif
                        </div>
                    </section>
                </div>
            </article>
        </div>
    </main>

    <style>
        .branch-detail-page {
            padding: 52px 0 80px;
            min-height: calc(100vh - 160px);
        }

        .branch-detail-wrap {
            max-width: 860px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 18px;
            color: var(--apotek-primary);
            font-weight: 700;
        }

        .branch-detail-card {
            overflow: hidden;
            max-width: 860px;
            margin: 0 auto;
            border: 1px solid var(--apotek-border);
            border-radius: 24px;
            background: rgba(10, 29, 31, 0.85);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .branch-detail-media {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 380px;
            padding: 36px;
            background: #061719;
        }

        .branch-detail-media img {
            width: min(72%, 390px);
            height: 380px;
            object-fit: contain;
        }

        .branch-detail-body {
            padding: 34px clamp(22px, 5vw, 52px) 48px;
        }

        .news-detail-label {
            color: var(--apotek-primary);
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0.12em;
        }

        .branch-detail-body h1 {
            margin: 8px 0 10px;
            color: var(--apotek-text);
        }

        .branch-detail-address {
            margin: 0;
            color: var(--apotek-muted);
            line-height: 1.6;
        }

        .branch-phone {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-top: 18px;
            padding: 10px 14px;
            border: 1px solid var(--apotek-border);
            border-radius: 10px;
            background: rgba(71, 214, 176, 0.08);
        }

        .branch-whatsapp-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #25d366;
            font-weight: 800;
        }

        .branch-whatsapp-link svg {
            width: 24px;
            height: 24px;
        }

        .branch-detail-section {
            margin-top: 32px;
        }

        .branch-detail-section h2 {
            margin: 0 0 14px;
            color: var(--apotek-text);
            font-size: 1.15rem;
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
        .branch-social-maps { background: #fff; color: #3c4043; }
        .branch-social-shopee { background: #ee4d2d; }

        .branch-photo-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .branch-photo-slot {
            display: grid;
            min-height: 180px;
            place-items: center;
            padding: 14px;
            border: 1px dashed var(--apotek-primary);
            border-radius: 10px;
            background: rgba(57, 208, 207, 0.06);
            color: var(--apotek-muted);
            font-size: 0.78rem;
            text-align: center;
        }

        .branch-photo {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border: 1px solid var(--apotek-border);
            border-radius: 10px;
            background: #061719;
        }

        @media (max-width: 600px) {
            .branch-detail-media {
                min-height: 280px;
            }

            .branch-detail-media img {
                height: 260px;
            }

            .branch-photo-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection
