<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
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
    }
    
    public function sendToBuyer(Request $request, $bill_id){
        dd($bill_id);
        $bill = Payment_Bill::find($bill_id);
        $bid = $bill->bid;
        $buyer = $bid->user;
        $money = $bill->bid->currentPrice;
        $commission = $money/10;
        $auction_id = $auction->id;
        $this->siteDeduction($auction_id, $commission);
        $seller_dues = $money-($commission);
        User::first()->transfer($seller, $seller_dues, ['sell' => $bill->id]);
    }
}
