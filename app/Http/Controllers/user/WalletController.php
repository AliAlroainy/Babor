<?php

namespace App\Http\Controllers\user;

use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(){
        $user = Auth::id();
        $wallet = DB::table('wallets')->where('holder_id', $user)->first();

        //to compute losses
        $trans = Transaction::select('*', DB::raw('JSON_EXTRACT(`meta`, "$.bid")'))->where(['wallet_id' => $user, 'type' => 'withdraw',])->get();
        $looses = $trans->sum('amount');
        // return response($trans);
        // $x = json_decode($trans, TRUE);
        // $phones = array_column($x, 'bid');
        // return response($phones);
        // // dd(collect($trans));
        if(isset($trans)){
            foreach ($trans as $tran)
                $bids[] = $tran->meta['bid'];
            $bids = Bid::whereIn('id', $bids)->where('bidder_id', $user)->get();
        }
        // dd($bids);
        return view('Front.User.wallet')->with([
            'wallet' => $wallet, 
            'looses' => $looses,
            'bids'  => $bids,
            
        ]);
    }
}
