<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'price_in_cents',
        'price',
        'category_id',
        'brand_id',
    ];

    protected $appends = ['price'];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function Brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value / 100,
            set: static fn ($value) => (int) ($value * 100),
        );
    }
}
