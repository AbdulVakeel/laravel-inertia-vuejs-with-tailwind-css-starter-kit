<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $table = 'investments';
    
    protected $fillable = [
        'name', 'amount', 'status'
    ];
    
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    
    public function invests()
    {
        return $this->hasMany(Invest::class);
    }
}