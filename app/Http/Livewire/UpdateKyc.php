<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateKyc extends Component
{
    public $view;
    public function mount(){
        $this->view = $_GET['view'];
    }
    public function render()
    {
        return view('livewire.update-kyc')
        ->layout('layouts.minatas');
    }
}
