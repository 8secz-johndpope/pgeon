<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class LocalCouponUsage extends Model
{
    protected $fillable = [
        'coupon_id',
        'user_id',

    ];

    public function local_coupon() {
        return $this->belongsTo('App\LocalCoupon');
    }


  
  
 

         
      
    
}

