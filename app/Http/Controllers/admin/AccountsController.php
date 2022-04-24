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
        return view('admin.accounts.users', [
            'users' => User::with(['profile'])->get(),
            'route' => $route
        ]);
    }
}
