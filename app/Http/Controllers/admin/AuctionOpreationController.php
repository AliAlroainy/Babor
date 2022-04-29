<?php

namespace App\Http\Controllers\admin;
use App\Models\Category;
use App\Models\Auction;
use App\Models\User;
use App\Models\Car;

use App\Models\Bid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuctionOpreationController extends Controller
{
    //
    public function index()
    {
        $route = \Request::route()->getName();
        $auctions = Auction::orderBy('id','desc')->get();

        return view('admin.auctions.auctions', ['route' => $route])->with('Auction',$auctions);

    }

    public function destroy($auctions_id)
    {
        $auctions=Auction::find($auctions_id);
        if(!$auctions)
            return abort('404');
        $auctions->is_active*=-1;
        if($auctions->save())
            return back();
    }
}
