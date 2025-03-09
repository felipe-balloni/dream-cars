<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class CarDetails extends Component
{
    public $product;

    public $modalOpen = false;

    protected $listeners = [
        'openProductModal' => 'openModal',
    ];

    public function openModal($productId): void
    {
        $this->product = Product::with(['category:id,name,slug', 'brand:id,name,slug'])->findOrFail($productId);
        $this->modalOpen = true;
    }

    public function closeModal(): void
    {
        $this->modalOpen = false;
        $this->product = null;
    }

    public function render(): \Illuminate\Contracts\View\View|Application|Factory|View
    {
        return view('livewire.car-details');
    }
}
