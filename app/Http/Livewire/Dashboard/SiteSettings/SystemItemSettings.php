<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use App\Models\DisbursedBy;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;
use App\Models\LoanAccountPayment;
use App\Models\LoanDecimalPlace;
use App\Models\LoanDisbursedBy;
use App\Models\LoanInterestMethod;
use App\Models\LoanInterestType;
use App\Models\LoanProduct;
use App\Models\LoanRepaymentCycle;
use App\Models\LoanRepaymentOrder;
use App\Models\Penalty;
use App\Models\RepaymentCycle;
use App\Models\RepaymentOrder;
use App\Models\ServiceCharge;
use App\Traits\DisbursementTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SystemItemSettings extends Component
{
    use SettingTrait, LoanTrait, DisbursementTrait;
    public $settings, $title, $subtitle, $current_conf;
    public $loan_products, $disbursements, $repayment_cycles, $penalties, $loan_fees;
    public function render()
    {
        $this->settings = $_GET['settings'];
        $this->current_conf = $this->current_configs($_GET['settings']);
        // Loan Products
        $this->loan_products = $this->get_all_loan_products();
        // Disbursement Methods
        $this->disbursements = $this->get_all_disbursement_methods();
        // Repayment Cycles
        $this->repayment_cycles = $this->get_all_repayment_cycle();
        // Repayment Cycles
        $this->penalties = $this->get_all_penalties();
        $this->loan_fees = $this->get_all_loan_fees();
        return view('livewire.dashboard.site-settings.system-item-settings')
        ->layout('layouts.admin');
    }

    // System Setting Delete Functions
    public function deleteLoanProduct($id){
        try {
            LoanDisbursedBy::where('loan_product_id', $id)->delete();
            LoanInterestMethod::where('loan_product_id', $id)->delete();
            LoanInterestType::where('loan_product_id', $id)->delete();
            LoanRepaymentCycle::where('loan_product_id', $id)->delete();
            LoanDecimalPlace::where('loan_product_id', $id)->delete();
            LoanAccountPayment::where('loan_product_id', $id)->delete();
            LoanProduct::where('id', $id)->delete();
            Session::flash('success', "Loan product deleted successfully.");
        } catch (\Throwable $th) {
            Session::flash('success', "Loan product deleted successfully.");
        }
    }

    public function deleteRepaymentCycle($id){
        try {
            RepaymentCycle::where('id', $id)->delete();
            Session::flash('success', "Repayment Cycle deleted successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-repayment-cycle']);
        } catch (\Throwable $th) {
            Session::flash('success', "Repayment Cycle deleted successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-repayment-cycle']);
        }
    }
    public function deletePenalty($id){
        try {
            Penalty::where('id', $id)->delete();
            Session::flash('success', "Penalty deleted successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-penalty-settings']);
        } catch (\Throwable $th) {
            Session::flash('success', "Penalty deleted successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-penalty-settings']);
        }
    }
    public function deleteDisbursement($id){
        try {
            DisbursedBy::where('id', $id)->delete();
            Session::flash('success', "Disbursement method deleted successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-disbursements']);
        } catch (\Throwable $th) {
            Session::flash('success', "Disbursement method deleted successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-disbursements']);
        }
    }
    public function deleteLoanFee($id){
        try {
            ServiceCharge::where('id', $id)->delete();
            Session::flash('success', "Loan Fee deleted successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-fees']);
        } catch (\Throwable $th) {
            Session::flash('success', "Loan Fee deleted successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-fees']);
        }
    }
    
}
