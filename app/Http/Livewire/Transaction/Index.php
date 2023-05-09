<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.transaction.index', [
            'transactions' => Transaction::where('reference_no', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }
}
