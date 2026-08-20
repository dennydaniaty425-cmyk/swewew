@extends('apotek.layout')

@section('title', 'Franchise | Apotek Alfa Group')

@section('content')
    @php
        $proposalPages = [
            'PROPOSAL HALAMAN  (1).jpg',
            'PROPOSAL HALAMAN  (2).jpg',
            'PROPOSAL HALAMAN  (3).jpg',
            'PROPOSAL HALAMAN  (4).jpg',
            'PROPOSAL HALAMAN  (5).jpg',
            'PROPOSAL HALAMAN (6).jpg',
            'PROPOSAL HALAMAN  (7).jpg',
            'PROPOSAL HALAMAN (8).jpg',
        ];
    @endphp

    <main class="franchise-page">
        <div class="container franchise-wrap">
            <div class="section-head franchise-heading">
                <div class="eyebrow">Franchise Apotek Alfa Group</div>
                    <h1>Bangun Bisnis Kesehatan Bersama Kami</h1>
                    <p>Apotek Alfa membuka peluang untuk Anda yang ingin bergabung ke dalam Group Waralaba kami.</p>
                    <div class="franchise-contact">
                        <a href="https://wa.me/6282155176611" target="_blank" rel="noopener" class="franchise-contact-phone">+62 821 5517 6611</a>
                        <a href="mailto:aptalfa.alkes@gmail.com" class="franchise-contact-email">aptalfa.alkes@gmail.com</a>
                    </div>
            </div>

            <div class="franchise-actions">
                <a href="{{ asset('Proposal-Franchise-Apotek-ALfa-2025-2.pdf') }}" target="_blank" rel="noopener" class="btn btn-primary">Buka Proposal PDF</a>
                <a href="{{ route('contact') }}" class="btn btn-secondary">Hubungi Kami</a>
            </div>

            <section class="proposal-gallery" aria-label="Proposal franchise halaman 1 sampai 8">
                @foreach($proposalPages as $index => $proposalPage)
                    <article class="proposal-page-card">
                        <div class="proposal-page-label">HALAMAN {{ $index + 1 }}</div>
                        <img src="{{ asset($proposalPage) }}" alt="Proposal franchise Apotek Alfa halaman {{ $index + 1 }}" loading="lazy">
                    </article>
                @endforeach
            </section>
        </div>
    </main>

    <style>
        .franchise-page {
            min-height: calc(100vh - 160px);
            padding: 64px 0 88px;
        }

        .franchise-wrap {
            max-width: 1180px;
        }

        .franchise-heading {
            max-width: 780px;
            margin: 0 auto;
            text-align: center;
        }

        .franchise-heading h1 {
            margin: 10px 0 14px;
            color: #ffffff;
        }

        .franchise-heading p {
            margin: 0;
            color: #f5ffff;
            font-size: 1.05rem;
        }

        .franchise-contact {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px 18px;
            margin-top: 18px;
            font-weight: 800;
        }

        .franchise-contact-phone,
        .franchise-contact-email {
            color: #ffffff;
        }

        .franchise-contact-phone:hover,
        .franchise-contact-email:hover {
            color: #ffffff;
        }

        .franchise-actions {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin: 28px 0 42px;
        }

        .proposal-gallery {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 26px;
        }

        .proposal-page-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            background: rgba(5, 112, 115, 0.5);
            box-shadow: 0 16px 30px rgba(0, 91, 100, 0.2);
        }

        .proposal-page-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .proposal-page-label {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 1;
            padding: 7px 10px;
            border-radius: 7px;
            background: #ff7b17;
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.08em;
        }

        @media (max-width: 720px) {
            .franchise-page {
                padding-top: 42px;
            }

            .proposal-gallery {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>
@endsection
