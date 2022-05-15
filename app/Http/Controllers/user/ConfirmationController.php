<?php

namespace App\Http\Controllers\user;

use App\Models\Bid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ConfirmationController extends Controller
{
    public function confirm($id){
        $route = Route::current()->getName();
        $bid = Bid::whereId($id)->first();
        return view('Front.addtions.confirmBuy', ['route' => $route, 'bid' => $bid]);
    }
}
