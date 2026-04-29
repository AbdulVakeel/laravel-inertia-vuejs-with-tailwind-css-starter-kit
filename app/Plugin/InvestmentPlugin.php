<?php

namespace App\Plugin;

use App\Models\Invest;
use App\Models\Transaction;
use Illuminate\Support\Str;

class InvestmentPlugin
{
    private $user;

    public function __construct($user, $investment = null)
    {
        $this->user = $user;
    }

    public function invest($amount, $wallet)
    {
        $user = $this->user;

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

        Invest::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'status' => 1,
        ]);
    }
}