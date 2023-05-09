<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Create extends Component
{
    public $show;
    public Transaction $transaction;
    public $ref;

    public Product $product;
    public $price, $quantity, $payment_amount;
    public function mount()
    {
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->quantity = 1;
        $this->calculatePayment();
    }
    public function render()
    {
        return view('livewire.transaction.create');
    }

    public function calculatePayment()
    {
        if ($this->price && $this->quantity) {

            $this->payment_amount = @$this->quantity * @$this->price;
        } else {
            $this->payment_amount = 0;
        }
    }

    public function updatedQuantity()
    {
        $this->calculatePayment();
    }
    public function updatedPrice()
    {
        $this->calculatePayment();
    }

    public function save()
    {
        $response = Http::withHeaders([
            'X-API-KEY' => 'DATAUTAMA',
        ])->post('https://pay.saebo.id/test-dau/api/v1/transactions', [
            'quantity' => $this->quantity,
            'price' => $this->price,
            'payment_amount' => $this->payment_amount,
        ])['data']['reference_no'];


        Transaction::create([
            'reference_no' => $response,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'payment_amount' => $this->payment_amount,
            'product_id' => $this->product->id,
        ]);
        $this->product->stock = $this->product->stock - $this->quantity;
        $this->product->save();
        $this->show = false;
        $this->quantity = 1;
        $this->emit('transaction');
    }
}
