<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Auction;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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

    public function sendToSellerFunc($bill_id){
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
}
