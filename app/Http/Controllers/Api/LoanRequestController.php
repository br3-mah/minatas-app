<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Loans;
use App\Models\Wallet;
use App\Models\WithdrawRequest;
use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use App\Traits\WalletTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoanRequestController extends Controller
{
    use EmailTrait, WalletTrait, LoanTrait;

    public function getMyLoans($id){

        try {
            $data = Application::with('loan_product')
            ->where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

            return response()->json(['data' => $data]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function makeWithdrawalRequest(Request $request){
        try {
            $uuid = Str::orderedUuid();
            WithdrawRequest::create([
                'wallet_id' => Wallet::where('user_id', $request['user_id'])->first()->id,
                'amount' => $request['withdraw_amount'],
                'ref' => substr($uuid, 0, 6),
                'withdraw_method' => $request['payment_method'],
                'mobile_number' => $request['mobile_number'],
                'card_name' => $request['card_name'],
                'bank_name' => $request['bank_name'],
                'comments' => 'You have received a new wallet withdraw request',
                'card_number' => $request['card_number'],
                'user_id' =>  $request['user_id']
            ]);

            return response()->json(['message' => 'Your withdraw request has been sent']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed']);
        }
    }

    public function getWithdrawalRequests($id){
        $requests = $this->getWithdrawRequests();
        return response()->json(['data' => $requests]);
    }

    public function getWallets($id){
        $wallet = $this->getUserWallet($id);
        return response()->json(['amount' => $wallet]);
    }

    public function loanBalance($id){
        return Loans::loan_balance($id);
    }

    public function customerBalance($user_id){
        return Loans::customer_balance($user_id);
    }

    public function interestAmount($duration, $amount){
        return Application::interest_amount($amount, $duration);
    }

    public function loanMonthlyInstallments($duration, $amount){
        return Application::monthly_installment($amount, $duration);
    }

    public function interestRate($duration){
        // return (Application::interest_rate($duration) * 100).'%';
    }

    public function totalCollectable($duration, $amount){
        return Application::payback($amount, $duration);
    }

    public function createLoan(Request $request){
        $data = $request->all();
        return $this->apply_loan($data);
    }

    public function changePrincipalAmount(Request $request)
    {
        try {
            $amountInput = $request->input('amount');
            $applicationId = $request->input('application_id');

            // Validate inputs
            if (!$amountInput || !$applicationId) {
                return redirect()->back()->with('error', 'Missing data. Please provide all required fields.');
            }

            // Sanitize and convert the amount to a float
            $amount = str_replace(',', '', $amountInput); // Remove commas
            $amount = floatval($amount); // Convert to float

            // Attempt to update the application with the new amount
            $updated = Application::where('id', $applicationId)->update([
                'amount' => $amount,
                'plp_sent' => 0
            ]);

            // Check if the update was successful
            if ($updated) {
                return redirect()->back()->with('success', 'Application updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update the application.');
            }
        } catch (\Throwable $th) {
            // Log the error for debugging purposes
            dd($th);
            return redirect()->back()->with('error', 'An unexpected error occurred while updating the application.');
        }
    }


}
