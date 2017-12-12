<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;


class QuestionReported extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $q_url;
    public $user_slug;
    
    public function __construct($qid, $user_slug)
    {
        $this->q_url =  Request::getSchemeAndHttpHost()."/questions/".$qid;
        $this->user_slug = Request::getSchemeAndHttpHost()."/".$user_slug;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('reported@heartboxx.com')
                    ->view('emails.question.reported');
    }
}
