<?php

namespace App\Http\Controllers\user;
use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Auction;
use App\Models\Category;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreAuctionRequest;

class UserAuctionController extends Controller
{
    use ImageTrait;
    // public function index()
    // {
    //     $auctions= Auction::orderBy('id')->get();
    //     return view('Front.Auction.auctions')->with('auctions',$auctions);
    // }

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
            'minInc'          => $request->input('minInc'),
            'auctioneer_id'   => Auth::user()->id,
            'car_id'          => $car->id,
        ]);
        return redirect()->route('user.add.auction')
            ->with('successSubmit','مزادك في انتظار موافقة المسؤول');
    }

    public function showMyAuctions(Request $request){
        $route = Route::current()->getName();
        if($route == 'user.show.pending.auction'){
            $status='0';
        }
        if($route == 'user.show.disapproved.auction'){
            $status='1';
        }
        if($route == 'user.show.progress.auction'){
            $status='2';
        }
        elseif($route == 'user.show.canceled.auction'){
            $status='3';
        } 
        elseif($route == 'user.show.uncompleted.auction'){
            $status='4';
        }   
        elseif($route == 'user.show.completed.auction'){
            $status='5';
        }   
        $current_user = Auth::id();
        $auctions = Auction::where(['auctioneer_id' => $current_user, 'status' => $status])
                    ->withCount('bids')
                    ->when($status == '2', function ($s){
                            return $s->whereDate('closeDate', '>', now());
                    })
                    ->with('bids', function ($q){ $q->orderBy('id', 'desc')->first();})->get();

        if($auctions)
            return view('Front.Auction.auctions')->with('auctions',$auctions);  
    }

    public function action(Request $request, $id){
        // '3': canceled, '4': uncomplete
        $found = Auction::find($id);
        if(!$found)
            return abort('404');
            
        $auction = Auction::whereId($id);
        $auction->when($request->has('cancel'), function ($q){
            $q->update(['status' => '3']);
        });
        $auction->when($request->has('timeExtension'), function ($q) use ($auction){
                        $q->update(['closeDate' => Carbon::parse($auction->closeDate)->addDays(2)]);
                    });
        $auction->when($request->has('stop'), function ($q) use ($auction){
                        $q->update(['status' => '4']);
                    });
        return redirect()->back();          
    }

    public function subscribedAuctions (Request $request)
    {

        $id=Auth::id();
        $bids=Bid::with(['user','auction'])->where('bidder_id',$id)->orderBy('bidder_id', 'desc')->first();
        $auctions= Auction::orderBy('id')->get();
        return view('Front.Auction.auctions')->with(['auctions'=>$auctions,'bids'=>$bids]);


    }
    public function udpate(Request $request){

    }
}
