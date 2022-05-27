<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    //
    public function getEmail()
  {

     return view('user.email.forgetPassword');
  }

    public function postEmail(Request $request)
  {
    $request->validate([
        'email' => 'required|email|exists:users',
    ]);

    $token = Str::random(64);

      DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('user.email.verify', ['token' => $token], function($message) use($request){
          $message->to($request->email,$request->name);
          $message->subject('استعاده كلمه المرور');
          $message->from('baborproject2022@gmail.com','بابور');
      });


      return redirect('forget-password')->with('message', 'تم ارسال رابط استعاده كلمه المرور الي ايميلك ،يرجى تفقده!');


  }
}
