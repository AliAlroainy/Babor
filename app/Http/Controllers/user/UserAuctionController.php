<?php

namespace App\Http\Controllers\user;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Auction;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuctionRequest;

class UserAuctionController extends Controller
{
    use ImageTrait;
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

    public function store(Request $request){
        $filename = $request->hasFile('thumbnail')? $this->saveImage($request->thumbnail, 'images/cars'):"default.png";
        $car = Car::create([
            'brand_id'        => $request->brand_id,
            'series_id'       => $request->series_id,
            'model'           => $request->model,
            'color'           => $request->color,
            'numberOfKillos'  => $request->numberOfKillos,
            'carPosition'     => $request->carPosition,
            'thumbnail'       => $request->thumbnail,
        ]);
        $auction = Auction::create([
            'startPrice'      => $request->startPrice,
            'closeDate'       => $request->closeDate,
            'startDate'       => now(),
            'minInc'          => $request->minInc,  
            'user_id'         => Auth::user()->id,    
        ]);
    }
}
