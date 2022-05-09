<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $auctions = Auction::with(['car' => function ($q) {
            $q->select('brand_id', 'series_id', 'model', );
        }]);
        return view('Front.index')->with('auctions', $auctions);
    }

    public function availableAuctions(){
        // available = not-expired + progress
        $auctions = Auction::whereDate('closeDate', '>', now())->where('status', '2')->get();
        return view('Front.auctions', ['auctions' => $auctions]);
    }

    public function auctionShow($id){
        $found = Auction::find($id);
        if($found){
            $auction = Auction::where('id', $id)->whereNotIn('status', ['0','1'])->withCount('bids')->first();
            if($auction){
                return view('Front.details')->with('auction', $auction);
            }
        }     
        return response()->view('Front.404', []);
    }
}
