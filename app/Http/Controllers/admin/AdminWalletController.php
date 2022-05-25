<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWalletController extends Controller
{
    public function index(){
        $user = User::first();
        $balance = DB::table('wallets')->where('holder_id', $user)->first()->balance;
        $billPaper = null;

        //To list out different financial operation
        $trans = Transaction::where('wallet_id', $user)->get();
        
        $loses = Transaction::where('wallet_id', $user)
                ->where('type', 'withdraw')->get()->sum('amount');

        if($bill_id) 
            $billPaper = Payment_Bill::whereId($bill_id)->first();
        
        return view('Admin.wallet.wallet')->with([
            'balance' => $balance, 
            'loses' => abs($loses),
            'gains' => $gains,
            'operations'  => $trans,  
            'billPaper'  => $billPaper,       
        ]);
    }
}
