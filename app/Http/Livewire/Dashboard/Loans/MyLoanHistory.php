<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use App\Models\User;
use App\Traits\LoanTrait;
use App\Traits\UserTrait;
use Livewire\Component;

class MyLoanHistory extends Component
{
    use UserTrait, LoanTrait;
    public $loan_requests, $users;

    public function render()
    {
        $this->users = User::role('user')->without('applications')->get();
        $this->loan_requests = Application::with('loan')->orWhere('closed', 1)->orWhere('status', 3)->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('livewire.dashboard.loans.my-loan-history')->layout('layouts.minatas');
    }
}
