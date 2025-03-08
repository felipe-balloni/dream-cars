<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->words(3, true),
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraphs(1, true),
            'image' => 'https://picsum.photos/240/360.webp',
            'price_in_cents' => $this->faker->numberBetween(1000, 10000),
            'rating' => $this->faker->randomFloat(1, 4, 5),
            'sales' => $this->faker->numberBetween(1, 20),
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
        ];
    }
}
