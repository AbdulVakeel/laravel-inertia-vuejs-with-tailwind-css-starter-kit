<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryFilter;

class Faq extends Model
{
    use HasFactory;
    use QueryFilter;

    protected $fillable = [
        'title',
        'description',
    ];
}
