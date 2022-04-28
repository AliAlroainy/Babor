<?php

namespace App\Http\Controllers\user;

use App\Models\Brand;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAuctionController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $series = Series::all();
        return view('Front.Auction.index');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $car = Car::create([
            'brand_id'       => $request->brand_id,
            'series'         => $request->series_id,
            'model'          => $request->model,
            'color'          => $request->color,
            'sizOfdamage'    => $request->sizOfdamage,
            'status'         => $request->status,
            'numberOfKillos' => $request->numberOfKillos,
            'carPosition'    => $request->carPosition,
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
