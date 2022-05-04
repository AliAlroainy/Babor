<?php

namespace App\Http\Controllers\user;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Auction;
use App\Models\Category;
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
        $auctions= Auction::orderBy('id')->get();
        return view('Front.Auction.auctions')->with('auctions',$auctions);
    }

    public function create(){
        $brands = Brand::where('is_active', 1)->select('id', 'name')->get();
        $categories = Category::where('is_active', 1)->select('id', 'name')->get();
        return view('Front.Auction.add-auction', [
            'brands'     => $brands,
            'categories' => $categories,
        ]);
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
            'category_id'     => $request->input('category_id'),
            'brand_id'        => $request->input('brand_id'),
            'series_id'       => $request->input('series_id'),
            'model'           => $request->input('model'),
            'color'           => $request->input('color'),
            'numberOfKillos'  => $request->input('numberOfKillos'),
            'description'     => $request->input('description'),
            'carPosition'     => $request->input('carPosition'),
            'sizOfDamage'     => $request->input('sizOfDamage'),
            'status'          => $request->input('status'),
            'thumbnail'       => $thumbnail,
            'car_images'      => json_encode($data),
        ]);
        $auction = Auction::create([
            'openingBid'      => $request->input('openingBid'),
            'reservePrice'    => $request->input('reservePrice'),
            'closeDate'       => $request->input('closeDate'),
            'startDate'       => now(),
            'minInc'          => $request->input('minInc'),
            'user_id'         => Auth::user()->id,
            'car_id'          => $car->id,
        ]);
        return redirect()->route('user.add.auction')
            ->with('successSubmit','مزادك في انتظار موافقة المسؤول');
    }

    public function validDiscount() {
        return $this->startDate <= now()->toDateTimeString()
            && $this->closeDate >= now()->toDateTimeString();
    }

    public function CurrentAuction(Request $request)
    {
        $currentDate = date('Y-m-d');
        $currentDate = date('Y-m-d', strtotime($currentDate));
        $auctions= Auction::orderBy('id')->get();
        $items = DB::table('auctions')
        ->select('id', 'closeDate','winner')
        ->first();
//if (!empty($items->winner)) when bid table is done we will add it
       if($items->closeDate != $currentDate )
       return view('Front.Auction.auctions')->with('auctions',$auctions);
        else {
            echo "sorry";
        }
    }
    public function udpate(Request $request){

    }
}
