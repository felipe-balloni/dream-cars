<?php

namespace Tests\Feature\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CarPageTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_renders_component_successfully(): void
    {
        Livewire::test('cars-page')
            ->assertStatus(200); // verifica se o componente renderizou corretamente
    }

    #[Test]
    public function it_displays_correct_results_for_given_search_query(): void
    {
        // Cria itens específicos para testar busca
        Product::factory()->create(['name' => 'Produto Especial', 'description' => 'Descrição comum']);
        Product::factory()->create(['name' => 'Produto comum', 'description' => 'Essa é uma Descrição Especial']);
        Product::factory()->create(['name' => 'Outro Produto', 'description' => 'Outra descrição']);

        // Testa o componente com busca pelo termo "Especial"
        Livewire::test('cars-page', ['search' => 'Especial'])
            ->assertSee('Produto Especial')
            ->assertSee('Produto comum')
            ->assertDontSee('Outro Produto');
    }

    #[Test]
    public function it_handles_empty_search_queries_gracefully(): void
    {
        Product::factory()->create(['name' => 'Apenas um Produto']);

        Livewire::test('cars-page', ['search' => ''])
            ->assertSee('Apenas um Produto');
    }

    #[Test]
    public function it_handles_non_matching_search_queries_gracefully(): void
    {
        Product::factory()->create(['name' => 'Um item qualquer']);

        Livewire::test('cars-page', ['search' => 'inexistente'])
            ->assertDontSee('Um item qualquer')
            ->assertSee(__('No results found!'));
    }

    #[Test]
    public function it_resets_filters_correctly(): void
    {
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();

        Livewire::test('cars-page', [
            'search' => 'Especial',
            'sort' => 'newest',
            'queryStringCategories' => (string) $category->id,
            'queryStringBrands' => (string) $brand->id,
        ])
            ->assertSet('selectedCategories', [(string) $category->id])
            ->assertSet('selectedBrands', [(string) $brand->id])
            ->assertSet('search', 'Especial')
            ->assertSet('sort', 'newest')

            ->call('resetFilters')

            ->assertSet('selectedCategories', [])
            ->assertSet('selectedBrands', [])
            ->assertSet('search', '')
            ->assertSet('sort', 'most_popular');
    }

    #[Test]
    public function it_applies_selected_category_and_sorting_correctly(): void
    {
        $categoryA = Category::factory()->create(['name' => 'Sedan']);
        $categoryB = Category::factory()->create(['name' => 'SUV']);

        $sedanProduct = Product::factory()->create([
            'name' => 'Carro Sedan',
            'category_id' => $categoryA->id,
            'sales' => 10,
        ]);

        $suvProduct = Product::factory()->create([
            'name' => 'Carro SUV',
            'category_id' => $categoryB->id,
            'sales' => 20,
        ]);

        Livewire::test('cars-page', [
            'queryStringCategories' => (string) $categoryB->id,
            'sort' => 'most_popular',
        ])
            ->assertSee($suvProduct->name)
            ->assertDontSee($sedanProduct->name);
    }

    #[Test]
    public function it_removes_specific_category_filter(): void
    {
        $category = Category::factory()->create(['name' => 'Elétrico']);

        Livewire::test('cars-page', [
            'queryStringCategories' => (string) $category->id,
        ])
            ->assertSet('selectedCategories', [(string) $category->id])
            ->call('removeFilter', 'category', $category->id)
            ->assertSet('selectedCategories', []);
    }

    #[Test]
    public function it_sorts_products_correctly_by_most_popular(): void
    {
        Product::factory()->create([
            'name' => 'Carro Popular',
            'sales' => 100,
        ]);

        Product::factory()->create([
            'name' => 'Carro Menos Popular',
            'sales' => 5,
        ]);

        Livewire::test('cars-page', ['sort' => 'most_popular'])
            ->assertSeeInOrder(['Carro Popular', 'Carro Menos Popular']);
    }
}
