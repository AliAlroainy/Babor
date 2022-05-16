<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Auction;
use App\Models\Confirmation;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ConfirmationController extends Controller
{
    public function doContract($bill_id){
        $route = Route::current()->getName();
        $bill = Payment_Bill::where(['id' => $bill_id])->first();

        if(!$bill)
            return response()->view('Front.404', []);

        //Only allow the current user to enter his contract via his bill
        $current_user_is_bill_owner_or_auctioneer = $bill->bid->user == Auth::user() || $bill->bid->auction->user == Auth::user();
        if(!$current_user_is_bill_owner_or_auctioneer)
            return response()->view('Front.404', []);

        $bid = $bill->bid;
        $buyer_confirmed = false;
        $seller_confirmed = false;
        if(Confirmation::where(['payment_bill_id' => $bill_id, 'buyer_confirm' => 1])->first() != null)
            $buyer_confirmed = true;
            
        if(Confirmation::where(['payment_bill_id' => $bill_id, 'seller_confirm' => 1])->first() != null)
            $seller_confirmed = true;

        return view('Front.addtions.confirmBuy', [
            'route' => $route, 
            'bid' => $bid, 
            'buyer_confirmed' => $buyer_confirmed,
            'seller_confirmed'=> $seller_confirmed,
        ]);
    }

    public function confirm(Request $request, $id){
        $route = Route::current()->getName();
        if($route == 'buyer.confirm'){
            Confirmation::updateOrCreate(
                ['payment_bill_id' => $id],
                ['buyer_confirm' => 1]
            );
        }
        elseif($route == 'seller.confirm'){
            Confirmation::updateOrCreate(
                ['payment_bill_id' => $id],
                ['seller_confirm' => 1]
            );
        }
        $to_complete = Confirmation::where(['payment_bill_id' => $id, 'buyer_confirm' => 1, 'seller_confirm' => 1])->first();
        if($to_complete){

            $bill = Payment_Bill::find($id);
            Auction::whereId($bill->bid->auction->id)->update(['status' => '5']);
            $admin = User::first();
        
            $this->sendToSeller($admin, $bill);
        }
        return redirect()->back();
    }

    public function sendToSeller($admin, $bill){
        $auction = $bill->bid->auction;
        $seller = $auction->user;
        $money = $bill->bid->currentPrice;
        $auction->commission = $money/10;
        $seller_dues = $money-($auction->commission);
        $admin->transfer($seller, $seller_dues);
    }
}
