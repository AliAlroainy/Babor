<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index(){
        $userProfile = Profile::where('user_id', Auth::user()->id)->first();
        if(!$userProfile){
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->username = Auth::user()->name;
            $profile->save();
        }
        $user = User::find(Auth::user()->id);
        if($user->hasRole('admin') || $user->hasRole('super_admin'))
            return view('admin.dashboard');
        else
            return view('user.profile', ['user' => $user]);
    }
}
