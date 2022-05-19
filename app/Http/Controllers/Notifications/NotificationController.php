<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $auctioneer=User::where('id',$auction->auctioneer_id)->first();
        $users = User::get();
        foreach ($users as $user) {
            $car = Car::where('id',$auction->car_id)->first();
            if($user->id !=$auctioneer->id){
                $notification = Notification::create([
                    'message' => "تمت إضافة مزاد جديد",
                    'user_id' => $user->id ,
                    'state' => 1,
                    'link' => $auction->id,
                    'type'=> 1,
                    'price' => $auction->openingBid,
                    'closeDate' => $auction->closeDate,
                    'thumbnail' => $car->thumbnail
                ]);

                $brand = $auction->car->brand->name;
                $series = $auction->car->series->name;
                $model = $auction->car->model;
                $info = array('brand'=>$brand,'series'=>$series,'model'=>$model);
                $data['carSpecs'] = implode("," , $info);
                $data['link'] = $notification->link;
                $data['price'] = $notification->price;
                $data['endDate'] = $notification->closeDate;
                $data['user_id'] = $user->id;
                $data['type'] = $notification->type;
                $data['thumbnail'] = $notification->thumbnail;

                if(Auth::id() == $user->id)
                    $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);
            }else{
                $notification = new Notification();
                $notification = Notification::create([
                    'message' => "لقد تمت الموافقة على مزادك",
                    'user_id' => $auctioneer->id ,
                    'state' => 1,
                    'link' => $auction->id,
                    'type'=> 2,
                    'price' => $auction->openingBid,
                    'closeDate' => $auction->closeDate,
                    'thumbnail' => $car->thumbnail
                ]);
                $data['message'] = $notification->message;
                $data['link'] = $auction->id;
                $data['price'] = $auction->openingBid;
                $data['endDate'] = $auction->closeDate;
                $data['user_id'] = $user->id;

                $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);
            }
        }

    }
//    public function auctionApproved(Auction $auction)
//    {
//         $options = array(
//        'cluster' => env('PUSHER_APP_CLUSTER'),
//        'encrypted' => true
//        );
//        $pusher = new Pusher(
//            env('PUSHER_APP_KEY'),
//            env('PUSHER_APP_SECRET'),
//            env('PUSHER_APP_ID'),
//            $options
//        );
//
//        $notification = new Notification();
//        $user=User::where('id',$auction->auctioneer_id)->first();
//        $notification = Notification::create([
//            'message' => "لقد تمت الموافقة على مزادك",
//            'user_id' => $user->id ,
//            'state' => 1,
//            'link' => $auction->id,
//            'type'=> 2
//        ]);
//        $data['message'] = $notification->message;
//        $data['link'] = $auction->id;
//        $data['price'] = $auction->openingBid;
//        $data['endDate'] = $auction->closeDate;
//        $data['user_id'] = $user->id;
//
//        $pusher->trigger('notify-channel2', 'App\\Events\\Notify', $data);
//    }

    public function auctionDisapproved(Auction $auction)
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
        $auctioneer=User::where('id',$auction->auctioneer_id)->first();
        $notification = Notification::create([
            'message' => "لم توافق الإدارة على مزادك",
            'user_id' => $auctioneer->id ,
            'state' => 1,
            'link' => $auction->id,
            'type'=> 3
        ]);
        $data['message'] = $notification->message;
        $data['link'] = $auction->id;
        $data['price'] = $auction->openingBid;
        $data['endDate'] = $auction->closeDate;
        $data['user_id'] = $auctioneer->id;
        if($auctioneer->id == Auth::id())
            $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);
    }

    public function bidOnAuction(Bid $bid){
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
        $user=User::where('id',$bid->auction->auctioneer_id)->first();
        $notification = Notification::create([
            'message' => "لقد تمت المزايدة على سيارتك",
            'user_id' => $user->id ,
            'state' => 1,
            'link' => $bid->auction->id,
            'type'=> 4
        ]);
//        $brand = $bid->auction->car->brand->name;
//        $series = $bid->auction->car->series->name;
//        $model = $bid->auction->car->model;
//        $info = array('brand'=>$brand,'series'=>$series,'model'=>$model);
//        $data['carSpecs'] = implode("," , $info);
        $data['message'] = $notification->message;
        $data['link'] = $bid->auction->id;
        $data['price'] = $bid->currentPrice;
        $data['endDate'] = $bid->auction->closeDate;
        $data['user_id'] = $user->id;
        $data['type'] = $notification->type;
        $pusher->trigger('notify-channel2', 'App\\Events\\Notify', $data);
    }

    public function stopAuction(Auction $auction, $winner_id){
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
        $user=User::where('id',)->first();
        $notification = Notification::create([
            'message' => "لقد فزت بمزاد سيارة",
            'user_id' => $winner_id ,
            'state' => 1,
            'link' => $auction->id,
            'type'=> 5
        ]);
        $data['message'] = $notification->message;
        $data['link'] = $auction->id;
        $data['user_id'] = $notification->user_id;
        $data['type'] = $notification->type;


        $pusher->trigger('notify-channel2', 'App\\Events\\Notify', $data);
    }
    public function refundBidders(Auction $auction, $winner_id,$id){
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
        $user=User::where('id',)->first();
        $notification = Notification::create([
            'message' => "تم إرساء مزاد اشتركت فيه, لم تفز 😥",
            'user_id' => $winner_id ,
            'state' => 1,
            'link' => $auction->id,
            'type'=> 5
        ]);

        $data['message'] = $notification->message;
        $data['link'] = $auction->id;
        $data['admin_id'] = 1;
        $data['winner_id'] = $winner_id;
        $data['type'] = $notification->type;

        $bidders = Auction::find($id)->bids;
        foreach(range (0, count($bidders)-1) as $i){
            $data['user_id'] = $bidders[$i]->user->id;
        $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);
        }

    }
    public function cancelAuction(Auction $auction,$id){
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

        $bidders = Auction::find($id)->bids;
        foreach(range (0, count($bidders)-1) as $i){
            $notification = new Notification();
            $notification = Notification::create([
                'message' => "تم إلغاء مزاد اشتركت فيه",
                'user_id' =>   $bidders[$i]->user->id,
                'state' => 1,
                'link' => $auction->id,
                'type'=> 6
            ]);

            $data['user_id'] = $bidders[$i]->user->id;
            $data['message'] = $notification->message;
            $data['link'] = $auction->id;
            $data['type'] = $notification->type;

            $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);
            }
        }

    public static function getNotifications()
    {
        $user_id = Auth::id();

        $notifications = Notification::where(['state'=>'1' , 'user_id' => $user_id])->get();
        $count = count($notifications);
        $notificationsData = ['count'=>$count, 'notifications' => $notifications];
        return $notificationsData;
    }




}
