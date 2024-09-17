<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\User;
use App\Models\Order;
use Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class HomeController extends Controller
{
   public function index(){
        return view('frontend.home');
    }
    public function dashboard(){
        return view('userdash.index');
    }
    function contact(){
        return view('contact');
    }
    function about(){
        return view('about');
    }
    function product(){
        return view('frontend.pages.product_page');
    }
    public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('userdash.profile')->with('profile',$profile);
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

    public function orderIndex()
    {
        // Fetch orders for the authenticated user
        $user = Auth::user(); // Retrieve authenticated user
        $orders = Order::where('user_id', $user->id)->paginate(10);

        return view('userdash.orderIndex', compact('orders'));
    }
    public function orderShow($id)
    {
        $order=Order::find($id);
        // return $order;
        return view('userdash.orderShow')->with('order',$order);
    }
    public function changePassword(){
        return view('userdash.userPasswordChange');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'new_confirm_password' => ['required','same:new_password'],
        ]);

        $status=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        if($status){
            return redirect()->route('user')->with('success','Password successfully changed');
        }

    }
}
