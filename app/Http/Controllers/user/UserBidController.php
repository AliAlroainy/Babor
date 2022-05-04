<?php

namespace App\Http\Controllers\user;

use App\Models\Bid;
use App\Models\User;
use App\Models\Auction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserBidController extends Controller
{
    public function __invoke(Request $request, $id){
        $bid = new Bid();
        $current_user = Auth::user()->id;
        $is_valid_bidding = $request->bidPrice >= Auction::where('id', $id)->first()->minInc ? true : false;
        if($is_valid_bidding){
            dd('you cant bidding less than');
        }
        return redirect()->route('user.place.bid')->with('warningBid','لا تستطيع المزايدة على مزادك!');

        $is_auctioneer = Auction::where('auctioneer_id', $current_user)->get();
        if($is_auctioneer)
            return redirect()->route('user.place.bid', $id)->with('warningBid','لا تستطيع المزايدة على مزادك!');
        
        $start_before = Bid::where('auction_id', $id)->first();
        $bid->auction_id = $id;
        $bid->bidder_id = Auth::user()->id;
        $bid->bidPrice =  $request->input('bidPrice');
        if(!$start_before)
            $bid->currentPrice = $bid->bidPrice + Auction::with('bids')->where('id', $id)->first()->openingBid;
        else
            $bid->currentPrice = $bid->bidPrice + Bid::with('auction')->where('auction_id', $id)->orderBy('id', 'desc')->first()->currentPrice;
            $bid->save();
        return redirect('/');
    }
}
