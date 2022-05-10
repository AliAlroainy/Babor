<?php

namespace App\Http\Controllers\admin;
use App\Models\Bid;
use App\Models\Auction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BidsController extends Controller
{
    public function index()
    {
        $bids = Bid::get();
        return view('Admin.auctions.bids')->with(['bids'=>$bids]);
    }
}
