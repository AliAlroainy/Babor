<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Notifications\NotificationController;
use App\Models\Bid;
use App\Models\User;
use App\Models\Auction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BidController extends Controller
{
    public function index(){
        $bids = Bid::where('bidder_id', Auth::id())->with('auction')->get();
        return view('Front.Auction.bids')->with('bids',$bids);
    }
    public function create(Request $request, $id){
        $current_user = Auth::id();
        $found = Auction::find($id);
        $current_auction = Auction::whereId($id);

        Validator::validate($request->all(), [
            'bidPrice' => 'required|numeric|min:'.$found->minInc,
        ], [
            'bidPrice.required' => 'هذا الحقل مطلوب',
            'bidPrice.numerice' => 'هذاالحقل يجب أن يكون رقما',
            'bidPrice.min' => 'أقل سعر تستطيع المزايدة به هو : '.$found->minInc,
        ]);

        //constraints
        if(!$found ){ // auction is not found
            return redirect()->route('site.auction.details', $id)->with('errorBid','لا يوجد لدينا هذا المزاد');
        }

        $status = $found->status;
        if($status != '2'){ // auction is not in progress
            return redirect()->route('site.auction.details', $id)->with('errorBid','هذا المزاد ليس جاريا');
        }

        $bid = new Bid();
        $bid->auction_id = $id;
        $bid->bidder_id = $current_user;
        $bid->bidPrice =  $request->input('bidPrice');
        $bid->securityDeposit = 10;


        $start_before = Bid::where('auction_id', $id)->first();
        if(!$start_before)
            $bid->currentPrice = $bid->bidPrice + Auction::whereId($id)->first()->openingBid;
        else
            // to get last bid of an auction
            $bid->currentPrice = $bid->bidPrice + Bid::where('auction_id', $id)->orderBy('id', 'desc')->first()->currentPrice;
        
        
        //check balance
        if($bid->user->balance >= $bid->bidPrice){
            $deduction = $bid->getDeduction();
            $bid->save();
            $bid->user->transfer(User::first(), $deduction, ['bid' => $bid->id]);
            $notify = new NotificationController();
            $notify->bidOnAuction($bid);
            return redirect()->back()->with('successBid', 'تمت المزايدة بنجاح');
        }
        else
            return redirect()->route('site.auction.details', $id)->with('errorBid','رصيدك غير كافٍ لإجراء هذه المزايدة');
    }
}
