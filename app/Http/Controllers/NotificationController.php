<?php

namespace App\Http\Controllers;


use App\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Image;
use Route;
use App\UserFollowing;
use App\Question;
use App\User;
use Helper;

class NotificationController extends Controller
{
    

    public function index($format=null)
    {
        
        
        
//         $question = Question::find($question_id);
        
//         if (!$question)
//             abort(404, "Page Not Found");
            
            if ($format == "json") {
                    
                $notifications = Notification::where('target_user', Auth::user()->id)
                            ->orderBy('created_at', 'desc')
                            ->get();
                
                $responses = array();                            
                foreach ($notifications as $notif) {
                    $meta =  json_decode($notif->meta);
                    switch ($notif->type) {
                        
                        case "question_posted":
                            $user = User::find($meta->created_by);
                               
                                if($user) {
                                    
                                    $responses[] = array('type' => $notif->type, 

                                        'message' => Helper::slug($user->id,$user->slug) . ' posted a new question ',
                                        'link_to' => 'question/'.$meta->question_id,
                                        'ago' => Helper::calcElapsed($notif->created_at->timestamp),
                                        'class' => 'fa-comment-alt',
                                        'id' => $notif->id,
                                        'seen' => $notif->seen,
                                        'type' => $notif->type,

                                        
                                    );
                                }
                             
                        break;
                        case "user_followed":
                            $user = User::find($meta->followed_by);
                            if($user) {
                                
                                $responses[] = array('type' => $notif->type,
                                    'message' => 'You were followed by '.Helper::slug($user->id,$user->slug),
                                    'link_to' => Helper::slug($user->id,$user->slug),
                                    'ago' => Helper::calcElapsed($notif->created_at->timestamp),
                                    'class' => 'fa-user-plus',
                                    'id' => $notif->id,
                                    'seen' => $notif->seen,
                                    'type' => $notif->type,

                                );
                        }
                        break;
                        case "answer_accepted":
                            $q = Question::find($meta->question_id);
                            if($q) {
                                $user = User::find($q->user_id);
                                if($user) {
                                    
                                    $responses[] = array('type' => $notif->type,
                                        'message' => 'Your reply to '.Helper::slug($user->id,$user->slug).' was selected as the top response!',
                                        'link_to' => 'question/'.$q->id,
                                        'ago' => Helper::calcElapsed($notif->created_at->timestamp),
                                        'class' => 'fa-trophy-alt',
                                        'id' => $notif->id,
                                        'seen' => $notif->seen,
                                        'type' => $notif->type,

                                    );
                                }
                            }
                        break;
                        case "votes_earned":
                            $q = Question::find($meta->question_id);
                            if($q) {
                                $user = User::find($q->user_id);
                                if($user) {
                                    
                                    $responses[] = array('type' => $notif->type,
                                        'message' => 'Your reply to '.Helper::slug($user->id,$user->slug).' received '.$meta->votes.' votes!',
                                        'link_to' => 'question/'.$q->id,
                                        'ago' => Helper::calcElapsed($notif->created_at->timestamp),
                                        'class' => 'fa-thumbs-up',
                                        'id' => $notif->id,
                                        'seen' => $notif->seen,
                                        'type' => $notif->type,

                                    );
                                }
                            }
                            break;
                    }
                }
                
               // NotificationController::markAsSeen();
                
                return response()->json($responses);
                
            }
             else {
                 
                 
                 
        
                 return view('notifications.index', ['user_id' => Auth::user()->id]);

                
                
           }
            
    }
    
    
    public static function markAsSeen() {
        $id = Request::get('id');
        Notification::where('id', $id)
        ->update(['seen' => 1]);
        
    }
    public static function destroy()
    {
        Notification::where('target_user', Auth::user()->id)
                    ->delete();
    }

    /** TODO - not used..can be delted - dec-28 **/
    public static function markAllAsSeen()
    {
        Notification::where('target_user', Auth::user()->id)
                           ->update(['seen' => 1]);
        
        
    }
    
    public static function insertQuestionPostedToFollowers($qid, $uid)
    {
        //notify all the followers that the question is posted
        $ufs = UserFollowing::get_followers($uid);
        
        $data = array();
        foreach ($ufs as $uf) {
            $data[] = array('target_user'=>$uf, 'created_at'=>  time(), 'type' => 'question_posted', 'meta' => json_encode(array('question_id' => $qid, 'created_by' => $uid)));
        }
             
        if($data)
         Notification::insert($data);
        
        
    }
    
    

    public static function insertAnswerAccepted($qid, $q_by, $answered_by)
    {
        
        $data = array('target_user'=>$answered_by, 'created_at'=>  time(), 'type' => 'answer_accepted', 'meta' => json_encode(array('question_id' => $qid)));
        Notification::insert($data);
        
        
    }
    
   
    public static function insertUserFollowed($uid, $follower)
    {
        
        /** don't send duplicate notifications if he unfollow/ follow in quick sucession..seen or not  **/
        
        $rec = Notification::where('target_user', $uid)
                           ->where('meta->followed_by',$follower)
                           ->first();
        if(!$rec) {
            $data = array('target_user'=>$uid, 'created_at'=>  time(), 'type' => 'user_followed', 'meta' => json_encode(array('followed_by' => $follower)));
            Notification::insert($data);
        }
        
        
    }

    

   



    
    
}
