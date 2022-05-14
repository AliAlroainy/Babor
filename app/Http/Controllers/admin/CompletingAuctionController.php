<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Auction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompletingAuctionController extends Controller
{
    public function buy($id){
        $auction = Auction::find($id);
        if(!$auction)
            return redirect()->back()->with('notFound', 'هذا العنصر غير موجود');

        $money = $auction->bids->sortDesc()->first()->currentPrice;
        $bidder = $auction->bids->sortDesc()->first()->user;
        if($bidder->balance >= $money)
            $bidder->transfer(User::first(), $money);
        else
            return redirect()->back()->with('errorPayment','رصيدك غير كافٍ لشراء السيارة، الرجاء تعبئة رصيدك');
        return redirect()->back()->with('sendMoney', 'تم إرسال قيمة السيارة إلى الأدمن');
    }
}
