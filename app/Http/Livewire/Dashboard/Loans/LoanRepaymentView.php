<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Classes\Exports\RepaymentExport;
use App\Models\Loans;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class LoanRepaymentView extends Component
{
    public $loan_requests;
    public function render()
    {
        $this->loan_requests = Loans::with(['application' => function($q){
            $q->where('user_id', auth()->user()->id);
        }])->where('closed', 0 )->orderBy('id', 'desc')->get();
        return view('livewire.dashboard.loans.loan-repayment-view')
        ->layout('layouts.minatas');

    }

    public function exportRepaymentLoans(){
        return Excel::download(new RepaymentExport(), 'Pending Repayment Loans.xlsx');
    }
}
