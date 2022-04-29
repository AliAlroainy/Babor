<?php

namespace App\Http\Controllers\user;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAuctionController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('Front.Auction.add-auction', ['brands' => $brands]);
    }

    public function getSeries(Request $request){
        $series = \DB::table('series')->where('brand_id', $request->brand_id)->get(); 
        if (count($series) > 0) {
            return response()->json($series);
        }
    }
}
