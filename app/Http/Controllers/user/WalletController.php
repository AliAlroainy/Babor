<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(){
        $user = Auth::id();
        $wallet = DB::table('wallets')->where('holder_id', $user)->first();
        $bid = Bid::where('bidder_id', $user)->with('payment_bill')->get();
        // dd($wallet);
        return view('Front.User.wallet')->with('wallet', $wallet);
    }
}
