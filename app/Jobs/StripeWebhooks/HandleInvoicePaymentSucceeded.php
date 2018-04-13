<?php

namespace App\Jobs\StripeWebhooks;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\StripeWebhooks\StripeWebhookCall;
use Illuminate\Support\Facades\Mail;

use App\Mail\InvoicePaymentSucceeded;


//use Illuminate\Foundation\Bus\Dispatchable;

// monthly charges made successfully

use App\User;


class HandleInvoicePaymentSucceeded implements ShouldQueue
{
    use  InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $webhookCall;

    public function __construct(StripeWebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $stripe_id = $this->webhookCall->payload['data']['object']["customer"];
        $user = User::where('stripe_id',$stripe_id)->first();
        //
        Mail::to($user->email)
            ->send(new InvoicePaymentSucceeded($this->webhookCall->payload));
    }
}
