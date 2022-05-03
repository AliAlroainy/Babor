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

    public function auctionsList(){
        $auctions = Auction::where('status', '1')->with('car')->get();
        return view('Front.auctions', ['auctions' => $auctions]);
    }

    public function auctionShow($id){
        $auction = Auction::find($id);
        if(!$auction)
            return response()->view('Front.404', []);
        return view('Front.details')->with('auction', $auction);
    }
}
