<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kamu kosong.');
        }

        $subtotal = collect($cart)->sum('subtotal');

        $couriers = [
            'jne' => ['label' => 'JNE Regular', 'cost' => 15000, 'eta' => '2-3 hari'],
            'sicepat' => ['label' => 'SiCepat REG', 'cost' => 12000, 'eta' => '1-2 hari'],
            'gojek' => ['label' => 'GoSend Same Day', 'cost' => 25000, 'eta' => 'Hari ini'],
        ];

        return view('checkout.index', compact('cart', 'subtotal', 'couriers'));
    }

    public function store(CheckoutRequest $request): RedirectResponse
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kamu kosong.');
        }

        $couriers = [
            'jne' => 15000,
            'sicepat' => 12000,
            'gojek' => 25000,
        ];

        $validated = $request->validated();
        $shippingCost = $couriers[$validated['courier']];
        $subtotal = collect($cart)->sum('subtotal');
        $total = $subtotal + $shippingCost;

        $order = Order::create([
            'order_number' => 'VC-' . strtoupper(Str::random(8)),
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'shipping_address' => $validated['shipping_address'],
            'city' => $validated['city'],
            'province' => $validated['province'],
            'postal_code' => $validated['postal_code'],
            'courier' => $validated['courier'],
            'shipping_cost' => $shippingCost,
            'subtotal' => $subtotal,
            'total' => $total,
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item['product_id'],
                'product_name' => $item['name'],
                'product_brand' => $item['brand'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('checkout.success', $order->order_number);
    }

    public function success(string $orderNumber): View
    {
        $order = Order::with('items')
            ->where('order_number', $orderNumber)
            ->firstOrFail();

        return view('checkout.success', compact('order'));
    }
}
