<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Auction;
use App\Models\Contract;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ContractController extends Controller
{
    public function doContract($bill_id){
        $bill = Payment_Bill::whereId($bill_id)->first();
        if(!$bill)
            return response()->view('Front.errors.404', []);

        //Only allow the current user to enter his contract via his bill
        $is_buyer = $bill->bid->user == Auth::user();
        $is_seller = $bill->bid->auction->user == Auth::user();
        $user = '';
    
        if($is_buyer)
            $user = 'buyer';
        else if($is_seller)
            $user = 'seller';

        if($is_buyer || $is_seller){
            $bid = $bill->bid;
            $buyer_confirmed = null;
            $seller_confirmed = null;
            if(Contract::where(['payment_bill_id' => $bill_id, 'buyer_confirm' => 1])->first() != null)
                $buyer_confirmed = true;
                
            if(Contract::where(['payment_bill_id' => $bill_id, 'seller_confirm' => 1])->first() != null)
                $seller_confirmed = true;

            if(Contract::where(['payment_bill_id' => $bill_id, 'buyer_confirm' => 0])->first() != null)
                $buyer_confirmed = false;
                
            if(Contract::where(['payment_bill_id' => $bill_id, 'seller_confirm' => 0])->first() != null)
                $seller_confirmed = false;

            return view('Front.Auction.contractDocument', [
                'user' => $user, 
                'bid' => $bid, 
                'buyer_confirmed' => $buyer_confirmed,
                'seller_confirmed'=> $seller_confirmed,
            ]);
        }
        return response()->view('Front.errors.403', []);
    }

    public function contract(Request $request, $bill_id){
        $bill = Payment_Bill::whereId($bill_id)->first();
        $is_buyer = $bill->bid->user == Auth::user();
        $is_seller = $bill->bid->auction->user == Auth::user();
        if($is_buyer){
            if($request->has('approve')){
                Contract::updateOrCreate(
                    ['payment_bill_id' => $bill_id],
                    ['buyer_confirm' => 1]
                );
            }
            elseif($request->has('disapprove')){
                Contract::updateOrCreate(
                    ['payment_bill_id' => $bill_id],
                    ['buyer_confirm' => 0, 'buyer_undoReason' => $request->input('buyer_undoReason') ]
                );
            }
        }
        elseif($is_seller){
            Contract::updateOrCreate(
                ['payment_bill_id' => $bill_id],
                ['seller_confirm' => 1]
            );
        }
        $to_complete = Contract::where('payment_bill_id', $bill_id)
                                ->where('buyer_confirm', '<>', null)
                                ->where('seller_confirm', '<>', null)
                                ->first();
        if($to_complete){
            $bill = Payment_Bill::find($bill_id);
            Auction::whereId($bill->bid->auction->id)->update(['status' => '5']);

            $confirmed_both = Contract::where(
                [
                    'payment_bill_id' => $bill_id, 
                    'buyer_confirm' => '1', 
                    'seller_confirm' => '1'
                ])->first();

            if($confirmed_both){
                $this->sendToSeller(User::first(), $bill);
            }
            else{
                $this->buyerPenalty(User::first(), $bill);
            }
        }
        return redirect()->back();
    }

    public function sendToSeller($admin, $bill){
        $auction = $bill->bid->auction;
        $seller = $auction->user;
        $money = $bill->bid->currentPrice;
        $commission = $money/10;
        $auction_id = $auction->id;
        $this->siteDeduction($auction_id, $commission);
        $seller_dues = $money-($commission);
        $admin->transfer($seller, $seller_dues, ['sell' => $bill->id]);
    }

    public function buyerPenalty($admin, $bill){
        $auction = $bill->bid->auction;
        $auctioneer = $auction->user;
        $bidder = $bill->bid->user;
        $money = $bill->bid->currentPrice;
        $commission = $money/10;
        $money_left = $money - (2 * $commission);
        $auction_id = $auction->id;
        $this->siteDeduction($auction_id, $commission); // مستحقات الموقع
        $admin->transfer($auctioneer, $commission);   // تسليم البائع نسبة من المزاد
        $admin->transfer($bidder, $money_left);  
        // تسليم باقي المبلغ إلى المزايد بعد الخصم منه النسبة للموقع
        //ونفس النسبة لصاحب المزاد
    }

    public function siteDeduction($auction_id, $commission){
        Auction::whereId($auction_id)->update(['commission' => $commission]);
    }
}
