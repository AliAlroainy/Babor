<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{

    public function showAdminDash(){
        return view('admin.dashboard');

    }
    public function showhome(){
        return view('user.home');

    }
    public function showUserDash(){
        return view('user.profile');
    }
    public function singup(){
        return view('user.singup');
    }
    public function register(Request $request){
        Validator::validate($request->all(),[
            'name'=>['required','min:3','max:10'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','min:5'],
            'confirm_pass'=>['same:password']


        ],[
            'name.required'=>'this field name is required',
            'name.min'=>' name can not be less than 3 letters',
            'email.unique'=>'there is an email in the table',
            'email.required'=>'this field email is required',
            'email.email'=>'incorrect email format',
            'password.required'=>'password is required',
            'password.min'=>'password should not be less than 3',
            'confirm_pass.same'=>'password dont match',


        ]);

        $u=new User();
        $u->name=$request->name;
        $u->password=Hash::make($request->password);
        $u->email=$request->email;

        $token=Str::uuid();
        $u->remember_token=$token;
        if($u->save()){
            $u->attachRole('Admin');
            $sendToName = $request->name;
            $sendToeEmail = $request->email;
            $data = array('name'=>$request->name, 'activation_url'=>URL::to('/')."/verify_account/".$token);

        Mail::send('user.email.welcome', $data, function($message) use ($sendToName, $sendToeEmail) {
            $message->to($sendToeEmail,  $sendToName)
                    ->subject('تسجيل عضوية جديدة');
            $message->from('baborproject2022@gmail.com','بابور');
        });
            return redirect()->route('login')
            ->with(['success'=>'user created successful']);
        }

        return back()->with(['error'=>'can not create user']);

    }
    public function verifyAccount($token){
        $user=User::where('remember_token',$token)->first();
        if($user){
        $user->email_verified_at=Carbon::now()->timestamp;
        $user->save();
        Auth::login($user);
        return redirect()->route('home');
        }
        else
        echo "invalid token";
    }
    public function showLogin(){
        if(Auth::check())//redirect user to dashboard if he change the router to login and he still in dashboard
        return redirect()->route($this->checkRole());
        else
        return view('user.login');

    }
    public function checkRole(){
        if(Auth::user()->hasRole('Admin'))
        return 'adminDash';
            else
            return 'home';

    }
    public function login(Request $request){
        Validator::validate($request->all(),[
            'email'=>['email','required'],
            'password'=>['required']
        ],[
            'email.required'=>'this field email is required',
            'email.min'=>'email can not be less than 3 letters',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))//if he login and has admin role and he is active=1 redirct him to dashboard route
                return redirect()->route('adminDash');
            else
                return redirect()->route('userDash');
        }
        else {
            return redirect()->route('login')->with(['message'=>'incorerct username or password or your account is not active ']);
        }

    }
    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }
    public function changePasswordUser(){
        return view('user.email.change-password');
    }
    public function changePasswordAdmin(){
        return view('admin.change-password');
    }
    public function updatePassword(Request $request){
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }
}


