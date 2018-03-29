<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class LocalCoupon extends Model
{
    protected $fillable = [
        'coupon_code',
        'description',
        'max_redemptions',
        'coupon_validity'

    ];

    public function user() {
        return $this->belongsTo('App\User');
    }


  
         
      
    
}

