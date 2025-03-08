<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \Faker\Provider\Company($this->faker));

        return [
            'name' => $name = $this->faker->unique()->company(),
            'slug' => Str::slug($name),
            'logo' => 'https://picsum.photos/300/300.webp',
        ];
    }
}
