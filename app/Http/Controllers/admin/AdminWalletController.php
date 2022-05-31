<?php

namespace App\Http\Controllers\admin;

use App\Models\Bid;
use App\Models\User;
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

        $bidding_money = Transaction::where('wallet_id', $user)
        ->where(function($q) use ($bids){
            $q->whereBetween('meta->bid', [1, $bids->count()])
              ->orwhereBetween('meta->unbid', [1, $bids->count()]);
        })
        ->get()->sum('amount');

        return view('Admin.wallet.wallet')->with([
            'balance' => $balance, 
            'bidding_money' => abs($bidding_money),
            'gains' => $gains,
            'operations'  => $trans,        
        ]);
    }
}
