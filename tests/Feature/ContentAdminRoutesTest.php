<?php

use App\Models\Content;
use App\Models\User;

uses(\Tests\TestCase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->content = Content::create([
        'media_type' => 'video',
        'media_url' => 'content-video/demo.mp4',
        'description' => 'Berita demo',
        'carousel_count' => 3,
        'order' => 1,
        'is_active' => true,
    ]);
});

test('admin content create and edit pages render with media options, description, and carousel count', function () {
    $this->actingAs($this->user)
        ->get('/admin/content')
        ->assertStatus(200)
        ->assertSee('Daftar Konten')
        ->assertSee('Berita demo');

    $this->actingAs($this->user)
        ->get('/admin/content/create')
        ->assertStatus(200)
        ->assertSee('Pilih Jenis Media')
        ->assertSee('Video')
        ->assertSee('Foto Carousel')
        ->assertSee('Deskripsi Berita')
        ->assertSee('Jumlah Foto Yang Tampil')
        ->assertDontSee('Isi Konten');

    $this->actingAs($this->user)
        ->get('/admin/content/' . $this->content->id . '/edit')
        ->assertStatus(200)
        ->assertSee('Edit Konten')
        ->assertSee('Pilih Jenis Media')
        ->assertSee('Deskripsi Berita')
        ->assertSee('Jumlah Foto Yang Tampil')
        ->assertDontSee('Isi Konten');

    $this->actingAs($this->user)
        ->get('/konten/' . $this->content->id)
        ->assertStatus(200)
        ->assertSee('Berita demo')
        ->assertSee('BERITA TERBARU');
});
