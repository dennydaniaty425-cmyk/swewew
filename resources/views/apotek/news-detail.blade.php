@extends('apotek.layout')

@section('title', $news->description . ' | Apotek Alfa Group')

@section('content')
    <main class="news-detail-page">
        <div class="container news-detail-wrap">
            <a href="{{ route('home') }}" class="back-link">← Kembali</a>

            <div class="news-detail-card">
                <div class="news-detail-media">
                    @php
                        $galleryItems = is_array($news->gallery) ? $news->gallery : [];
                        $slides = array_values($galleryItems);
                    @endphp

                    @if(($news->media_type ?? 'image') === 'video')
                        @php $videoPath = ! empty($news->media_url) ? route('media.show', ['path' => str_replace('news/', '', $news->media_url)]) : ''; @endphp
                        @if($videoPath)
                            <video autoplay muted playsinline loop controls>
                                <source src="{{ $videoPath }}" type="video/mp4">
                            </video>
                        @endif
                    @elseif(!empty($slides))
                        <div class="gallery-slider">
                            @foreach($slides as $index => $slide)
                                @php $slideUrl = route('media.show', ['path' => str_replace('news/', '', $slide)]); @endphp
                                <img src="{{ $slideUrl }}" alt="Galeri berita Apotek Alfa Group" class="gallery-slide {{ $index === 0 ? 'active' : '' }}">
                            @endforeach
                            <div class="gallery-counter">1/{{ count($slides) }}</div>
                            <button type="button" class="gallery-arrow gallery-prev" aria-label="Sebelumnya">‹</button>
                            <button type="button" class="gallery-arrow gallery-next" aria-label="Berikutnya">›</button>
                        </div>
                    @else
                        @php $imagePath = ! empty($news->media_url) ? route('media.show', ['path' => str_replace('news/', '', $news->media_url)]) : ''; @endphp
                        @if($imagePath)
                            <img src="{{ $imagePath }}" alt="Berita Apotek Alfa Group">
                        @endif
                    @endif
                </div>

                <div class="news-detail-body">
                    <div class="news-detail-label">BERITA TERBARU</div>
                    <h1>{{ $news->description }}</h1>
                </div>
            </div>
        </div>
    </main>

    <style>
        .news-detail-page {
            padding: 52px 0 80px;
            min-height: calc(100vh - 160px);
        }

        .news-detail-wrap {
            max-width: 860px;
        }

        .back-link {
            display: inline-block;
            color: var(--apotek-primary);
            font-weight: 700;
            margin-bottom: 18px;
        }

        .news-detail-card {
            background: rgba(10, 29, 31, 0.85);
            border: 1px solid var(--apotek-border);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
            max-width: 860px;
            margin: 0 auto;
        }

        .news-detail-media {
            width: 100%;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 300px;
        }

        .news-detail-media video {
            width: 100%;
            height: auto;
            max-height: 62vh;
            object-fit: contain;
            display: block;
        }

        .news-detail-media img {
            width: 100%;
            height: 100%;
            max-height: 62vh;
            object-fit: contain;
            display: block;
            background: #050b0d;
        }

        .gallery-slider {
            position: relative;
            width: 100%;
            height: 460px;
            overflow: hidden;
            background: #000;
        }

        .gallery-slide {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #050b0d;
            opacity: 0;
            transition: opacity 0.35s ease;
            display: block;
        }

        .gallery-slide.active {
            opacity: 1;
            z-index: 1;
        }

        .gallery-counter {
            position: absolute;
            right: 20px;
            bottom: 18px;
            z-index: 3;
            background: rgba(0, 0, 0, 0.55);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.08em;
        }

        .gallery-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 42px;
            height: 42px;
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.4);
            color: #fff;
            font-size: 2rem;
            cursor: pointer;
            z-index: 2;
        }

        .gallery-prev { left: 16px; }
        .gallery-next { right: 16px; }

        .news-detail-body {
            padding: 18px 20px 22px;
        }

        .news-detail-label {
            display: inline-flex;
            padding: 8px 12px;
            border: 1px solid rgba(57, 208, 207, 0.7);
            border-radius: 999px;
            background: rgba(8, 34, 38, 0.8);
            color: var(--apotek-primary);
            font-size: 0.66rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .news-detail-body h1 {
            margin: 0;
            color: var(--apotek-text);
            font-size: clamp(1.05rem, 1.55vw, 1.8rem);
            line-height: 1.2;
            letter-spacing: -0.03em;
        }

        @media (max-width: 768px) {
            .gallery-slider {
                height: 300px;
            }

            .news-detail-media video {
                max-height: 420px;
            }

            .news-detail-media img {
                max-height: 420px;
            }

            .news-detail-body {
                padding: 16px 16px 18px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slider = document.querySelector('.gallery-slider');
            if (!slider) return;

            const slides = Array.from(slider.querySelectorAll('.gallery-slide'));
            const counter = slider.querySelector('.gallery-counter');
            if (slides.length === 0) return;

            let index = 0;
            const updateCounter = () => {
                if (counter) {
                    counter.textContent = `${index + 1}/${slides.length}`;
                }
            };

            const showSlide = (nextIndex) => {
                index = (nextIndex + slides.length) % slides.length;
                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === index);
                });
                updateCounter();
            };

            const next = () => showSlide(index + 1);
            const prev = () => showSlide(index - 1);

            updateCounter();
            slider.querySelector('.gallery-next')?.addEventListener('click', next);
            slider.querySelector('.gallery-prev')?.addEventListener('click', prev);
        });
    </script>
@endsection
