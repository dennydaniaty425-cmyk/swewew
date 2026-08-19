<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'brand', 'category', 'description', 'specs',
        'price', 'price_original', 'badge', 'color_gradient',
        'image', 'image_thumb',
        'stock', 'rating', 'review_count', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'price_original' => 'integer',
            'stock' => 'integer',
            'rating' => 'decimal:1',
            'review_count' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedOriginalPriceAttribute(): ?string
    {
        if (! $this->price_original) {
            return null;
        }

        return 'Rp ' . number_format($this->price_original, 0, ',', '.');
    }

    public function getDiscountPercentAttribute(): ?int
    {
        if (! $this->price_original || $this->price_original <= $this->price) {
            return null;
        }

        return (int) round((1 - $this->price / $this->price_original) * 100);
    }
}
