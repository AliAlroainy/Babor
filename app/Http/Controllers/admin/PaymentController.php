<?php

namespace App\Http\Controllers\admin;

use App\Models\Bid;
use App\Models\User;
use App\Models\Auction;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function buy(Request $request, $id){
        $auction = Auction::find($id);
        if(!$auction)
            return redirect()->back()->with('notFound', 'هذا العنصر غير موجود');
        return redirect($request->input('next_url'));
    }

    public function success($id, $res){ 
        $bid = Bid::find($id);
        $money = $bid->currentPrice;
        $bidder = $bid->user;
        $bill = Payment_Bill::where('bid_id', $id)->orderBy('id', 'desc')->first();
        if($bill->payment_status == 0){
            if($bidder->balance >= $money){
                $bidder->transfer(User::first(), $money);
                DB::table('payment_bills')->where('bid_id', $id)->update(
                    [
                        'payment_status' => 1, 
                        'created_at'     => now(),
                    ]
                );
            }
            return view('Front.addtions.bill', ['bill' => $bill]);
        }
        else{
            return view('Front.addtions.failed');
        }   
        // else
        //     return redirect()->back()->with('errorPayment','رصيدك غير كافٍ لشراء السيارة، الرجاء تعبئة رصيدك');
        // return redirect()->back()->with('sendMoney', 'تم إرسال قيمة السيارة إلى الأدمن');
    }
    public function failed($res){
        return view('Front.addtions.failed');
    }
}
