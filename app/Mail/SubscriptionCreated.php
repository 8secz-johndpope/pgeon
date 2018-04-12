<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;


class SubscriptionCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $inv_amt;
    public $type;
    public $billing_date;
    public $next_billing;
    
    

    public function __construct($object)
    {

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $this->inv_amt =  money_format("%.2n", ($object['data']['object']['plan']['amount'] / 100));
        $this->type =  $object['data']['object']['plan']['interval'];
        $this->billing_date = gmdate("F d, Y", $object['created']).' at '. gmdate("H:i A e", $object['created']) ;
        $this->next_billing = gmdate("F d, Y", $object['data']['object']['current_period_end']);

       // $this->period_end = gmdate("F d, Y", $object['data']['object']['period_end']);
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('donotreply@heartboxx.com')
                    ->view('emails.invoice.subscription_created');
    }
}
