<?php
/**
 * Created by PhpStorm.
 * User: rasel
 * Date: 3/24/19
 * Time: 3:10 PM
 */

namespace App\Listeners;


use App\Events\OrderShipped;
use Illuminate\Support\Facades\Log;

class SendShipmentNotification
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        // Access the order using $event->order...
        Log::info('order_shipped_workssssssssssssssssssss', [$event->order]);
    }

}