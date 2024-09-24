<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class TransactionView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.transaction-view')
        ->layout('layouts.minatas');
    }
}
