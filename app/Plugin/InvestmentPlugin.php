<?php

namespace App\Plugin;

use App\Models\Invest;
use App\Models\Transaction;
use Illuminate\Support\Str;

class InvestmentPlugin
{
    private $user;
    private $investment;  // ← ADD THIS

    public function __construct($user, $investment = null)
    {
        $this->user = $user;
        $this->investment = $investment;  // ← ADD THIS
    }

    public function invest($amount, $wallet)
    {
        $user = $this->user;
        $investment = $this->investment;  // ← ADD THIS

        if ($amount > $user->$wallet) {
            throw new \Exception('Insufficient balance');
        }

        $user->$wallet -= $amount;
        $user->save();

        Transaction::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'balance' => $user->$wallet,
            'transaction_id' => Str::random(16),
            'wallet' => $wallet,
            'type' => 'investment',
            'description' => 'Investment from wallet',
        ]);

        // ✅ FIX: investment_id add karo!
        Invest::create([
            'user_id' => $user->id,
            'investment_id' => $investment->id,  // ← YAHI LINE JODNA HAI!
            'amount' => $amount,
            'wallet_type' => $wallet,  // ← wallet_type bhi add karo
             'status' => 1,
        ]);
    }
}