<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::truncate();

        $partners = [
            ['name' => 'Kalbe Farma', 'order' => 1, 'is_active' => true],
            ['name' => 'Sanbe Farma', 'order' => 2, 'is_active' => true],
            ['name' => 'Ultra Sakti', 'order' => 3, 'is_active' => true],
        ];

        foreach ($partners as $partner) {
            Partner::create([
                'name' => $partner['name'],
                'logo_url' => 'partners/default-logo.png',
                'order' => $partner['order'],
                'is_active' => $partner['is_active'],
            ]);
        }
    }
}
