<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Profile;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProfileRequest;

class ProfilesController extends Controller
{
    use ImageTrait;
    public function index(){
        $userProfile = Profile::where('user_id', Auth::user()->id)->first();
        if(!$userProfile){
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->username = Auth::user()->name;
            $profile->save();
        }
        $user = User::find(Auth::user()->id);
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
        $current_user_id = Auth::user()->id;
        $this->avatar_remove($current_user_id);  //remove prevoius avatar from server
        $filename = $this->saveImage($request->avatar, 'images/profiles');
        Profile::where('user_id', $current_user_id)->update(['avatar' => $filename]);
        return redirect()->route('user.profile')
            ->with('success','avatar profile updated successfully');
    }
    public function avatar_remove($current_user_id = null){
        $user_avatar = Profile::where('user_id', $current_user_id)->first()->avatar;
        File::delete(public_path("images/profiles/{$user_avatar}"));
        return redirect()->route('user.profile');
    }
}
