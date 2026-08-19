<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $productIds = [
            'voopoo-drag-4-177w' => $this->productIdBySlug('voopoo-drag-4-177w'),
            'vaporesso-gtx-one-40w-kit' => $this->productIdBySlug('vaporesso-gtx-one-40w-kit'),
            'tropical-blast-saltnic-30ml' => $this->productIdBySlug('tropical-blast-saltnic-30ml'),
            'geekvape-aegis-x-200w' => $this->productIdBySlug('geekvape-aegis-x-200w'),
            'mixed-berry-ice-60ml' => $this->productIdBySlug('mixed-berry-ice-60ml'),
            'arctic-menthol-saltnic-30ml' => $this->productIdBySlug('arctic-menthol-saltnic-30ml'),
            'vanilla-custard-60ml' => $this->productIdBySlug('vanilla-custard-60ml'),
        ];

        return view('vape-store', compact('productIds'));
    }

    protected function productIdBySlug(string $slug): int
    {
        if (! Schema::hasTable('products')) {
            return 1;
        }

        return (int) (Product::query()->where('slug', $slug)->value('id') ?? 1);
    }
}
