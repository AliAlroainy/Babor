<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(){
        $auctions = auth()->user()->favorite()->orderBy('id', 'desc')->first()->get();
        dd($auctions);
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
   
        if(!auth()->user()->favoriteHas(request('auction_id'))){
            auth()->user()->favorite()->attach(request('auction_id'));
        }
        return redirect()->back();
    }
    
}
