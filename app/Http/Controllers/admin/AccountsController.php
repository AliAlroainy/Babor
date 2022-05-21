<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
    public function index()
    {
        $user = User::with('profile')->get();
        return view('admin.accounts.users', ['users' => $user]);
    }

    // Block user
    public function destroy($user_id)
    {
        $user=User::find($user_id);
        if(!$user)
            return response()->view('Front.errors.404', []);  
        $user->is_active*=-1;
        if($user->save())
            return back();
    }  
}
