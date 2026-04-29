<?php

namespace App\Models;

use App\Traits\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    use QueryFilter;


    protected $guarded = "";


    public function investment()
{
    return $this->belongsTo(Investment::class, 'investment_id');
}

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }


    public function scopeRelated($query)
    {
        return $query->where('user_id', auth()->id());
    }

    public function scopeJoinWithInvestment($query)
    {
        return $query
            ->leftJoin('investments', 'investments.id', '=', 'invests.investment_id')
            ->selectRaw('
                invests.*,
                investments.name AS investment_name,
                investments.investments_type AS investments_type
      ');
    }


}
