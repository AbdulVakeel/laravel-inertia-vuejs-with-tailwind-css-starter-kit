<?php

namespace App\Traits;

use Carbon\Carbon;

trait QueryFilter
{


    
    /**
     * scopeQueryFilter
     *
     * @param  mixed $query
     * @param  mixed $columns
     * @param  mixed $search
     * @return void
     */
    
    public function scopeQueryFilter($query, $columns, $search)
    {
        $value = is_array($search) ? implode(',', $search) : $search ; 
                
        foreach ($columns as $key => $column) {
            if ($key == 0) {
                $query->where($column, 'LIKE', "%{$value}%");
            } else {
                $query->orWhere($column, 'LIKE', "%{$value}%");
            }
        }
        return $query;
    }

    function scopeDateFilter($query, $column = 'created_at')
    {
        $query->when(request()['start_date'] ?? null, function ($query, $date) use ($column) {
            $query->whereDate($column, '>=',  Carbon::parse(trim($date))->format('Y-m-d'));
        })
            ->when(request()['end_date'] ?? null, function ($query, $date) use ($column) {
                $query->whereDate($column, '<=',  Carbon::parse(trim($date))->format('Y-m-d'));
            });

    }
}
