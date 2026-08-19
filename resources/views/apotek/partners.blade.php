@extends('apotek.layout')

@section('title', 'Mitra Kami | Apotek Alfa Group')

@section('content')
    <main>
        <section class="section" style="padding-top: 72px;">
            <div class="container">
                <div class="section-head" style="text-align: center; margin-bottom: 40px;">
                    <div class="eyebrow" style="margin-bottom: 14px;">Mitra Kami</div>
                    <h2>Principal dan mitra terpercaya yang mendukung layanan kesehatan kami</h2>
                    <p style="max-width: 760px; margin: 0 auto; color: var(--apotek-muted);">
                        Kami bekerja sama dengan berbagai principal yang memiliki komitmen tinggi terhadap kualitas produk, keamanan, dan pelayanan kesehatan untuk masyarakat.
                    </p>
                </div>

                @if(empty($partners))
                    <div class="empty-state" style="padding: 40px 24px; border: 1px solid var(--apotek-border); border-radius: 18px; background: rgba(255,255,255,0.02); text-align: center; color: var(--apotek-muted);">
                        Saat ini belum ada logo principal yang ditampilkan.
                    </div>
                @else
                    <div class="partner-grid">
                        @foreach($partners as $partner)
                            <div class="partner-card" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 6) * 80 }}">
                                <img src="{{ asset($partner->logo_url) }}" alt="{{ $partner->name }}" class="partner-logo">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>

    <style>
        .partner-grid {
            display: grid;
            grid-template-rows: repeat(2, minmax(170px, 1fr));
            grid-auto-flow: column;
            grid-auto-columns: calc((100% - 96px) / 5);
            gap: 24px;
            align-items: center;
            overflow-x: auto;
            overflow-y: hidden;
            padding: 22px 28px 30px;
            border: 1px solid var(--apotek-border);
            border-radius: 22px;
            background: rgba(255,255,255,0.025);
            box-shadow: 0 18px 34px rgba(0,0,0,0.12);
            scroll-behavior: smooth;
            overscroll-behavior-inline: contain;
            scrollbar-color: var(--apotek-primary) rgba(255, 255, 255, 0.08);
            scrollbar-width: thin;
        }

        .partner-grid::-webkit-scrollbar {
            height: 8px;
        }

        .partner-grid::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 999px;
        }

        .partner-grid::-webkit-scrollbar-thumb {
            background: var(--apotek-primary);
            border-radius: 999px;
        }

        .partner-card {
            min-height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px 12px;
            transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease, background 0.35s ease;
            will-change: transform;
        }

        .partner-card:hover {
            transform: translateY(-8px);
        }

        .partner-logo {
            max-width: 160px;
            max-height: 100px;
            width: 100%;
            object-fit: contain;
            filter: grayscale(0.08) brightness(1.06);
            transition: transform 0.35s ease, filter 0.35s ease;
        }

        .partner-card:hover .partner-logo {
            transform: scale(1.08);
            filter: grayscale(0) brightness(1.14) drop-shadow(0 8px 14px rgba(71, 214, 176, 0.18));
        }

        @media (prefers-reduced-motion: reduce) {
            .partner-card,
            .partner-logo {
                transition: none;
            }
        }

        @media (max-width: 680px) {
            .partner-grid {
                grid-auto-columns: minmax(120px, 42vw);
                gap: 14px;
                padding: 16px 18px 22px;
            }

            .partner-card {
                min-height: 140px;
            }
        }
    </style>
@endsection
