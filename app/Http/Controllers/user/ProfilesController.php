<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Validator;

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

    public function info_save(ProfileRequest $request){ 
        $current_user_id = Auth::user()->id;
        User::where('id', $current_user_id)->update(['name' => $request->input('name')]);

        Profile::where('user_id', $current_user_id)->update(
            [
                'username' => $request->input('name'),
                'phone'    =>  $request->input('phone'),
                'address'  =>  $request->input('address'),
            ]
        );
        return redirect()->route('user.profile')
            ->with('success','profile updated successfully');
    }
    public function avatar_change(ProfileRequest $request){ 
        $user->update(['id' => Auth::user()->id], [$request->except(['_token'])]);
        Profile::updateOrCreate(['user_id' => Auth::user()->id], [$request->except(['_token'])]);
        return redirect()->route('user.profile')
            ->with('success','profile updated successfully');
    }
}
