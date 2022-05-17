<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\Category;
use App\Models\question;
use App\Models\ReviewRating;
class SiteController extends Controller
{
    public function home(){
        $auctions = Auction::with(['car' => function ($q) {
            $q->select('brand_id', 'series_id', 'model', );
        }]);
        $last_cars = Auction::with(['car' => function ($q){
            return $q->where('category_id', 1)->get();
        }])->where('status', '2')->orderBy('id', 'desc')->get();
        $last_salons = Auction::with(['car' => function ($q){
            return $q->where('category_id', 2)->get();
        }])->where('status', '2')->orderBy('id', 'desc')->get();
        $last_taxis = Auction::with(['car' => function ($q){
            return $q->where('category_id', 3)->get();
        }])->where('status', '2')->orderBy('id', 'desc')->get();
        $last_babors = Auction::with(['car' => function ($q){
            return $q->where('category_id', 4)->get();
        }])->where('status', '2')->orderBy('id', 'desc')->get();
        $last_buses = Auction::with(['car' => function ($q){
            return $q->where('category_id', 5)->get();
        }])->where('status', '2')->orderBy('id', 'desc')->get();
        return view('Front.index')->with([
            'auctions'=> $auctions,
            'last_cars' => $last_cars,
            'last_salons'=> $last_salons,
            'last_taxis' => $last_taxis,
            'last_babors' => $last_babors,
            'last_buses' => $last_buses,
        ]);
    }

    public function availableAuctions(){
        // available = not-expired + progress
        $auctions = Auction::whereDate('closeDate', '>', now())->where('status', '2')->get();
        return view('Front.auctions', ['auctions' => $auctions]);
    }

    public function auctionShow($id){
        $found = Auction::find($id);
        if($found){
            $auction = Auction::whereId($id)->whereNotIn('status', ['0','1'])->withCount('bids')->with('bids', function($q){
                $q->orderBy('id', 'desc')->first();
            })->withCount('bids')->first();
            if($auction){
                return view('Front.details')->with('auction', $auction);
            }
        }
        return response()->view('Front.errors.404', []);
    }
    public function ServicesShow(){
        $services = service::where('is_active', '1')->get();
        return view('Front.services', ['services' => $services]);
    }
    public function categoriesShow(){
        $categories = Category::where('is_active', '1')->get();
        return view('Front.include.produacts', ['Categories' => $categories]);
    }
    public function questionShow(){
        $questions = question::where('is_active', '1')->get();
        return view('Front.FAQ', ['questions' => $questions]);
    }
    public function reviewstore(Request $request){
        $review = new ReviewRating();
        $review->user_id = $request->user_id;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->phone   = $request->phone;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }

}
