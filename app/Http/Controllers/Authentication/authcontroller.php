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
use Illuminate\Contracts\Auth\CanResetPassword;

class AuthController extends Controller
{

    public function showAdminDash(){
        return view('admin.dashboard');

    }
    public function register(Request $request){
        Validator::validate($request->all(),[
            'name'=>['required','min:3'],
            'email'=>['required','email','unique:users,email'],
            'password' => 'required|string|min:6|confirmed',
            'confirm_password'=> 'required|same:password'
        ],[
            'name.required'=>'الرجاء ادخال الاسم',
            'name.min'=>'يجب الايقل عدد احرف الاسم عن 3 احرف',
            'email.unique'=>'هذا البريد موجود مسبقا',
            'email.required'=>'الرجاءادخال عنوان البريد الالكتروني',
            'email.email'=>'الرجاءادخال عنوان بريد صالح',
            'password.required'=>'الرجاءادخال كلمة السر',
            'password.min'=> 'يجب الايقل عدد احرف كلمة السر عن 3 احرف',
            'confirm_pass.same'=>'كلمة المرور لا تتطابق',
        ]);

        $u=new User();
        $u->name=$request->name;
        $u->password=Hash::make($request->password);
        $u->email=$request->email;

        $token=Str::uuid();
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
            return redirect()->route('login')
            ->with(['emailVerification'=>'يرجى تأكيد إيميلك']);
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
                    'successRegistration' => 'تم إنشاء حسابك بنجاح',
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
    public function login(Request $request){
        Validator::validate($request->all(),[
            'email'=> 'email|required',
            'password'=> 'required'
        ],[
            'email.required'=>'يرجى كتابة الإيميل',
        ]);
        $user=User::where(['email'=>$request->email])->first();
        if (empty($user->email_verified_at))
        return view('user.email.verifyEmail');
        else
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))//if he login and has admin role and he is active=1 redirct him to dashboard route
                return redirect()->route('admin.dashboard');
            else
                return redirect()->route('user.dashboard')->with('tab', 'profile');
        }
        else {
            return redirect()->route('login')->with(['errLogin'=>'يرحى التأكد من الإيميل أو كلمة السر، أو قم بتفعيل حساب']);
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
    public function updatePassword(ChangePasswordRequest $request){
        #Match The Old Password
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return redirect()->route('user.dashboard', 'psw')
            ->with("errMatch", "كلمة السر القديمة غير صحيحة")
            ->with('tab', 'psw');
        }
        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->back()->with("successChangePSW", "تم تغيير كلمة السر بنجاح")->with('tab', 'psw');;
    }
}


