<?php

namespace App\Http\Controllers\admin;
use App\Models\Auction;
use App\Models\User;
use App\Models\Brand;
use App\Models\Series;
use App\Models\service;
use App\Models\Category;
use App\Models\Bid;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Auctions = Auction::get()->count();
        $auctionPercentage=$Auctions/100;

        $service = service::get()->count();
        $servicePercentage=$service/100;

        
       

        return view('Admin.index')->with([
            'auction' => $Auctions ,
            'prec'=>$auctionPercentage,
            'service' => $service ,
            'serviceprec'=>$servicePercentage,
            'user' => $user ,
            'userper'=>$userper,
           
        ]);


   
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
