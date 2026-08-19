<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number', 'customer_name', 'customer_email', 'customer_phone',
        'shipping_address', 'city', 'province', 'postal_code',
        'courier', 'shipping_cost', 'subtotal', 'total',
        'payment_method', 'status', 'notes',
    ];

    protected function casts(): array
    {
        return [
            'shipping_cost' => 'integer',
            'subtotal' => 'integer',
            'total' => 'integer',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalAttribute(): string
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'Menunggu Pembayaran',
            'paid' => 'Pembayaran Dikonfirmasi',
            'processing' => 'Diproses',
            'shipped' => 'Dikirim',
            'delivered' => 'Diterima',
            default => 'Tidak Diketahui',
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => '#F59E0B',
            'paid' => '#3B82F6',
            'processing' => '#8B5CF6',
            'shipped' => '#06B6D4',
            'delivered' => '#10B981',
            default => '#6B7280',
        };
    }
}
