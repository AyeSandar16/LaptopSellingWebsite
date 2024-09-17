<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Setting;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\User;


class AuthController extends Controller
{
public function index(){
    return view('admindash.index');
}
    public function registration(){
        return view('auth.registration');
    }
    public function login(){
        return view('auth.login');
    }

public function authenticate(Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $request->session()->regenerate();
        if ($user->role == 'user') {
            $carts=Cart::all();
            $products = Product::all();
            $wishlists = Wishlist::all();
            $users = User::all();
            return view('frontend.home', [
                'products' => $products,
                'carts'=>$carts,
                'wishlists'=>$wishlists,
                'users' => $users,
            ]);

        }
        else if ($user->role == 'admin') {
            $categories = Category::all();
            $brands = Brand::all();
            $users = User::all();
            $products = Product::all();
            $banners = Banner::all();
            $settings = Setting::all();

            return view('admindash.index', [
                'categories' => $categories,
                'brands' => $brands,
                'users' => $users,
                'products' => $products,
                'banners' => $banners,
                'settings'=>$settings
            ]);
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput($request->only('email'));
}

public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}


public function profile(){
    $profile=Auth()->user();
    // return view('users.profile')->with('profile',$profile);
    return view('users.profile' , compact('profile'));

}

public function profileUpdate(Request $request,$id){
    // return $request->all();
    $user=User::findOrFail($id);
    $data=$request->all();
    $status=$user->fill($data)->save();
    if($status){
        request()->session()->flash('success','Successfully updated your profile');
    }
    else{
        request()->session()->flash('error','Please try again!');
    }
    return redirect()->back();
}

public function changePassword(){
    return view('admindash.changePassword');
}
public function changPasswordStore(Request $request)
{
    $request->validate([
        'current_password' => ['required', new MatchOldPassword],
        'new_password' => ['required'],
        'new_confirm_password' => ['same:new_password'],
    ]);

    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

    return redirect()->route('user')->with('success','Password successfully changed');
}

public function settings(){
    $data=Setting::first();
    return view('admindash.setting')->with('data',$data);
}

public function settingsUpdate(Request $request){

    $request->validate([
        'email'=>'required|email',
        'phone'=>'required|string',
        'facebook'=>'required',
        'youtube'=>'required',
        'instagram'=>'required',
        'twitter'=>'required',


    ]);
    $data=$request->all();
    $settings=Setting::first();
    $status=$settings->fill($data)->save();
    if($status){
        request()->session()->flash('success','Setting successfully updated');
    }
    else{
        request()->session()->flash('error','Please try again');
    }
    return redirect()->back();
}

}
