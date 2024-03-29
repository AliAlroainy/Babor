<?php

namespace App\Http\Controllers\user;
use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Car;
use App\Models\User;
use App\Models\Brand;
use App\Models\Auction;
use App\Models\Category;
use App\Trait\ImageTrait;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreAuctionRequest;
use GuzzleHttp\Exception\ConnectException;
use App\Http\Controllers\Notifications\NotificationController;

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
            'jear'            => $request->input('jear'),
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

    public function showMyAuctions(Request $request, $id=null){
        try{
            $route = Route::current()->getName();
            $current_user = Auth::id();

            //! Delete by user his/her auction before approved by admin
            if($route == 'user.delete.pending.auction'){
                $found = Auction::find($id);
                if(!$found)
                    return redirect()->back()->with('notFound', 'هذا العنصر غير موجود');
                $is_deleted = Auction::whereId($id)->delete();
                if($is_deleted){
                    return redirect()->back()->with('successDelete', 'تم الحذف بنجاح');
                }
                return redirect()->back()->with('errorDelete', 'حدث خطأ!');
            }
            else{
                if($route == 'user.show.pending.auction'){
                    $status='0';
                }
                elseif($route == 'user.show.disapproved.auction'){
                    $status='1';
                }
                elseif($route == 'user.show.progress.auction'){
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
            }

            $auctions = Auction::where(['auctioneer_id' => $current_user, 'status' => $status])
                        ->when($status == '2', function ($s){
                                return $s->whereDate('closeDate', '>', now());
                        })
                        ->with('bids', function ($q){ $q->orderBy('id', 'desc')->get();})->get();
            if($auctions)
                return view('Front.Auction.auctions')->with('auctions',$auctions);
        }     
        catch (\Illuminate\Http\Client\ConnectionException $e) {
            return view('Front.errors.noconnection', ['url' => url()->previous()]);
        }
        catch (\Exception $th) {
            return redirect()->back()->with('message', 'حدث خطأ ما، حاول مرة أخرى');
        }
    }

    public function showDetails(Request $request, $id)
    {
        try{
            $found = Auction::find($id);
            if($found){
                $auction = Auction::whereId($id)->with('bids', function ($q){
                    //get last bid of this auction
                    $q -> orderBy('id', 'desc')->first();
                })->first();
                if($auction){
                    return view('Front.Auction.auctionDetails')->with('auction', $auction);
                }
            }
            return response()->view('Front.errors.404', []);
        }
        catch (\Illuminate\Http\Client\ConnectionException $e) {
            return view('Front.errors.noconnection', ['url' => url()->previous()]);
        }
        catch (\Exception $th) {
            return redirect()->back()->with('message', 'حدث خطأ ما، حاول مرة أخرى');
        }
    }

    public function action(Request $request, $id){
        try{
            // '3': canceled, '4': uncomplete
            $found = Auction::find($id);
            $auction = Auction::whereId($id);
            $auction->when($request->has('cancel'), function ($q) use ($id, $auction){
                $q->update(['status' => '3']);
                $q->when($auction->first()->bids->count() > 0, function ($q) use ($id, $auction){
                    $this->refundBidders($id);
                    $notify = new NotificationController();
                    $notify->cancelAuction($auction->first(),$id);
                });
            });
            $auction->when($request->has('timeExtension'), function ($q) use ($auction){
                            $q->update(['closeDate' => Carbon::parse($auction->first()->closeDate)->addDays(2)]);
                        });
            $auction->when($request->has('stop'), function ($q) use ($id, $found, $auction){
                            $this->apiConnect(
                                $id,
                                $found,
                                $found->bids->sortDesc()->first()->id,
                                [
                                    'id'    => $found->car->id,
                                    'product_name'  => $found->type_and_model(),
                                    'quantity' => 1,
                                    'unit_amount' => $found->openingBid,
                                ],
                                $found->bids->sortDesc()->first()->currentPrice,
                                []
                            );
                            $q->update([
                                'status' => '4',
                                'winnerPrice'=> $found->bids->sortDesc()->first()->currentPrice,
                                'winner_id' => Bid::where('auction_id', $id)->orderBy('id', 'desc')->first()->bidder_id
                            ]);
                            $notify = new NotificationController();
                            $notify->stopAuction($auction->first(),$auction->first()->winner_id);

                            $this->refundBidders($id);
                            $notify->refundBidders($auction->first(),$auction->first()->winner_id,$id);
                        });
            return redirect()->back();
        }
        catch (\Illuminate\Http\Client\ConnectionException $e) {
            return view('Front.errors.noconnection', ['url' => url()->previous()]);
        }
        catch (\Exception $th) {
            return redirect()->back()->with('message', 'حدث خطأ ما، حاول مرة أخرى');
        }
    }

    //Refunds to previous bidders
    public function refundBidders($id){
        $admin = User::first();
        $bid = Auction::find($id)->bids;
        foreach(range (0, count($bid)-1) as $i){
            $admin->transfer($bid[$i]->user, $bid[$i]->getDeduction(), ['unbid'=>$bid[$i]->id]);
            Bid::whereId($bid[$i]->id)->update(['refund' => 1]);
        }
    }

    public function apiConnect($id, $found, $ref, $product, $total, $meta){
        $apiURL = 'https://waslpayment.com/api/v1/merchant/payment_order';
        $headers = [
            'private-key' => 'XkAk4TDBg2V3PC5wpakv3D0YJy3z2d5jzox8y2VKNhOrIcQOKb',
            'public-key' => 'xckcJsiB6wBakHlM0VHDuuJVw',
            'Content-Type' => 'application/x-www-form-url'
        ];
        $data = [
            "order_reference" => $ref,
            "products"=> [$product],
            "total_amount" => $total,
            "currency" => "YER",
            "success_url" => "http://localhost:8000/user/payment/success/".$found->bids->sortDesc()->first()->id,
            "cancel_url"=> "http://localhost:8000/user/payment/failed",
            "metadata"=> (object)$meta,
        ];
        $response = Http::withHeaders($headers)->post($apiURL, $data);  
        Auction::whereId($id)->update([
            'next_url' => url($response['invoice']['next_url']),
        ]);
        Payment_Bill::firstOrCreate(
            ['bid_id' => $found->bids->sortDesc()->first()->id],
            ['invoice_reference' => $response['invoice']['invoice_referance']]
        );
    }
}
