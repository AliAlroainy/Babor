<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(){
        $auctions = Auth::user()->favorite()->with('bids')->latest()->get();
        $title = 'قائمة التفضيلات';
        return view('Front.auctions')->with(['auctions' => $auctions, 'title' => $title]);
    }

    public function store(){
        if(!auth()->user()->favoriteHas(request('auction_id'))){
            auth()->user()->favorite()->attach(request('auction_id'));
        }
        return redirect()->back();
    }

    public function destroy(){
        auth()->user()->favorite()->detach(request('auction_id'));
        return redirect()->back();
    }
    
}
