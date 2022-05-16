<?php

namespace App\Http\Controllers\user;

use App\Models\Confirmation;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ConfirmationController extends Controller
{
    public function doContract($bill_id){
        $route = Route::current()->getName();
        $bill = Payment_Bill::where(['id' => $bill_id])->first();

        if(!$bill)
            return response()->view('Front.404', []);
            
        //Only allow the current user to enter his contract via his bill
        $current_user_is_bill_owner = $bill->bid->user == Auth::user();
        if(!$current_user_is_bill_owner)
            return response()->view('Front.404', []);

        $bid = $bill->bid;
        $buyer_confirmed = false;
        if(Confirmation::where(['payment_bill_id' => $bill_id, 'buyer_confirm' => 1])->first() != null)
            $buyer_confirmed = true;

        return view('Front.addtions.confirmBuy', ['route' => $route, 'bid' => $bid, 'buyer_confirmed' => $buyer_confirmed]);
    }

    public function confirm(Request $request, $id){
        $route = Route::current()->getName();
        if($route == 'buyer.confirm')
            if(Confirmation::where(['payment_bill_id' => $id, 'buyer_confirm' => 1])->get())
            Confirmation::firstOrCreate(
                ['payment_bill_id' => $id],
                ['buyer_confirm' => 1]
            );
        return redirect()->back();
    }
}
