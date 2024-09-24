<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WalletService; // Assuming WalletService handles the logic for wallet data.
use Illuminate\Http\JsonResponse;

class WalletController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    /**
     * Retrieve the wallet details for a given user.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  User ID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMyWallet(Request $request, $id): JsonResponse
    {
        $walletData = $this->walletService->getUserWallet($id);

        if (is_null($walletData)) {
            return response()->json(['message' => 'Wallet not found'], 404);
        }

        return response()->json($walletData);
    }
}
