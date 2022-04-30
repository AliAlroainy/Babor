<?php

namespace App\Http\Controllers\user;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Auction;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAuctionRequest;

class UserAuctionController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $route = \Request::route()->getName();
        $auctions= Auction::orderBy('id')->get();
        return view('Front.Auction.auctions', ['route' => $route])->with('auctions',$auctions);
    }
    public function create(){
        $brands = Brand::all();
        return view('Front.Auction.add-auction', ['brands' => $brands]);
    }
    public function getSeries(Request $request){
        $series = \DB::table('series')->where('brand_id', $request->brand_id)->get(); 
        if (count($series) > 0) {
            return response()->json($series);
        }
    }

    public function show(){
        
    }

    public function store(StoreAuctionRequest $request){
        $thumbnail = $request->hasFile('thumbnail')? $this->saveImage($request->thumbnail, 'images/cars'):"default.png";
        if($request->hasfile('car_images')){
            foreach($request->file('car_images') as $file)
            {
                $images = $this->saveImage($file, 'images/cars/car_images');
                $data[] = $images;  
            }
        }
        $car = Car::create([
            'brand_id'        => $request->input('brand_id'),
            'series_id'       => $request->input('series_id'),
            'model'           => $request->input('model'),
            'color'           => $request->input('color'),
            'numberOfKillos'  => $request->input('numberOfKillos'),
            'carPosition'     => $request->input('carPosition'),
            'thumbnail'       => $thumbnail,
            'car_images'      => json_encode($data),
        ]);
        $auction = Auction::create([
            'startPrice'      => $request->input('startPrice'),
            'closeDate'       => $request->input('closeDate'),
            'startDate'       => now(),
            'minInc'          => $request->input('minInc'),  
            'user_id'         => Auth::user()->id, 
            'car_id'          => $car->id,
        ]);
        return redirect()->route('user.add.auction')
            ->with('successEdit','تم نشر مزادك');
    }

    public function udpate(Request $request){

    }
}
