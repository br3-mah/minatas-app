<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Classes\Exports\LoanExport;
use App\Models\Application;
use App\Models\User;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;

class ApprovedLoansView extends Component
{
    use EmailTrait, WalletTrait, LoanTrait, SettingTrait;
    public $loan_requests, $loan_request, $new_loan_user, $user_basic_pay, $user_net_pay, $loan_id;
    public $type = [];
    public $status = [];
    public $view = 'list';
    public $users, $due_date;
    public $assignModal = false;
    public function render()
    {
        try {
            // Retrieve users with the 'user' role, excluding their applications
            $this->users = User::role('user')->without('applications')->get();
            if (auth()->user()->hasRole('user')) {
                // Retrieve loan requests for the authenticated user and paginate the results (5 items per page)
                $this->loan_requests = Application::with('loan')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
                $requests = Application::with('loan')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(5);
                return view('livewire.dashboard.loans.approved-loans-view',[
                    'requests'=>$requests
                ])->layout('layouts.app');
            }else{
                if($this->current_configs('loan-approval')->value == 'auto'){
                    // get loan only if first review as approved
                    $this->loan_requests = $this->getLoanRequests('auto');
                }elseif($this->current_configs('loan-approval')->value == 'manual'){
                    $this->loan_requests = $this->getLoanRequests('manual');
                    $requests = $this->getLoanRequests('manual');
                }else{
                    $this->loan_requests = $this->getLoanRequests('spooling');
                    $requests = $this->getLoanRequests('spooling');
                }
                return view('livewire.dashboard.loans.approved-loans-view',[
                    'requests'=>$requests
                ])->layout('layouts.app');
            }
        } catch (\Throwable $th) {
            // If an exception occurs, set $loan_requests to an empty array
            $this->loan_requests = [];
            $requests = [];
            if (auth()->user()->hasRole('user')) {
                return view('livewire.dashboard.loans.approved-loans-view',[
                    'requests'=>$requests
                ])->layout('layouts.app');
            }else{
                dd($th);
                return view('livewire.dashboard.loans.approved-loans-view',[
                    'requests'=>$requests
                ])->layout('layouts.app');
            }
        }
    }
}
