<?php

namespace App\Http\Controllers\admin;

use App\Models\Bid;
use App\Models\User;
use App\Models\Contract;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Bavix\Wallet\Models\Transaction;

class AdminWalletController extends Controller
{
    public function index(){
        $user = User::first()->id;
        $balance = DB::table('wallets')->where('holder_id', $user)->first()->balance;

        //To list out different financial operation
        $trans = Transaction::get();
        $bills = Payment_Bill::select('id')->where('payment_status', 1)->get();
        $bids =  Bid::select('id')->get();
        $gains = Transaction::where('wallet_id', $user)
                ->where(function($q) use ($bills){
                    $q ->where('type', 'deposit')->whereIn('meta->commission', $bills);
                })
                ->orWhere(function($q) use ($bills){
                    $q->where('type', 'deposit')->whereIn('meta->penalty-commission', $bills);
                })
                ->get()->sum('amount');

        $bidding_money = Bid::where('refund', '0')->get()->sum('bidPrice')/10.0;
   
        $uncomplete_auction = Bid::with(['auction' => function($q){
            $q->where('status', '4')->get();
        }])->with(['payment_bill' => function($q){
            $q->where('payment_status', 1);
        }])->whereHas('payment_bill')->get();

     
        foreach(range(0, $uncomplete_auction->count()-1 ) as $i) {
            if(isset($uncomplete_auction[$i]) && $uncomplete_auction[$i]->auction !== null && $uncomplete_auction[$i]->payment_bill !== null)
                $uncomplete_bill[] = $uncomplete_auction[$i]->payment_bill->id;
        }
        $auction_money = 0;
        if(isset($uncomplete_bill))
            $auction_money = Transaction::where('wallet_id', $user)
            ->where(function($q) use ($uncomplete_bill){
                $q->whereIn('meta->buy', $uncomplete_bill);
            })->get()->sum('amount');

        return view('Admin.wallet.wallet')->with([
            'balance' => $balance, 
            'bidding_money' => abs($bidding_money),
            'auction_money' => abs($auction_money),
            'gains' => $gains,
            'operations'  => $trans,        
        ]);
    }
}
