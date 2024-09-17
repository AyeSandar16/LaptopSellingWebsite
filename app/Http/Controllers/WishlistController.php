<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Helper;

class WishlistController extends Controller
{
    protected $product=null;
    public function __construct(Product $product){
        $this->product=$product;
    }
    public function index()
    {
        $wishlists = Helper::getAllProductFromWishlist();
        return view('frontend.pages.wishlist', [
            'wishlists' => $wishlists,
        ]);
    }
    public function wishlist(Request $request){
        if (empty($request->id)) {
            request()->session()->flash('error', 'Invalid Product');
            return back();
        }

        // Retrieve the product from the database
        $product = Product::find($request->id);

        // Check if the product exists
        if (empty($product)) {
            request()->session()->flash('error', 'Product not found');
            return back();
        }

        $already_wishlist = Wishlist::where('user_id', auth()->user()->id)->where('cart_id',null)->where('product_id', $product->id)->first();
        // return $already_wishlist;
        if($already_wishlist) {
            request()->session()->flash('error','You already placed in wishlist');
            return back();
        }else{

            $wishlist = new Wishlist;
            $wishlist->user_id = auth()->user()->id;
            $wishlist->product_id = $product->id;
            $wishlist->price = ($product->price-($product->price*$product->discount)/100);
            $wishlist->quantity = 1;
            $wishlist->amount=$wishlist->price*$wishlist->quantity;
            $wishlist->save();
        }

        $wishlist->save();

        return redirect()->route('home.index')->with('success', 'Product successfully added to wishlist');
    }
    public function wishlistCount()
    {
        $userId = Auth::id();
        $cartCount = Wishlist::where('user_id', $userId)->count();

        return view('frontend.home', compact('wishlistCount'));
    }
    public function wishlistDelete(Request $request){
        $wishlist = Wishlist::find($request->id);
        if ($wishlist) {
            $wishlist->delete();
            request()->session()->flash('success','Wishlist successfully removed');
            return back();
        }
        request()->session()->flash('error','Error please try again');
        return back();
    }

}
