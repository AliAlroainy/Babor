<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
    public function index()
    {
        $route = \Request::route()->getName();
        $user = User::with('profile')->get();
        return view('admin.accounts.users', ['users' => $user, 'route' => $route ]);
    }

    public function destroy($user_id)
    {
        $user = Series::find($user_id);
        $user->is_active *= -1;
        if($user->save())
            return back();
    }  
}
