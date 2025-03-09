<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(['Toyota', 'Ford', 'Volkswagen', 'BMW', 'Honda', 'Audi', 'Mercedes-Benz', 'Porsche', 'Chevrolet', 'Nissan', 'Tesla'])
            ->each(fn ($brand) => Brand::factory()
                ->create(['name' => $brand, 'slug' => Str::slug($brand)]));

        collect(['SUV', 'Sedan', 'Hatchback', 'Pickup', 'Esportivo', 'Elétrico'])
            ->each(fn ($category) => Category::factory()
                ->create(['name' => $category, 'slug' => Str::slug($category)]));

        $products = [
            [
                'name' => 'Corolla',
                'brand' => 'Toyota',
                'category' => 'Sedan',
                'description' => 'Toyota Corolla, um sedan confiável, econômico e indicado para longas viagens.',
                'image_url' => 'resources/images/corolla.png',
            ],
            [
                'name' => 'RAV4',
                'brand' => 'Toyota',
                'category' => 'SUV',
                'description' => 'Toyota RAV4, um SUV com conforto e robustez, ideal para famílias e aventuras.',
                'image_url' => 'resources/images/rav4.png',
            ],
            [
                'name' => 'Golf',
                'brand' => 'Volkswagen',
                'category' => 'Hatchback',
                'description' => 'Volkswagen Golf Hatchback, esportivo, compacto e com eficiência energética.',
                'image_url' => 'resources/images/golf.png',
            ],
            [
                'name' => 'Amarok',
                'brand' => 'Volkswagen',
                'category' => 'Pickup',
                'description' => 'Volkswagen Amarok, pickup robusta, resistente a terrenos difíceis e perfeita para o trabalho.',
                'image_url' => 'resources/images/amarok.png',
            ],
            [
                'name' => 'Mustang',
                'brand' => 'Ford',
                'category' => 'Esportivo',
                'description' => 'Ford Mustang, lendário esportivo americano com potência incomparável.',
                'image_url' => 'resources/images/mustang.png',
            ],
            [
                'name' => 'Civic',
                'brand' => 'Honda',
                'category' => 'Sedan',
                'description' => 'Honda Civic, sedan reconhecido pela esportividade, conforto e elegância.',
                'image_url' => 'resources/images/civic.png',
            ],
            [
                'name' => 'X5',
                'brand' => 'BMW',
                'category' => 'SUV',
                'description' => 'BMW X5, SUV premium com luxo, performance e tecnologia avançada.',
                'image_url' => 'resources/images/x5.png',
            ],
            [
                'name' => 'Audi A4',
                'brand' => 'Audi',
                'category' => 'Sedan',
                'description' => 'Audi A4, um sedan premium com design moderno, conforto e tecnologia avançada.',
                'image_url' => 'resources/images/audi-a4.png',
            ],
            [
                'name' => 'Mercedes-Benz GLE',
                'brand' => 'Mercedes-Benz',
                'category' => 'SUV',
                'description' => 'Mercedes-Benz GLE, um SUV luxuoso com alto desempenho e tecnologia de ponta.',
                'image_url' => 'resources/images/mercedes-gle.png',
            ],
            [
                'name' => 'Porsche 911',
                'brand' => 'Porsche',
                'category' => 'Esportivo',
                'description' => 'Porsche 911, um dos carros esportivos mais icônicos, com desempenho impressionante.',
                'image_url' => 'resources/images/porsche-911.png',
            ],
            [
                'name' => 'Chevrolet Camaro',
                'brand' => 'Chevrolet',
                'category' => 'Esportivo',
                'description' => 'Chevrolet Camaro, um muscle car com design agressivo e motor potente.',
                'image_url' => 'resources/images/camaro.png',
            ],
            [
                'name' => 'Nissan GT-R',
                'brand' => 'Nissan',
                'category' => 'Esportivo',
                'description' => 'Nissan GT-R, um superesportivo lendário com alta performance e tecnologia avançada.',
                'image_url' => 'resources/images/nissan-gtr.png',
            ],
            [
                'name' => 'Tesla Model S',
                'brand' => 'Tesla',
                'category' => 'Elétrico',
                'description' => 'Tesla Model S, um sedan elétrico futurista com tecnologia inovadora e desempenho impressionante.',
                'image_url' => 'resources/images/tesla-model-s.png',
            ],
        ];

        foreach ($products as $product) {
            $brand = Brand::where('name', $product['brand'])->first();
            $category = Category::where('name', $product['category'])->first();

            Product::factory()->create([
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'image' => $product['image_url'],
                'brand_id' => $brand->id,
                'category_id' => $category->id,
            ]);
        }
    }
}
