<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Update extends Component
{
    public $mode;
    public $show = false;
    public Product $product;

    protected $rules = [
        'product.name' => 'required',
        'product.price' => 'required',
        'product.stock' => 'required',
        'product.description' => 'required',

    ];

    public function mount()
    {
        if ($this->mode == 'create') {
            $this->product = new Product;
        }
    }

    public function save()
    {
        $this->validate();
        $this->product->save();
        $this->show = false;
        $this->emit('product');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.product.update');
    }
}
