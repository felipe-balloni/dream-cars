<?php

namespace App\Models;

use Database\Factories\BrandFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    /** @use HasFactory<BrandFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'slug', 'logo'];

    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
