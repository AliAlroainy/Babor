<?php

namespace App\Http\Controllers\admin;
use App\Models\Bid;
use App\Models\Auction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BidsController extends Controller
{
    // $bids=Bid::with(['user','auction'])->where('bidder_id',$id)->orderBy('bidder_id', 'desc')->first();
    public function index()
    {
        $auctions= Auction::orderBy('id')->with('bids', function ($q){ 
            $q->orderBy('id', 'desc')->get();
        })->get();
        return response($auctions);
        return view('Admin.auctions.bids')->with(['auctions'=>$auctions]);
    }
}