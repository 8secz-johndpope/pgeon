<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use \Laravel\Cashier\Http\Controllers\WebhookController as BaseController;
use App\Log;
class WebhookController extends BaseController
{
    
    public function handleChargeCaptured( array $payload) {
        $l = new Log;
        $l->k = "Charge Captured";
        $l->v = serialize($payload);
        $l->save();
    }


public function handleChargeSucceeded( array $payload) {
        $l = new Log;
        $l->k = "Charge Succeeded";
        $l->v = serialize($payload);
        $l->save();
    }

    

  public function handleInvoiceCreated( array $payload )
    {

        $l = new Log;
        $l->k = "invoice created";
        $l->v = serialize($payload);
        $l->save();

        // $cost_per_minute = 10; //cents
        // $minutes = 100; //normally we would pull this dynamically

        // $amount = $cost_per_minute * $minutes;

        // \Stripe\InvoiceItem::create([
        // "customer" => $payload['data']['object']['customer'],
        // "invoice" => $payload['data']['object']['id'],
        // "amount" => $amount,
        // "currency" => "usd",
        // "description" => "{$minutes} minute(s) used"
        // ]);

        return response('Webhook Handled', 200);
    }
}
