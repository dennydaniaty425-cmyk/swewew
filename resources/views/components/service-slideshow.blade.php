<?php
use Illuminate\Support\Facades\Schema;

$banners = [];

if (Schema::hasTable('banners')) {
    $banners = \App\Models\Banner::where('is_active', true)->orderBy('order')->get();
}
?>

<div class="service-slideshow">
    <div class="slideshow-container">
        @forelse($banners as $banner)
            <!-- Slide: {{ $banner->title }} -->
            <div class="slide fade">
                <img src="{{ route('media.show', ['path' => $banner->image_url]) }}" alt="{{ $banner->title }}">
            </div>
        @empty
            <!-- Default Slide - Tampil jika belum ada banner -->
            <div class="slide fade">
                <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde0e?w=1200&h=675&fit=crop" alt="Obat Umum">
            </div>
        @endforelse

        <!-- Navigation Dots -->
        <div class="slide-dots">
            @php $totalSlides = max(count($banners), 1) @endphp
            @for($i = 1; $i <= $totalSlides; $i++)
                <span class="dot" onclick="currentSlide({{ $i }})"></span>
            @endfor
        </div>

        <!-- Navigation Arrows -->
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>
</div>

<script>
    let slideIndex = 1;
    let slideTimer;

    function showSlides(n) {
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');

        if (n > slides.length) slideIndex = 1;
        if (n < 1) slideIndex = slides.length;

        slides.forEach(slide => slide.style.display = 'none');
        dots.forEach(dot => dot.classList.remove('active'));

        slides[slideIndex - 1].style.display = 'block';
        dots[slideIndex - 1].classList.add('active');
    }

    function changeSlide(n) {
        clearTimeout(slideTimer);
        showSlides(slideIndex += n);
        startAutoSlide();
    }

    function currentSlide(n) {
        clearTimeout(slideTimer);
        showSlides(slideIndex = n);
        startAutoSlide();
    }

    function startAutoSlide() {
        slideTimer = setTimeout(() => {
            slideIndex++;
            showSlides(slideIndex);
            startAutoSlide();
        }, 5000); // Ganti slide setiap 5 detik
    }

    // Initialize
    showSlides(slideIndex);
    startAutoSlide();
</script>
