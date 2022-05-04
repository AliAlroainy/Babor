<?php

namespace App\Http\Controllers\Authentication;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Auth\CanResetPassword;

class AuthController extends Controller
{

    public function showAdminDash(){
        return view('admin.dashboard');

    }
    public function register(RegisterRequest $request){

        $u=new User();
        $u->name=$request->name;
        $u->password=Hash::make($request->password);
        $u->email=$request->email;

        // $token=Str::uuid();
        $token = Str::random(64);
        $u->remember_token=$token;
        if($u->save()){
            $u->attachRole('user');
            $sendToName = $request->name;
            $sendToeEmail = $request->email;
            $data = array('name'=>$request->name, 'activation_url'=>URL::to('/')."/verify_account/".$token);

            Mail::send('user.email.welcome', $data, function($message) use ($sendToName, $sendToeEmail) {
                $message->to($sendToeEmail,  $sendToName)
                        ->subject('تسجيل عضوية جديدة');
                $message->from('baborproject2022@gmail.com','بابور');
            });
            // if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            //     if(Auth::user()->hasRole('user') )
            //     return redirect()->route('user.dashboard')->with(
            //         [
            //             'Emailverfication' => 'يرجى تاكيد حسابك    ',
            //         'tab' => 'profile',
            //     ]);
           
            return redirect()->route('login');

        }

        return back()->with(['errRegistration'=>'فشل في عملية إنشاء الحساب']);

    }
    public function verifyAccount($token){
        $user=User::where('remember_token',$token)->first();
        if($user){
            $user->email_verified_at=Carbon::now()->timestamp;
            $user->save();
            Auth::login($user);
            return redirect()->route('user.dashboard')->with(
                [
                    'successRegistration' => 'تم تاكيد حسابك بنجاح',
                'tab' => 'profile',
            ]);
        }
        else
        return view('user.email.invalidToken');
    }
    public function showLogin(){
        if(Auth::check())//redirect user to dashboard if he change the router to login and he still in dashboard
            return redirect()->route($this->checkRole());
        else
            return view('auth.login');
    }
    public function checkRole(){
        if(Auth::user()->hasRole('admin'))
            return 'admin.dashboard';
        else
            return 'user.dashboard';

    }
    public function login(LoginRequest $request){

        // $user=User::where(['email'=>$request->email])->first();
        // if($user->hasRole('user') && empty($user->email_verified_at))
        //     return view('user.email.verifyEmail');
        // else
        $remember = $request->has('remember_me') ? true : false;
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_active' => 1], $remember)){
            if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))//if he login and has admin role and he is active=1 redirct him to dashboard route
                return redirect()->route('admin.dashboard');
            else
            if (!Auth::user()->email_verified_at) {

                 return redirect()->route('user.dashboard')->with(
                     [
                         'Emailverfication' => 'يرجى تاكيد حسابك    ',
                     'tab' => 'profile',
                 ]);
                     }
                return redirect()->route('user.dashboard')->with(
                    [
                        'successRegistration' => ' اهلا بعودتك مره اخرى     ',
                    'tab' => 'profile',
                ]);
        }
        else {
            return redirect()->route('login')->with(['errLogin'=>'يرحى التأكد من الإيميل أو كلمة السر، أو قم بتفعيل حساب']);
        }
    }
    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }
    // public function changePasswordUser(){
    //     return view('user.email.change-password');
    // }
    public function changePasswordAdmin(){
        return view('admin.change-password');
    }
    public function updatePassword(ChangePasswordRequest $request){
        #Match The Old Password
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return redirect()->route('change-password-user')->with("errMatch", "كلمة السر القديمة غير صحيحة");
        }
        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->route('change-password-user')->with("successChangePSW", "تم تغيير كلمة السر بنجاح")->with('tab', 'psw');
    }
}


