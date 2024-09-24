<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'deposit',
        'withdraw',
        'user_id',
        'email',
        'phone',
    ];

    protected $appends = [
        'balance'
    ];
    /**
     * Get the user that owns the wallet.
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the balance attribute.
     *
     * @return float
     */
    public function getBalanceAttribute()
    {
        return $this->deposit - $this->withdraw;
    }
}

