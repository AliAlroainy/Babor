<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\User;
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

        $pusher->trigger('notify-channel2', 'App\\Events\\Notify', $data);
//        return redirect()->back();
    }

    public function newAuctionNotification(Auction $auction)
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
//            $auction = Auction::whereId('id');
        $user=User::where('id',$auction->auctioneer_id)->first();
//            $users = User::all()->except(Auth::id());
        $notification = Notification::create([
            'message' => "تمت إضافة مزاد جديد",
            'user_id' => $user->id ,
            'state' => 0,
            'link' => $auction->id,
            'type'=> 1
        ]);
//                    $data['id'] = $notification->id;
        $brand = $auction->car->brand->name;
        $series = $auction->car->series->name;
        $model = $auction->car->model;
        $info = array('brand'=>$brand,'series'=>$series,'model'=>$model);
        $data['message'] = implode("," , $info);
        $data['link'] = $auction->id;
        $data['price'] = $auction->openingBid;
        $data['endDate'] = $auction->closeDate;
        $data['user_id'] = $user->id;

        $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);
    }
    public function auctionAccepted(Auction $auction)
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
        $user=User::where('id',$auction->auctioneer_id)->first();
        $notification = Notification::create([
            'message' => "تمت إضافة مزاد جديد",
            'user_id' => $user->id ,
            'state' => 0,
            'link' => $auction->id,
            'type'=> 1
        ]);
        $data['message'] = 'لقد تمت الموافقة على مزادك';
        $data['link'] = $auction->id;
        $data['price'] = $auction->openingBid;
        $data['endDate'] = $auction->closeDate;
        $data['user_id'] = $user->id;

        $pusher->trigger('notify-channel2', 'App\\Events\\Notify', $data);
    }
}
