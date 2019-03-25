<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Pusher\Pusher;

class PusherNotificationController extends Controller
{

    public function sendNotification() {
        $options = array(
            'cluster' => 'ap2',
            'encrypted'  => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $message = "Are you going to Scarborough Fair?";
        $data['message'] = $message;
        // Log::info('pusher_noti', [$message]);
        $pusher->trigger('status-liked', 'StatusLiked', $message);
    }
}
