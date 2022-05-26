<?php

namespace App\Http\Controllers\admin;
use App\Models\Auction;
use App\Models\User;
use App\Models\Brand;
use App\Models\Series;
use App\Models\service;
use App\Models\Category;
use App\Models\Bid;
use App\Models\ReviewRating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactUs;
class adminIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $Auctions = Auction::get()->count();
            $auctionPercentage=$Auctions/100;
    
            $service = service::get()->count();
            $servicePercentage=$service/100;
    
            
            $user= User::get()->count();
            $userper=$user/100;
    
            $category= Category::get()->count();
            $categoryper=$category/100;
    
            $brands= Brand::get()->count();
            $brandsper=$brands/100;
    
            $seris= Series::get()->count();
            $serisper=$seris/100;
            $stars= ReviewRating::get()->count();
            $starper=$stars/100;
    
            $messages= contactUs::get()->count();
            $messagesprs=$messages/100;
    
            $bids= Bid::get()->count();
            $bidsprs=$bids/100;
            return view('Admin.index')->with([
                'auction' => $Auctions ,
                'prec'=>$auctionPercentage,
                'service' => $service ,
                'serviceprec'=>$servicePercentage,
                'user' => $user ,
                'userper'=>$userper,
                'category' => $category ,
                'categoryper'=>$categoryper,
                'brands' => $brands ,
                'brandsper'=>$brandsper,
                'seris' => $seris,
                'serisper'=>$serisper,
                'stars'=>$stars,
                'starper'=>$starper,
                'messages'=>$messages,
                'messagesprs'=>$messagesprs,
                'bids'=>$bids,
                'bidsprs'=>$bidsprs,   
            ]);
        }
        catch(\Throwable $t){
            return view('Front.errors.403');
        }
    }
   

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
