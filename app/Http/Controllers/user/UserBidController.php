<?php

namespace App\Http\Controllers\user;

use App\Models\Auction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserBidController extends Controller
{
    public function __invoke(Request $request, $id){
        $start_before = Bid::where(['auction_id', $id])->first();
        $bid = new Bid();
        $bid->auction_id = $id;
        $bid->bidder_id = Auth::user()->id;
        if(!$start_before)
            $bid->currentPrice = Auction::where('id', $id)->get()->openingBid;
        else
            $bid->currentPrice = Bid::where('auction_id', $id)->get()->currentPrice;
        $bid->bidPrice =  $request->input('bidPrice');
        $bid->save();
        $user = User::find(Auth::user()->id);
        return view('Front.User.settings', ['user' => $user]);
    }
}
