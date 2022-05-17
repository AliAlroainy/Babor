<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\Category;
use App\Models\question;
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
        return view('Front.auctions')->with(['auctions' => $auctions, 'title' => 'المزادات الحالية']);
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

    public function newCars(){
        $auctions = Auction::whereNotIn('status', ['0','1'])->with('bids', function($q){
            $q->orderBy('id', 'desc')->first();
        })->with('car', function ($q){
            $q->where('status', '1')->get();
        })->get();
        if($auctions){
            return view('Front.auctions')->with(['auctions' => $auctions, 'title' => 'السيارات الجديدة']);
        }
        return response()->view('Front.errors.404', []);
    }
    public function oldCars(){
        $auctions = Auction::whereNotIn('status', ['0','1'])->with('bids', function($q){
           return $q->orderBy('id', 'desc')->first();
        })->with('car', function ($q){
           return $q->where('status', '0')->get();
        })->get();
        if($auctions){
            return view('Front.auctions')->with(['auctions' => $auctions, 'title' => 'السيارات القديمة']);
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

}
