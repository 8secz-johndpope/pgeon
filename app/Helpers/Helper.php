<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
  public static function avatar(string $avatar)
    {
        return ($avatar) ? '/uploads/avatars/'.($avatar):  '/img/profile-placeholder.svg';
    }
}
