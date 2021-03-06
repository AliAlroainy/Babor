<?php

namespace App\Http\Controllers\user;

use App\Models\Bid;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class WalletController extends Controller
{
    public function index($bill_id=null){
        $user = Auth::id();
        $balance = DB::table('wallets')->where('holder_id', $user)->first()->balance;
        $billPaper = null;
        //To list out different financial operation
        $trans = Transaction::where('wallet_id', $user)->get();
        
        $loses = Transaction::where(['wallet_id' => $user, 'type' => 'withdraw'])->get()->sum('amount');
        $gains = Transaction::where(['wallet_id' => $user, 'type' => 'deposit'])->get()->sum('amount');

        if($bill_id) 
            $billPaper = Payment_Bill::whereId($bill_id)->first();
        
        return view('Front.User.wallet')->with([
            'balance' => $balance, 
            'loses' => abs($loses),
            'gains' => $gains,
            'operations'  => $trans,  
            'billPaper'  => $billPaper,       
        ]);
    }
}
