<?php

namespace App\Http\Controllers\user;

use App\Models\Bid;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Profile;
use App\Trait\ImageTrait;
use App\Models\Payment_Bill;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Validator;

class ProfilesController extends Controller
{
    use ImageTrait;
    public function index(){

        $user = User::find(Auth::user()->id);
        return view('Front.User.settings', ['user' => $user]);
    }
    public function show(){
        $route = Route::current()->getName();
        $comments= ReviewRating::where('user_id',Auth::user()->id)->get();
        $total= ReviewRating::where('user_id',Auth::user()->id)->get()->count();
        $avg=round($total/5);

        $userProfile = Profile::where('user_id', Auth::user()->id)->first();
        $userWallet = Wallet::where('holder_id', Auth::user()->id)->first();

        // To compute number of purchase that current user carried out
        $countPurchases = Payment_Bill::where('payment_status', 1)
        ->with(['bid' => function($q){
            return $q->where('bidder_id', Auth::id());
        }])
        ->with(['contract' => function($q){
            return $q->where(['seller_confirm' => 1, 'buyer_confirm' => 1])->get();
        }])->get();

        $countPurchases = $countPurchases->where('bid', '<>', null)->where('contract', '<>', null)->count();

        // To compute number of sales that current user carried out
        $countSales = Payment_Bill::where('payment_status', 1)
        ->with('bid.auction', function($q){
            return $q->where('auctioneer_id', Auth::id());
        })
        ->with('contract', function($q){
                return $q->where(['seller_confirm' => 1, 'buyer_confirm' => 1]);
        })
        ->get();
        $countSales = $countSales->where('auction', '<>', null)->where('contract', '<>', null)->count();
       
        //! Create profile and charge user wallet with money once being registered
        if(!$userProfile){
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        if(!$userWallet){
            $user = User::find(Auth::user()->id);
            $user->deposit(100000000);
        }
        $user = Auth::user();
        return view('Front.User.profile')->with([
            'route'          => $route,
            'user'           => $user,
            'total'          => $avg,
            'comments'       => $comments,
            'countPurchases' => $countPurchases, 
            'countSales'     => $countSales,
        ]);
    }

    public function visit($id){
        $route = Route::current()->getName();
        $comments= ReviewRating::where('user_id',$id)->get();
        
        // To compute number of purchase that current user carried out
        $countPurchases = Payment_Bill::where('payment_status', 1)
        ->with(['bid' => function($q) use ($id){
            return $q->where('bidder_id', $id);
        }])
        ->with(['contract' => function($q) use ($id){
            return $q->where(['seller_confirm' => 1, 'buyer_confirm' => 1])->get();
        }])->get();

        $countPurchases = $countPurchases->where('bid', '<>', null)->where('contract', '<>', null)->count();

        // To compute number of sales that current user carried out
        $countSales = Payment_Bill::where('payment_status', 1)
        ->with('bid.auction', function($q) use ($id){
            return $q->where('auctioneer_id', $id);
        })
        ->with('contract', function($q){
                return $q->where(['seller_confirm' => 1, 'buyer_confirm' => 1]);
        })
        ->get();
        $countSales = $countSales->where('auction', '<>', null)->where('contract', '<>', null)->count();
        
        $total= ReviewRating::where('user_id',$id)->get()->count();
        $avg=round($total/5);
        $user = User::whereId($id)->with('profile')->first();
        return view('Front.profile')->with([
            'route'          => $route,
            'user'           => $user,
            'total'          => $avg,
            'comments'       => $comments,
            'countPurchases' => $countPurchases, 
            'countSales'     => $countSales,
    ]);
    }

    public function info_save(ProfileRequest $request){
        $current_user_id = Auth::user()->id;
        User::where('id', $current_user_id)->update(['name' => $request->input('name')]);

        Profile::where('user_id', $current_user_id)->update(
            [
                'username' =>  $request->input('username'),
                'phone'    =>  $request->input('phone'),
                'job'      =>  $request->input('job'),
                'city'     =>  $request->input('city'),
                'address'  =>  $request->input('address'),
                'bio'      =>  $request->input('bio'),
            ]
        );
        return redirect()->route('user.dashboard')
            ->with('successEdit','تم التعديل بنجاح')
            ->with(['tab' => 'profile']);
    }
    public function avatar_change(Request $request){
        Validator::validate($request->all(),
        ['avatar'   => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:100',],
        [
            'avatar.required'     => 'حقل الصورة مطلوب',
            'avatar.image'        => 'ارفع صورة من فضلك',
            'avatar.mimes'        => 'الامتدادات المسموح بها للصور هي: (jpg, png, jpeg, gif, svg)',
            'avatar.max'          => 'أعلى حجم للصورة مسموح به هو  100 كيلوبايت',
        ]);
        $current_user_id = Auth::user()->id;
        $this->avatar_remove($current_user_id);  //remove prevoius avatar from server
        $filename = $this->saveImage($request->avatar, 'images/profiles');
        Profile::where('user_id', $current_user_id)->update(['avatar' => $filename]);
        return redirect()->route('user.profile')
            ->with('successEdit','تم تعديل البروفايل بنجاح');
    }
    public function avatar_remove($current_user_id = null){
        $user_avatar = Profile::where('user_id', $current_user_id)->first()->avatar;
        File::delete(public_path("images/profiles/{$user_avatar}"));
        return redirect()->route('user.profile');
    }
}
