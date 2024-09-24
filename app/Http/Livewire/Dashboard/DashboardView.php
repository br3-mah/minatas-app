<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Application;
use App\Models\Wallet;
use App\Models\WithdrawRequest;
use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use App\Traits\UserTrait;
use App\Traits\WalletTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class DashboardView extends Component
{

    use EmailTrait, WalletTrait, LoanTrait, UserTrait;
    public $my_loan, $util, $stage;

    public function render()
    {
        $this->isKYCComplete();
        $this->my_loan = $this->getCurrentLoan();
        $this->stage = $this->get_current_loan_status();
        $this->util = $this->meta();

        if (auth()->user()->hasRole('user')) {
            return view('livewire.dashboard.dashboard-view')
            ->layout('layouts.minatas');
        }
    }
}
