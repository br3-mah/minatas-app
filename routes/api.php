<?php

use App\Http\Controllers\Api\LoanRequestController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\UserAuthenticationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Auth\OTPController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\LoanProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

//Mobile External Api ---------------------------------------
Route::apiResource('apply-loan', LoanRequestController::class);

// --- onboarding ---
Route::post('register', [UserAuthenticationController::class, 'register']);
Route::post('login', [UserAuthenticationController::class, 'login']);
Route::get('request-otp', [OTPController::class, 'requestOTP']);
Route::post('verify-otp', [OTPController::class, 'verifyOTP']);

// --- Forgot Password ---
Route::post('forgot-password', [UserAuthenticationController::class, 'forgot']);
Route::post('change-password', [UserController::class, 'updatePassword']);
Route::post('reset-password', [UserAuthenticationController::class, 'passwordResetLink']);

// --- KYC ---
Route::post('update-profile', [UserController::class, 'updateProfile']);
Route::post('upload-loan-files', [UserController::class, 'uploadFiles']);
Route::post('upload-my-files', [UserController::class, 'uploadNRCs']);
Route::post('support', [SupportController::class, 'logTicket']);

// --- My Wallet ---
Route::get('my-wallet/{id}', [WalletController::class, 'getMyWallet']);

// --- My Loans ---
Route::post('request-for-loan', [LoanApplicationController::class, 'store']);
Route::post('apply-for-loan', [LoanApplicationController::class, 'new_loan']);
Route::get('get-my-loans/{id}', [LoanRequestController::class, 'getMyLoans']);
Route::get('notifications/{id}', [NotificationController::class, 'myNotifications']);


// Internal Api ---------------------------------------------
Route::get('get-my-loan-balance/{loan_id}', [LoanRequestController::class, 'loanBalance']);
Route::get('get-my-balance/{user_id}', [LoanRequestController::class, 'customerBalance']);

Route::get('get-loan-interest-rate/{duration}/{principal}', [LoanRequestController::class, 'interestRate']);
Route::get('get-loan-interest-amount/{duration}/{principal}', [LoanRequestController::class, 'interestAmount']);
Route::get('get-loan-monthly-installment-amount/{duration}/{principal}', [LoanRequestController::class, 'loanMonthlyInstallments']);
Route::get('get-total-payback-amount/{duration}/{principal}', [LoanRequestController::class, 'totalCollectable']);


Route::get('/get-loan-products', [SettingController::class, '__get_loan_products']);
Route::get('/get-loan-product-details/{loan_id}', [SettingController::class, '__get_loan_details']);

Route::get('/get-loan-processing-statuses', [SettingController::class, '__get_processing_status']);
Route::get('/get-loan-open-statuses', [SettingController::class, '__get_open_status']);
Route::get('/get-loan-defaulted-statuses', [SettingController::class, '__get_defaulted_status']);
Route::get('/get-loan-denied-statuses', [SettingController::class, '__get_denied_status']);
Route::get('/get-loan-not-taken-up-statuses', [SettingController::class, '__get_not_taken_status']);

//Dependent dropdown
Route::get('/get-loan-categories/{loanTypeId}', [LoanProductController::class, 'getLoanCategories']);
Route::get('/get-loan-packages/{loanCategoryId}', [LoanProductController::class, 'getLoanPackages']);
Route::get('/get-loan-package-item/{packageId}', [LoanProductController::class, 'getLoanPackageDetails']);

// Deprected
Route::get('get-my-wallet/{id}', [LoanRequestController::class, 'getWallets']);
Route::get('get-my-withdrawal-requests/{id}', [LoanRequestController::class, 'getWithdrawalRequests']);
Route::post('make-withdrawal-request', [LoanRequestController::class, 'makeWithdrawalRequest']);

// ------ Administration
// Admin Settings
Route::get('/get-approvers-users', [SettingController::class, '__get_approvers']);
Route::post('/set-auto-approvers', [SettingController::class, '__set_approvers']);

