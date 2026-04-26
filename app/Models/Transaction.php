<?php

namespace App\Models;

use App\Traits\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use QueryFilter;

    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'transaction_id',
        'description',
        'balance',
        'wallet',  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getWalletDisplayNameAttribute()
    {
        $names = [
            'earning_wallet' => 'Earning Wallet',
            'deposit_wallet' => 'Deposit Wallet',
        ];
        
        return $names[$this->wallet] ?? ucfirst(str_replace('_', ' ', $this->wallet));
    }
    
    public function getFormattedAmountAttribute()
    {
        $symbol = "$";
        $prefix = $this->type === 'admin_fund_credit' ? '+' : '-';
        return "{$prefix}{$symbol}" . number_format($this->amount, 2);
    }
}