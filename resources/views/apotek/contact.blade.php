@extends('apotek.layout')

@section('title', 'Hubungi Kami | Apotek Alfa Group')

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="hero" style="padding: 60px 0 80px;">
            <div class="container">
                <div style="text-align: center; max-width: 760px; margin: 0 auto;">
                    <div class="eyebrow">Hubungi Kami</div>
                    <h1 style="font-size: clamp(2rem, 4vw, 3.5rem); margin-bottom: 18px;">Siap Membantu Kebutuhan Kesehatan Anda</h1>
                    <p style="color: var(--apotek-muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
                        Tim Apotek Alfa Group tersedia untuk menjawab pertanyaan Anda, memberikan konsultasi produk, dan melayani pesanan dengan sepenuh hati.
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Methods Grid -->
        <section class="section" style="padding-top: 0;">
            <div class="container">
                <div class="contact-methods-grid">
                    <!-- WhatsApp -->
                    <div class="contact-method-card">
                        <div class="contact-method-icon" style="background: linear-gradient(135deg, #25d366 0%, #1ebd5d 100%);">
                            <svg viewBox="0 0 24 24" fill="white" style="width: 32px; height: 32px;">
                                <path d="M20.52 3.48A11.86 11.86 0 0 0 12.1 0C5.52 0 .13 5.39.13 12.02c0 2.12.55 4.18 1.6 5.99L0 24l6.1-1.6a11.97 11.97 0 0 0 5.99 1.53h.01c6.58 0 11.97-5.39 11.97-12.02 0-3.21-1.25-6.23-3.48-8.43ZM12.1 21.9h-.01a9.9 9.9 0 0 1-5.05-1.38l-.36-.21-3.62.95.97-3.53-.24-.37A9.93 9.93 0 0 1 2.15 12c0-5.48 4.47-9.95 9.95-9.95 2.66 0 5.16 1.04 7.05 2.93a10.03 10.03 0 0 1 2.92 7.06c0 5.48-4.47 9.95-9.95 9.95Zm5.46-7.43c-.3-.15-1.77-.87-2.05-.97-.28-.1-.48-.15-.68.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.08-.3-.15-1.27-.47-2.42-1.49-.9-.8-1.5-1.78-1.68-2.08-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.38-.02-.53-.08-.15-.68-1.64-.94-2.25-.25-.6-.5-.52-.68-.53l-.58-.01c-.2 0-.53.08-.8.38-.28.3-1.07 1.05-1.07 2.57 0 1.52 1.1 2.97 1.25 3.17.15.2 2.16 3.3 5.23 4.62.73.32 1.3.52 1.75.66.74.23 1.41.2 1.94.12.59-.09 1.77-.72 2.02-1.42.25-.7.25-1.3.18-1.42-.08-.12-.28-.2-.58-.35Z"/>
                            </svg>
                        </div>
                        <h3>Chat WhatsApp</h3>
                        <p>Dapatkan respons cepat untuk pertanyaan dan pesanan Anda melalui WhatsApp.</p>
                        <a href="https://wa.me/6282114422093" target="_blank" rel="noopener" class="btn btn-primary" style="margin-top: 18px;">
                            Chat Sekarang
                        </a>
                    </div>

                    <!-- Telepon -->
                    <div class="contact-method-card">
                        <div class="contact-method-icon" style="background: linear-gradient(135deg, var(--apotek-primary) 0%, var(--apotek-primary-strong) 100%);">
                            <svg viewBox="0 0 24 24" fill="white" style="width: 32px; height: 32px;">
                                <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.86l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
                            </svg>
                        </div>
                        <h3>Telepon</h3>
                        <p>Hubungi kami langsung untuk konsultasi produk kesehatan dan informasi lainnya.</p>
                        <a href="tel:+6282114422093" class="btn btn-primary" style="margin-top: 18px;">
                            +62 821-1442-2093
                        </a>
                    </div>

                    <!-- Email -->
                    <div class="contact-method-card">
                        <div class="contact-method-icon" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);">
                            <svg viewBox="0 0 24 24" fill="white" style="width: 32px; height: 32px;">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <h3>Email</h3>
                        <p>Kirim pertanyaan atau saran Anda melalui email untuk mendapat balasan profesional.</p>
                        <a href="mailto:aptalfa.alkes@gmail.com" class="btn btn-primary" style="margin-top: 18px;">
                            aptalfa.alkes@gmail.com
                        </a>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="contact-method-card">
                        <div class="contact-method-icon" style="background: linear-gradient(135deg, #ffa500 0%, #ff8c42 100%);">
                            <svg viewBox="0 0 24 24" fill="white" style="width: 32px; height: 32px;">
                                <path d="M11.99 5C6.47 5 2 9.48 2 15s4.47 10 9.99 10C17.52 25 22 20.52 22 15s-4.48-10-10.01-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11V16l5.25 3.15.75-1.23-4.5-2.67z"/>
                            </svg>
                        </div>
                        <h3>Jam Operasional</h3>
                        <p style="margin-bottom: 14px;">Kami melayani Anda dengan sepenuh hati setiap hari.</p>
                        <div style="font-size: 0.95rem; color: var(--apotek-muted);">
                            <div style="margin-bottom: 6px;"><strong style="color: var(--apotek-text);">Senin - Jumat:</strong> 08:00 - 18:00</div>
                            <div style="margin-bottom: 6px;"><strong style="color: var(--apotek-text);">Sabtu:</strong> 08:00 - 17:00</div>
                            <div><strong style="color: var(--apotek-text);">Minggu:</strong> 09:00 - 16:00</div>
                        </div>
                    </div>

                    <!-- Instagram -->
                    <div class="contact-method-card">
                        <div class="contact-method-icon" style="background: linear-gradient(135deg, #feda75 0%, #d62976 52%, #4f5bd5 100%);">
                            <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" style="width: 32px; height: 32px;">
                                <rect x="3" y="3" width="18" height="18" rx="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="1" fill="white" stroke="none"/>
                            </svg>
                        </div>
                        <h3>Instagram</h3>
                        <p>Ikuti informasi dan aktivitas terbaru Apotek Alfa Group melalui Instagram kami.</p>
                        <a href="https://www.instagram.com/alfa_kencana_sukses/" target="_blank" rel="noopener" class="btn btn-primary" style="margin-top: 18px;">
                            Kunjungi Instagram
                        </a>
                    </div>

                    <!-- TikTok -->
                    <div class="contact-method-card">
                        <div class="contact-method-icon" style="background: linear-gradient(135deg, #111111 0%, #252525 100%);">
                            <svg viewBox="0 0 24 24" fill="white" style="width: 32px; height: 32px;">
                                <path d="M16.7 3c.3 1.8 1.3 3.2 3.3 3.8v3.1c-1.2-.1-2.3-.5-3.3-1.1v6.3c0 3.2-2.5 5.7-5.7 5.7-3.1 0-5.5-2.3-5.5-5.3 0-3.1 2.5-5.5 5.7-5.5.3 0 .6 0 .9.1v3.1c-.3-.1-.6-.2-.9-.2-1.4 0-2.5 1-2.5 2.4 0 1.3 1 2.3 2.4 2.3 1.5 0 2.5-1.1 2.5-2.7V3h3.1z"/>
                            </svg>
                        </div>
                        <h3>TikTok</h3>
                        <p>Ikuti konten dan informasi terbaru Apotek Alfa Group di TikTok kami.</p>
                        <a href="https://www.tiktok.com/@aptalfagroup" target="_blank" rel="noopener" class="btn btn-primary" style="margin-top: 18px;">
                            Kunjungi TikTok
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <style>
        .contact-methods-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 28px;
            margin-top: 20px;
        }

        .contact-method-card {
            padding: 32px 24px;
            border: 1px solid var(--apotek-border);
            border-radius: 16px;
            background: rgba(255,255,255,0.02);
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .contact-method-card:hover {
            border-color: var(--apotek-primary);
            background: rgba(57, 208, 207, 0.04);
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(57, 208, 207, 0.12);
        }

        .contact-method-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }

        .contact-method-card h3 {
            font-size: 1.3rem;
            margin-bottom: 12px;
            color: var(--apotek-text);
        }

        .contact-method-card p {
            color: var(--apotek-muted);
            font-size: 0.95rem;
            line-height: 1.5;
            margin: 0;
            flex-grow: 1;
        }

        .contact-method-card a {
            align-self: flex-start;
        }

        @media (max-width: 680px) {
            .contact-methods-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .cta-box {
                flex-direction: column !important;
                text-align: center;
            }

            .cta-box a {
                width: 100%;
            }
        }
    </style>
@endsection
