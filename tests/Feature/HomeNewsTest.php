<?php

use App\Models\News;

uses(\Tests\TestCase::class);

test('home page displays active news items', function () {
    News::create([
        'media_type' => 'image',
        'media_url' => 'news/test.jpg',
        'description' => 'Promo kesehatan terbaru untuk keluarga',
        'is_active' => true,
        'order' => 1,
    ]);

    $response = $this->get('/');

    $response->assertStatus(200)
        ->assertSee('BERITA TERBARU')
        ->assertSee('Promo kesehatan terbaru untuk keluarga');
});

test('news detail page renders autoplay video and description', function () {
    $news = News::create([
        'media_type' => 'video',
        'media_url' => 'news/demo.mp4',
        'description' => 'Deskripsi detail berita untuk video autoplay.',
        'is_active' => true,
        'order' => 1,
    ]);

    $this->get(route('news.show', $news))
        ->assertOk()
        ->assertSee('Deskripsi detail berita untuk video autoplay.')
        ->assertSee('autoplay', false)
        ->assertSee('playsinline', false);
});

test('news detail page supports multiple carousel images', function () {
    $news = News::create([
        'media_type' => 'image',
        'media_url' => 'news/cover.jpg',
        'gallery' => ['news/slide-1.jpg', 'news/slide-2.jpg'],
        'description' => 'Berita dengan galeri slide foto.',
        'is_active' => true,
        'order' => 2,
    ]);

    $this->get(route('news.show', $news))
        ->assertOk()
        ->assertSee('Berita dengan galeri slide foto.')
        ->assertSee('news/slide-1.jpg')
        ->assertSee('news/slide-2.jpg');
});
