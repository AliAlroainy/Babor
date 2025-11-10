<?php

namespace App\Http\Controllers\user;

use App\Models\Bid;
use App\Models\Payment_Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Support\Facades\Auth;
class WalletController extends Controller
{
    public function index($bill_id=null){
        $user       = Auth::id();
        $billPaper  = null;
        $walletData = DB::table('wallets')->where('holder_id', $user)->first();
        $walletId   = $walletData?->id;
        $balance    = $walletData?->balance ?? 0;

        $operations = $walletId
            ? Transaction::where('wallet_id', $walletId)->get()
            : collect();

        $withdrawSum = $walletId
            ? Transaction::where(['wallet_id' => $walletId, 'type' => 'withdraw'])->sum('amount')
            : 0;

        $depositSum = $walletId
            ? Transaction::where(['wallet_id' => $walletId, 'type' => 'deposit'])->sum('amount')
            : 0;

        if ($bill_id) {
            $billPaper = Payment_Bill::whereId($bill_id)->first();
        }

        return view('Front.User.wallet')->with([
            'balance'    => $balance,
            'loses'      => abs((float) $withdrawSum),
            'gains'      => (float) $depositSum,
            'operations' => $operations,
            'billPaper'  => $billPaper,
        ]);
    }
}
