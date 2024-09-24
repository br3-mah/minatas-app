<?php

namespace App\Services;

use App\Models\Wallet; // Assuming you have a Wallet model

class WalletService
{
    /**
     * Retrieve wallet data for a specific user.
     *
     * @param  int  $userId
     * @return Wallet|null
     */
    public function getUserWallet(int $userId)
    {
        // Assuming you have a Wallet model that is related to the User model
        return Wallet::where('user_id', $userId)->first();
    }
}
