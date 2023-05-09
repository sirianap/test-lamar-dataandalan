<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Detail extends Component
{
    public Product $product;
    protected $listeners = ['product' => 'mount', 'transaction' => 'mount'];
    public function mount()
    {
        $this->product =    $this->product->fresh();
    }
    public function render()
    {
        return view('livewire.product.detail');
    }
}
