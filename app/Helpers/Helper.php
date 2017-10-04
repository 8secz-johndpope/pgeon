<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
  public static function avatar(string $avatar)
    {
        return ($avatar) ? '/uploads/avatars/'.($avatar):  '/img/profile-placeholder.svg';
    }
    
    public static function calcElapsed($seconds) {
        
        $seconds = time() - $seconds;
        $year = floor($seconds /31556926);
        $months = floor($seconds /2629743);
        $week=floor($seconds /604800);
        $day = floor($seconds /86400);
        $hours = floor($seconds / 3600);
        $mins = floor(($seconds - ($hours*3600)) / 60);
        $secs = floor($seconds % 60);
        if($seconds < 60) $time = $secs." seconds ago";
        else if($seconds < 3600 ) $time =($mins==1)?$mins."now":$mins." mins ago";
        else if($seconds < 86400) $time = ($hours==1)?$hours." hour ago":$hours." hours ago";
        else if($seconds < 604800) $time = ($day==1)?$day." day ago":$day." days ago";
        else if($seconds < 2629743) $time = ($week==1)?$week." week ago":$week." weeks ago";
        else if($seconds < 31556926) $time =($months==1)? $months." month ago":$months." months ago";
        else $time = ($year==1)? $year." year ago":$year." years ago";
        return $time;
        
    }
    
    public static function  since($seconds)
    {
        if($seconds > 0) {
            $time = Helper::calcElapsed($seconds);
            return 'your last posted question was '.$time;
        }else {
            return 'go ahead and post your first question';
        }
    } 
    
    public static function slug($user_id, $slug) {
    		return ($slug)? $slug : "/user/".$user_id;
    }
}

