<?php

namespace App\Http\Controllers\admin;
use App\Models\Auction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcutionController extends Controller
{

    public function index()
    {
        $auctions = Auction::orderBy('id')->get();
        return view('Admin.auctions.auctions')->with('auctions', $auctions);
    }

    public function action(Request $request, $id)
    {
        $auction = Auction::find($id);
        if(!$auction)
            return abort('404');
        if ($request->input('approve')){
            $action = Auction::where('id', $id)->update(['status' => '2']);
        }
        elseif ($request->input('disapprove')) {
            $action = Auction::where('id', $id)->update(['status' => '1']);
        }
        return redirect()->back();
    }

    public function showDetails(Request $request, $id)
    {
        $found = Auction::find($id);
        if($found){
            $auction = Auction::with(['car', 'bids'])->where(['id' => $id])->first();
            // dd($auction);
            if($auction){
                return view('Admin.auctions.auctionDetails')->with('auction', $auction);
            }
        }     
        return response()->view('Front.404', []);
        return redirect()->back();
    }
}
