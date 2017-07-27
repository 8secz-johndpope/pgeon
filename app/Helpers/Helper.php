<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
  public static function question_validity_status($expiring_at){

    $added_time = strtotime($expiring_at);


    //some life left
    if ($added_time > time()) {
      $remaining_time = $added_time - time();
      return  date("H:i", $remaining_time);
    }else {
      return 'expired';
    }

  }
}
