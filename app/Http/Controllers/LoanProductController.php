<?php

namespace App\Http\Controllers;

use App\Models\LoanProduct;
use App\Models\LoanStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoanProductController extends Controller
{

    public function updateLoanStatus(Request $request){
        try {
            $data = $request->toArray();
            // dd($data);
            // Processing
            foreach (($data['processing']) as $key => $value) {

                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'processing',
                        'step' => $key + 1,
                        'state' => $key == 0 ? 'current':'pending',
                    ]
                );
            }
            // Open
            foreach (($data['open']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'open',
                        'step' => $key + 1,
                    ]
                );
            }

            // Defaulted
            foreach (($data['defaulted']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'defaulted',
                        'step' => $key + 1,
                    ]
                );
            }

            // Denied
            foreach (($data['denied']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'denied',
                        'step' => $key + 1,
                    ]
                );
            }

            // Not Taken Up
            foreach (($data['not_taken_up']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'Not Taken Up',
                        'step' => $key + 1,
                    ]
                );
            }

            Session::flash('success', "Loan statuses created successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);
        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);
        }
    }

    public function getLoanCategories($loanTypeId)
    {
        $categories = DB::table('loan_child_types')
        ->where('loan_type_id', $loanTypeId)->get(['id', 'name']);
        return response()->json($categories);
    }

    public function getLoanPackages($loanCategoryId)
    {
        $packages = LoanProduct::where('loan_child_type_id', $loanCategoryId)->get(['id', 'name']);
        return response()->json($packages);
    }

    public function getLoanPackageDetails($packageId)
    {
        $package = LoanProduct::findOrFail($packageId);

        // Generate amounts range between min and max principal amount
        $amounts = range($package->min_principal_amount, $package->max_principal_amount, 100); // Adjust the step value as needed

        // Generate durations range between min and max loan duration
        $durations = range($package->min_loan_duration, $package->max_loan_duration, 1); // Adjust the step value as needed

        // Prepare the response with other loan product fields
        $response = [
            'amounts' => $amounts,
            'durations' => $durations,
            'product' => [
                'name' => $package->name,
                'loan_type' => $package->loan_type,
                'description' => $package->description,
                'icon' => $package->icon,
                'status' => $package->status,
                'loan_duration_period' => $package->loan_duration_period,
                'loan_interest_period' => $package->loan_interest_period,
                'min_principal_amount' => $package->min_principal_amount,
                'max_principal_amount' => $package->max_principal_amount,
                'min_loan_duration' => $package->min_loan_duration,
                'max_loan_duration' => $package->max_loan_duration,
                'min_loan_interest' => $package->min_loan_interest,
                'def_loan_interest' => $package->def_loan_interest,
                'max_loan_interest' => $package->max_loan_interest,
                'min_num_of_repayments' => $package->min_num_of_repayments,
                'def_num_of_repayments' => $package->def_num_of_repayments,
                'max_num_of_repayments' => $package->max_num_of_repayments,
            ]
        ];

        return response()->json($response);
    }

}
