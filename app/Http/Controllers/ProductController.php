<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $badge = $request->query('badge');
        $search = $request->string('search')->trim()->value();
        $sort = $request->query('sort', 'popular');

        $query = Product::active();

        if ($category && $category !== 'all') {
            $query->byCategory($category);
        }

        if ($badge) {
            $query->where('badge', $badge);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $query = match ($sort) {
            'price_asc' => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            'newest' => $query->orderByDesc('created_at'),
            'rating' => $query->orderByDesc('rating'),
            default => $query->orderByDesc('review_count'),
        };

        $products = $query->paginate(12)->withQueryString();

        $categories = [
            'all' => 'Semua',
            'pod' => 'Pod System',
            'mod' => 'Mod Box',
            'liquid' => 'Liquid',
            'coil' => 'Coil',
            'battery' => 'Baterai',
            'starter' => 'Starter Kit',
        ];

        return view('products.index', compact('products', 'categories', 'category', 'badge', 'search', 'sort'));
    }

    public function show(Product $product)
    {
        if (! $product->is_active) {
            abort(404);
        }

        $related = Product::active()
            ->byCategory($product->category)
            ->where('id', '!=', $product->id)
            ->orderByDesc('review_count')
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'related'));
    }
}
