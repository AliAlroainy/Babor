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

    public function auction(){
        $auctions = Auction::where('status', 0)->with(['car' => function ($q) {
            $q->select(        
                'category_id',
                'brand_id',
                'series_id',
                'model',
                'color',
                'numberOfKillos',
                'carPosition',
                'thumbnail',
                'car_images',);
        }]);
        // dd($auctions);
        return view('Front.auction')->with('auctions', $auctions);
    }
}
