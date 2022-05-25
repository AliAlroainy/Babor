<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
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
        $trans = Transaction::where('wallet_id', $user)->get();
        
        $gains = Transaction::where('wallet_id', $user)
                ->where('type', 'withdraw')->get()->sum('amount');

        return view('Admin.wallet.wallet')->with([
            'balance' => $balance, 
            // 'loses' => abs($loses),
            'gains' => $gains,
            'operations'  => $trans,        
        ]);
    }
}
