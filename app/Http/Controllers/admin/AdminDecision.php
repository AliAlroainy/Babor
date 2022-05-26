<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Auction;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDecision extends Controller
{
    public function manageCompletingAuction(){
        $bills = Payment_Bill::where('payment_status', '1')->get();
        return view('Admin.wallet.usersAuctions')->with(['bills' => $bills]);    
    }
    
    public function sendToBuyer(Request $request, $bill_id){
        $bill = Payment_Bill::find($bill_id);
        $bid = $bill->bid;
        $auction = $bill->bid->auction;
        $buyer = $bid->user;
        $money = $bill->bid->currentPrice;
        $commission = $money/10;
        $auction_id = $auction->id;
        $bill->contract::siteDeduction($auction_id, $commission);
        $buyer_dues = $money-($commission);
        User::first()->transfer(User::first(), $commission, ['commission' => $bill->id]); 
        User::first()->transfer($buyer, $buyer_dues, ['unbuy' => $bill->id]);
        Auction::whereId($bill->bid->auction->id)->update(['status' => '5']);
        return redirect()->back();
    }

    public function buyerPenalty(Request $request, $bill_id){
        $bill = Payment_Bill::find($bill_id);
        $auction = $bill->bid->auction;
        $auctioneer = $auction->user;
        $bidder = $bill->bid->user;
        $money = $bill->bid->currentPrice;
        $commission = $money/10.0;
        $money_left = $money - (2 * $commission);
        $auction_id = $auction->id;
        $bill->contract::siteDeduction($auction_id, $commission); // مستحقات الموقع
        User::first()->transfer(User::first(), $commission, ['commission' => $bill->id]); 
        User::first()->transfer($auctioneer, $commission, ['compensation' => $bill->id]);   // تسليم البائع نسبة من المزاد
        User::first()->transfer($bidder, $money_left, ['unbuy' => $bill->id] );  
        // تسليم باقي المبلغ إلى المزايد بعد الخصم منه النسبة للموقع
        //ونفس النسبة لصاحب المزاد
        Auction::whereId($bill->bid->auction->id)->update(['status' => '5']);
        return redirect()->back();
    }

    public function sellerPenalty(Request $request, $bill_id){
        $bill = Payment_Bill::find($bill_id);   
        $auction = $bill->bid->auction;
        $auctioneer = $auction->user;
        $bidder = $bill->bid->user;
        $money = $bill->bid->currentPrice;
        $commission = $money/10.0;
        $auction_id = $auction->id;
        $bill->contract::siteDeduction($auction_id, $commission); // مستحقات الموقع
        $auctioneer->transfer(User::first(), $commission, ['penalty-commission' => $bill->id]);   // تسليم المشتري نسبة من المزاد
        User::first()->transfer($bidder, $money, ['unsell' => $bill->id] );  
        // تسليم باقي المبلغ إلى البائع بعد الخصم منه النسبة للموقع
        //ونفس النسبة لصاحب المزاد
        Auction::whereId($bill->bid->auction->id)->update(['status' => '5']);
        return redirect()->back();
    }
}
