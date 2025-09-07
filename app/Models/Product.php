<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sku',
        'distri_price',
        'si_price',
        'md_price',
        'sdp_price',
        'srp_price',
        'lkpp_price'
    ];
}
