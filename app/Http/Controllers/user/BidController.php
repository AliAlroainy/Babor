<?php

namespace App\Http\Controllers\user;

use App\Models\Bid;
use App\Models\User;
use App\Models\Auction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BidController extends Controller
{
    public function __invoke(Request $request, $id){
        $current_user = Auth::id();
        $current_auction = Auction::find($id);

        Validator::validate($request->all(), [
            'bidPrice' => 'required|numeric|min:'.$current_auction->minInc,
        ], [
            'bidPrice.required' => 'هذا الحقل مطلوب',
            'bidPrice.numerice' => 'هذاالحقل يجب أن يكون رقما',
            'bidPrice.min' => 'أقل سعر تستطيع المزايدة به هو : '.$current_auction->minInc,
        ]);

        //constraints
        if(!$current_auction ){ // auction is not found
            return redirect()->route('site.auction.details', $id)->with('errorBid','لا يوجد لدينا هذا المزاد');
        }

        $is_auctioneer = $current_auction->where('auctioneer_id', $current_user)->first();
        if($is_auctioneer)
            return redirect()->route('site.auction.details', $id)->with('warningBid','لا تستطيع المزايدة على مزادك!');

        $status = $current_auction->status;
        if($status != '2'){ // auction is not in progress
            return redirect()->route('site.auction.details', $id)->with('errorBid','هذا المزاد ليس جاريا');
        }

        $bid = new Bid();
        $start_before = Bid::where('auction_id', $id)->first();
        $bid->auction_id = $id;
        $bid->bidder_id = $current_user;
        $bid->bidPrice =  $request->input('bidPrice');
        if(!$start_before)
            $bid->currentPrice = $bid->bidPrice + Auction::where('id', $id)->first()->openingBid;
        else
            // to get last bid of an auction
            $bid->currentPrice = $bid->bidPrice + Bid::where('auction_id', $id)->orderBy('id', 'desc')->first()->currentPrice;
        $bid->save();
        return redirect('/');
    }
}
