<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Subscription extends Model
{
  

    public function user() {
        return $this->belongsTo('App\User');
    }

   
 
      
    
}

