<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Transaction;

class TransactionItem extends Component
{
    public $transactions;
    public function render()
    {
        $this->transactions = Transaction::with('application.user')->orderBy('created_at', 'desc')->get();
        return view('livewire.dashboard.transaction-item')
        ->layout('layouts.minatas');
    }
}
