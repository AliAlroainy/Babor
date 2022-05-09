<?php

namespace App\Http\Controllers\admin;
use App\Models\Brand;
use App\Models\Series;
use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AcutionController extends Controller
{

    public function index()
    {
        $auctions = Auction::orderBy('id')->get();
        $brands = Brand::where('is_active', 1)->select('id', 'name')->get();
        $series = Series::where('is_active', 1)->select('id', 'name')->get();
        return view('Admin.auctions.auctions')->with([
            'auctions'=> $auctions, 
            'brands'  => $brands,
            'series'  => $series
        ]);
    }

    public function indexWithFilter(Request $request){ 
        $brands = Brand::where('is_active', 1)->select('id', 'name')->get();
        $series = Series::where('is_active', 1)->select('id', 'name')->get();

        $q = DB::table('auctions');
        if($request->has('status')) 
             $q->where('status', $request->status);
     
        if($request->has('brand'))
             $q->where('id', $request->brand);    
 
        if($request->has('series'))
            $q->where('id', $request->series);
        $auctions = $q->get();
        return view('Admin.auctions.auctions')->with([
            'auctions'=> $auctions,
            'brands'  => $brands,
            'series'  => $series
            ]
        );
    }
    public function action(Request $request, $id)
    {
        $found = Auction::find($id);
        if(!$found)
            return abort('404');
        $auction = Auction::whereId($id);
        $auction->when($request->has('approve'), function ($q){
            $q->update(['status' => '2', 'startDate' => now()]);
        });
        $auction->when($request->has('disapprove'), function ($q){
                        $q->update(['status' => '1']);
                    });
        return redirect()->back();
    }

    public function showDetails(Request $request, $id)
    {
        $found = Auction::find($id);
        if($found){
            $auction = Auction::where('id',$id)->with('bids', function ($q){
                //get last bid of this auction
                $q -> orderBy('id', 'desc')->first();
            })->first();
            if($auction){
                return view('Admin.auctions.auctionDetails')->with('auction', $auction);
            }
        }
        return response()->view('Front.404', []);
    }
}
