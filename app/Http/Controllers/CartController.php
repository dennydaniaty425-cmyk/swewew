<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum('subtotal');

        return view('cart.index', compact('cart', 'subtotal'));
    }

    public function add(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        if ($product->stock < 1) {
            return back()->with('error', 'Stok produk habis.');
        }

        $quantity = (int) $request->integer('quantity', 1);
        $cart = session('cart', []);
        $key = (string) $product->id;

        if (isset($cart[$key])) {
            $newQty = min($cart[$key]['quantity'] + $quantity, $product->stock, 10);
            $cart[$key]['quantity'] = $newQty;
            $cart[$key]['subtotal'] = $product->price * $newQty;
        } else {
            $cart[$key] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'brand' => $product->brand,
                'price' => $product->price,
                'quantity' => $quantity,
                'subtotal' => $product->price * $quantity,
                'color_gradient' => $product->color_gradient,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', "\"{$product->name}\" ditambahkan ke keranjang.");
    }

    public function update(Request $request, int $productId): RedirectResponse
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        $cart = session('cart', []);
        $key = (string) $productId;

        if (isset($cart[$key])) {
            $quantity = $request->integer('quantity');
            $cart[$key]['quantity'] = $quantity;
            $cart[$key]['subtotal'] = $cart[$key]['price'] * $quantity;
            session(['cart' => $cart]);
        }

        return back()->with('success', 'Keranjang diperbarui.');
    }

    public function remove(int $productId): RedirectResponse
    {
        $cart = session('cart', []);
        unset($cart[(string) $productId]);
        session(['cart' => $cart]);

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }

    public function clear(): RedirectResponse
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Keranjang dikosongkan.');
    }
}
