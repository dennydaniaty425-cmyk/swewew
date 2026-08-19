<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'adminapotekalfa@alfa.com'],
            [
                'name' => 'Admin Apotek',
                'password' => Hash::make('123456789'),
            ]
        );

        User::where('email', 'admin@apotek.com')
            ->whereKeyNot($admin->getKey())
            ->delete();

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
