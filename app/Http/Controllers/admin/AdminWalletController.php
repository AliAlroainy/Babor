<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Auction;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminWalletController extends Controller
{
    public function manageCompletingAuction(){
        $trans = Payment_Bill::get();
        return view('Admin.wallet.usersAuctions')->with(['trans' => $trans]);
        
    }

    public function sendToSeller(Request $request, $bill_id){
        $bill = Payment_Bill::find($bill_id);
        $auction = $bill->bid->auction;
        $seller = $auction->user;
        $money = $bill->bid->currentPrice;
        $commission = $money/10;
        $auction_id = $auction->id;
        $bill->contract::siteDeduction($auction_id, $commission);
        $seller_dues = $money-($commission);
        User::first()->transfer($seller, $seller_dues, ['sell' => $bill->id]);
        Auction::whereId($bill->bid->auction->id)->update(['status' => '5']);
        return redirect()->back();
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
        $commission = $money/10;
        $money_left = $money - (2 * $commission);
        $auction_id = $auction->id;
        $bill->contract::siteDeduction($auction_id, $commission); // مستحقات الموقع
        User::first()->transfer($auctioneer, $commission, ['compensation' => $bill->id]);   // تسليم البائع نسبة من المزاد
        User::first()->transfer($bidder, $money_left, ['remain' => $bill->id] );  
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
        $commission = $money/10;
        $money_left = $money - (2 * $commission);
        $auction_id = $auction->id;
        $bill->contract::siteDeduction($auction_id, $commission); // مستحقات الموقع
        User::first()->transfer($bidder, $commission, ['compensation' => $bill->id]);   // تسليم المشتري نسبة من المزاد
        User::first()->transfer($auctioneer, $money_left, ['remain' => $bill->id] );  
        // تسليم باقي المبلغ إلى البائع بعد الخصم منه النسبة للموقع
        //ونفس النسبة لصاحب المزاد
        Auction::whereId($bill->bid->auction->id)->update(['status' => '5']);
        return redirect()->back();
    }
}
