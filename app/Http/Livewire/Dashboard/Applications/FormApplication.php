<?php

namespace App\Http\Livewire\Dashboard\Applications;

use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormApplication extends Component
{
    use UserTrait, LoanTrait, EmailTrait;
    public $util, $nrcPath, $tpinPath, $payslipPath, $bankstatementPath, $passportPath, $preapprovalPath, $loan_types;
    public $loan_child_types = [];
    public $loan_products = [];
    public $selectedLoanType;
    public $selectedLoanCategory = null;
    public $loan, $type, $category;

    public function mount()
    {
        $this->loan = $this->getCurrentLoan();
        $this->loan_types = DB::table('loan_types')->get();
    }

    public function updatedSelectedLoanType($loanTypeId)
    {
        $this->loan_child_types = DB::table('loan_child_types')
            ->where('loan_type_id', $loanTypeId)
            ->get();
            
        $this->selectedLoanCategory = null;
        $this->loan_products = [];
    }

    public function updatedSelectedLoanCategory($loanCategoryId)
    {
        $this->loan_products = DB::table('loan_products')
            ->where('loan_child_type_id', $loanCategoryId)
            ->get();
    }
    
    public function render()
    {
        $this->util = $this->meta();
        
        $this->type = $this->get_loan_type($this->loan->loan_type_id);
        $this->category = $this->get_loan_category($this->loan->loan_child_type_id);

        $this->nrcPath = $this->util && $this->util->uploads->where('name', 'nrc_file')->first() ? $this->util->uploads->where('name', 'nrc_file')->first()->path : '';
        $this->tpinPath = $this->util && $this->util->uploads->where('name', 'tpin_file')->first() ? $this->util->uploads->where('name', 'tpin_file')->first()->path : '';
        $this->payslipPath = $this->util && $this->util->uploads->where('name', 'payslip_file')->first() ? $this->util->uploads->where('name', 'payslip_file')->first()->path : '';
        $this->bankstatementPath = $this->util && $this->util->uploads->where('name', 'bankstatement')->first() ? $this->util->uploads->where('name', 'bankstatement')->first()->path : '';
        $this->passportPath = $this->util && $this->util->uploads->where('name', 'passport')->first() ? $this->util->uploads->where('name', 'passport')->first()->path : '';
        $this->preapprovalPath = $this->util && $this->util->uploads->where('name', 'preapproval')->first() ? $this->util->uploads->where('name', 'preapproval')->first()->path : '';
        
        return view('livewire.dashboard.applications.form-application')
        ->layout('layouts.app');
    }

    public function prefinal()
    {

        $this->util = $this->meta();
        $this->loan = $this->getCurrentLoan();
        $this->loan_types = DB::table('loan_types')->get();
        
    }
    public function completeApplication()
    {
        DB::beginTransaction();
        try {
            $this->updateLoan();
            $status = $this->getFirstLoanStatus();
            if (!$status) {
                throw new \Exception('Loan status not found for the given loan product.');
            }
            $this->insertApplicationStage($status);
            DB::commit();
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to complete application: ' . $th->getMessage());
            session()->flash('error', 'An error occurred while completing the application. Please try again.');
            return back(); 
        }
    }
    
    private function updateLoan()
    {
        $this->loan->continue = 0;
        $this->loan->complete = 1;
        $this->loan->status = 0;
        $this->loan->source = 'Web Application';
        $this->loan->save();
    }
    
    private function getFirstLoanStatus()
    {
        return DB::table('loan_statuses')
            ->join('statuses', 'loan_statuses.status_id', '=', 'statuses.id')
            ->select('loan_statuses.*', 'statuses.stage')
            ->where('loan_statuses.loan_product_id', $this->loan->loan_product_id)
            ->orderBy('loan_statuses.id', 'asc')
            ->first();
    }
    
    private function insertApplicationStage($status)
    {
        DB::table('application_stages')->insert([
            'application_id' => $this->loan->id,
            'loan_status_id' => $status->id ?? 1, // Dynamically fetch status ID, fallback to 1
            'state' => 'current',
            'status' => $status->stage ?? 'processing', // Use stage from the status or default to 'processing'
            'stage' => 'processing',
            'prev_status' => 'current',
            'curr_status' => '',
            'position' => 1
        ]);
    }
    
}
