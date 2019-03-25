<?php
/**
 * Created by PhpStorm.
 * User: rasel
 * Date: 3/24/19
 * Time: 3:08 PM
 */

namespace App\Events;


use App\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class OrderShipped
{
    use SerializesModels;

    public $order;

    /**
     * Create a new event instance.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function __construct(Order $order)
    {

        $this->order =  $order;

    }

}