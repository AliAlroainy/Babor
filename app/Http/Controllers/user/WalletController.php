<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    public function balance (){
        $wallet = DB::table('wallets')->where('holder_id', Auth::id());
    }
}
