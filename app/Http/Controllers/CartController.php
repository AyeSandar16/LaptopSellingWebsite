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

class CartController extends Controller
{
    protected $product=null;
    public function __construct(Product $product){
        $this->product=$product;
    }

    public function index()
    {
        $carts = Helper::getAllProductFromCart();
        return view('frontend.pages.cart', [
            'carts' => $carts,
        ]);
    }
    public function addToCart(Request $request) {
        // Check if product ID is provided
        if (empty($request->id)) {
            request()->session()->flash('error', 'Invalid Product');
            return back();
        }
        // $product = Product::where('id', $request->id)->first();
        $product = Product::find($request->id);
        // if (empty($product)) {

        //     return back()->with('error', 'Product not found');
        // }

        // Calculate the price after applying discount
        $price = $product->price - ($product->price * $product->discount / 100);

        // Check if the product is out of stock
        if ($product->stock <= 0) {
            return back()->with('error', 'Product is out of stock');
        }

        // Check if the requested quantity exceeds the available stock
        $requestedQuantity = 1; // You might want to change this based on your form input
        if ($product->stock < $requestedQuantity) {
            return back()->with('error', 'Insufficient stock');
        }


        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $product->id;
        $cart->price = $price;
        $cart->quantity = $requestedQuantity;
        $cart->amount = $price * $requestedQuantity;
        DB::transaction(function () use ($cart, $product, $requestedQuantity) {
            $cart->save();
            $product->stock -= $requestedQuantity;
            $product->save();
            $wishlistItem = Wishlist::where('user_id', auth()->user()->id)
            ->where('product_id', $product->id)
            ->where('cart_id', null)
            ->first();
            if ($wishlistItem) {
                $wishlistItem->cart_id = $cart->id;
                $wishlistItem->save();
            }
        });
        return back()->with('success', 'Product successfully added to cart');


        // request()->session()->flash('success','Product successfully added to cart');
        // return back();
    }



    public function cartCount()
    {
        $userId = Auth::id();
        $cartCount = Cart::where('user_id', $userId)->count();

        return view('frontend.home', compact('cartCount'));
    }

    public function cartDelete(Request $request){
        // Find the cart item
        $cart = Cart::find($request->id);

        if ($cart) {
            // Retrieve the product associated with the cart item
            $product = $cart->product;

            if ($product) {
                // Increase the stock count of the product
                $product->stock += 1; // Assuming you increase stock by 1 when an item is removed
                $product->save();
            }

            // Delete the cart item
            $cart->delete();

            // Flash success message
            request()->session()->flash('success','Item removed from cart and stock updated.');

            // Redirect back to the previous page
            return back();
        }

        // If cart item not found, flash error message
        request()->session()->flash('error','Error: Cart item not found.');

        // Redirect back to the previous page
        return back();
    }


    public function cartUpdate(Request $request){
        // Uncomment to debug and check the request data
        // dd($request->all());

        if($request->quant){
            $error = array();
            $success = '';

            foreach ($request->quant as $k => $quant) {
                $id = $request->qty_id[$k];
                $cart = Cart::find($id);

                if($quant > 0 && $cart) {
                    if($cart->product->stock < $quant){
                        request()->session()->flash('error','Out of stock');
                        return back();
                    }

                    $cart->quantity = ($cart->product->stock >= $quant) ? $quant : $cart->product->stock;

                    $after_price = ($cart->product->price - ($cart->product->price * $cart->product->discount) / 100);
                    $cart->amount = $after_price * $quant;

                    $cart->save();
                    $success = 'Cart successfully updated!';
                } else {
                    $error[] = 'Cart Invalid!';
                }
            }

            return back()->with($error)->with('success', $success);
        } else {
            return back()->with('Cart Invalid!');
        }
    }
    public function checkout(Request $request){
        return view('frontend.pages.checkout');
    }

    public function show()
    {

    }
    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(string $id)
    {

    }

    public function update(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {

    }
}
