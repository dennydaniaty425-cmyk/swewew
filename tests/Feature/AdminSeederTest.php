<?php

uses(\Tests\TestCase::class);

test('database seeder creates default admin account', function () {
    $this->artisan('db:seed')
        ->assertSuccessful();

    $this->assertDatabaseHas('users', [
        'email' => 'admin@apotek.com',
    ]);
});
