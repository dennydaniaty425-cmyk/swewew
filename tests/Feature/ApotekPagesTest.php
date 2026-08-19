<?php

uses(\Tests\TestCase::class);

test('apotek landing pages are available', function () {
    $home = $this->get('/');
    $home->assertStatus(200)
        ->assertSee('Apotek Alfa Group');

    $about = $this->get('/tentang-kami');
    $about->assertStatus(200)
        ->assertSee('Tentang Kami');

    $partners = $this->get('/mitra-kami');
    $partners->assertStatus(200)
        ->assertSee('Mitra Kami');

    $contact = $this->get('/hubungi-kami');
    $contact->assertStatus(200)
        ->assertSee('Hubungi Kami');
});
