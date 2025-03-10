<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CarsPage extends Component
{
    use WithPagination;

    public array $selectedCategories = [];

    #[Url(as: 'c', except: '')]
    public string $queryStringCategories = '';

    public array $selectedBrands = [];

    #[Url(as: 'b', except: '')]
    public string $queryStringBrands = '';

    #[Url(as: 'q', except: '')]
    public string $search = '';

    #[Url(as: 's', except: '')]
    public string $sort = 'most_popular';

    public $selectedFilter;

    public function mount(): void
    {
        if (! empty($this->queryStringCategories)) {
            $this->selectedCategories = explode(',', $this->queryStringCategories);
        }

        if (! empty($this->queryStringBrands)) {
            $this->selectedBrands = explode(',', $this->queryStringBrands);
        }

        $this->getFiltersNames();
    }

    private function getFiltersNames(): void
    {
        $selectedCategoryNames = Category::query()
            ->select('id', 'name')
            ->whereIn('id', $this->selectedCategories)
            ->get()
            ->map(fn ($category) => ['type' => 'category', 'id' => $category->id, 'name' => $category->name])
            ->values()
            ->toArray();

        $selectedBrandNames = Brand::query()
            ->select('id', 'name')
            ->whereIn('id', $this->selectedBrands)
            ->get()
            ->map(fn ($brand) => ['type' => 'brand', 'id' => $brand->id, 'name' => $brand->name])
            ->values()
            ->toArray();

        $this->selectedFilter = array_merge($selectedCategoryNames, $selectedBrandNames);
    }

    public function updatedSelectedCategories(): void
    {
        $this->queryStringCategories = implode(',', $this->selectedCategories);
        $this->getFiltersNames();
    }

    public function updatedSelectedBrands(): void
    {
        $this->queryStringBrands = implode(',', $this->selectedBrands);
        $this->getFiltersNames();
    }

    public function resetFilters(): void
    {
        $this->selectedCategories = [];
        $this->selectedBrands = [];
        $this->getFiltersNames();
        $this->search = '';
        $this->sort = 'most_popular';
    }

    public function search(): void
    {
        $this->resetPage();
    }

    public function removeFilter(string $type, int $id): void
    {
        if ($type === 'category') {
            $this->selectedCategories = array_diff($this->selectedCategories, [$id]);

        } else {
            $this->selectedBrands = array_diff($this->selectedBrands, [$id]);
        }

        $this->getFiltersNames();
        $this->updatedSelectedCategories();
        $this->updatedSelectedBrands();
    }

    public function render(): \Illuminate\Contracts\View\View|Application|Factory|View
    {
        $sorts = ['most_popular', 'newest', 'best_rating'];
        $brands = Brand::query()->select('id', 'name')->orderBy('name')->get();
        $categories = Category::query()->select('id', 'name')->orderBy('name')->get();

        $products = Product::query()
            ->select(
                'id',
                'name',
                'slug',
                'description',
                'image',
                'price_in_cents',
                'rating',
                'sales',
                'category_id',
                'brand_id',
                'created_at',
            )
            ->with('category:id,name,slug', 'brand:id,name,slug')
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('description', 'like', "%{$this->search}%");
                });
            })
            ->when($this->selectedCategories, function ($query) {
                $query->WhereIn('category_id', $this->selectedCategories);
            })
            ->when($this->selectedBrands, function ($query) {
                $query->WhereIn('brand_id', $this->selectedBrands);
            })
            ->when($this->sort === 'most_popular', function ($query) {
                $query->orderBy('sales', 'desc');
            })
            ->when($this->sort === 'newest', function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->when($this->sort === 'best_rating', function ($query) {
                $query->orderBy('rating', 'desc');
            })
            ->paginate(6);

        return view('livewire.cars-page', compact('sorts', 'brands', 'categories', 'products'));
    }

    protected function applySorting($query)
    {
        return match ($this->sort) {
            'most_popular' => $query->orderBy('sales', 'desc'),
            'newest' => $query->orderBy('created_at', 'desc'),
            'best_rating' => $query->orderBy('rating', 'desc'),
            default => $query
        };
    }
}
