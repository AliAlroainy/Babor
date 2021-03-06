<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Notifications\NotificationController;
use App\Models\User;
use App\Models\Brand;
use App\Models\Series;
use App\Models\Auction;
use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Notification;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\ReviewRating;
use phpDocumentor\Reflection\Types\String_;
use Pusher\Pusher;

class AcutionController extends Controller
{

    public function index()
    {
        $auctions = Auction::orderBy('id', 'desc')->get();
        $brands = Brand::where('is_active', 1)->select('id', 'name')->get();
        $series = Series::where('is_active', 1)->select('id', 'name')->get();
        return view('Admin.auctions.auctions')->with([
            'auctions'=> $auctions,
            'brands'  => $brands,
            'series'  => $series
        ]);
    }

    public function indexWithFilter(Request $request){
        $query = $request->search_query;
        if($request->ajax()){
            $auctions = Auction::getAuctions($query);
        view('Front.auctions')->with(['auctions' => $auctions, 'title' => 'نتائج الفلترة'])->render();
        }
    }
    public function action(Request $request, $id)
    {
        try{
            $notify = new NotificationController();
            $found = Auction::find($id);
            $admin = User::whereId(1)->first();
            if(!$found)
                return abort('404');
            $auction = Auction::whereId($id);
            if($request->has('approve')){
                $notify->newAuctionNotification($found);
                //$notify->auctionApproved($found);
                $auction->update(['status' => '2', 'startDate' => now()]);
            }
            if($request->has('disapprove')){
                Validator::validate($request->all(), [
                    'reject_reason' => 'required|string',
                ], [
                    'reject_reason.required' => 'حقل السبب مطلوب',
                    'reject_reason.string'   => 'هذاالحقل يجب أن يكون نصا',
                ]);
                $notify->auctionDisapproved($found);
                $auction->update(['status' => '1']);
                $auc = Auction::find($id);
                $auc->rejectReason = $request->reject_reason;
                $auc->save();
            }
            return redirect()->back();
        }
        catch (\Illuminate\Broadcasting\BroadcastException $e) {
            return view('Front.errors.noconnection');
        }
        catch (\Illuminate\Http\Client\ConnectionException $e) {
            throw new ApiErrorException($e->getMessage());
            return view('Front.errors.noconnection');
        } catch (\Throwable $th) {
            throw $th;
            return back()->with(['messageFailed' => 'فشلت العملية، الرجاء المحاولة مرة أخرى']);
        }
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

    public function reviewstore(Request $request){
        $review = new ReviewRating();
        $review->post_id = $request->post_id;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->phone   = $request->phone;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }
}
