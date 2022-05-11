<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Models\Notification;
class NotificationController extends Controller
{
    public function notification(Auction $auction)
    {

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $notification = new Notification();
//        $auction = Auction::whereId()->with('bids', 'user')->get();


        $data['carName'] = 'مزاد سيارة لاندكروسر ';
        $data['price'] =  888;
        $data['endDate'] = '3 أيام ';

        $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);
//        return redirect()->back();
    }

    public function save_notification()
    {
//        sender
//
    }
}
