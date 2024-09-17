<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Notification;
use App\Models\Helper;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $orders=Order::orderBy('id','DESC')->paginate(10);
    //     return view('orders.index')->with('orders',$orders);

    // }
    // public function showOrderDetails()
    // {
    //     // Fetch the order with related cart items and their products
    //     $order = Order::with(['cartItems.product'])->find($id);

    //     // Check if the order exists
    //     if (!$order) {
    //         return back()->with('error', 'Order not found.');
    //     }

    //     // Prepare data for view
    //     $products = $order->cartItems->map(function ($cartItem) {
    //         return [
    //             'product_name' => $cartItem->product->name,
    //             'amount' => $cartItem->amount,
    //             'quantity' => $cartItem->quantity,
    //             'price' => $cartItem->price,
    //         ];
    //     });

    //     return view('countOrder.index', [
    //         'order' => $order,
    //         'products' => $products,
    //     ]);
    // }


// app/Http/Controllers/OrderController.php
public function index()
{
    // Fetch all orders with associated products
    $orders = Order::with('products')->get();

    return view('orders.index', [
        'orders' => $orders,
    ]);
}









    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'address' => 'string|nullable',
            'phone' => 'numeric|required',
            'email' => 'string|required'
        ]);

        // Begin database transaction
        DB::beginTransaction();

        // try {
            // Ensure the cart is not empty
            $cartItems = Cart::where('user_id', auth()->user()->id)
                        ->where('order_id', null)
                        ->get();

            if ($cartItems->isEmpty()) {
                return back()->with('error', 'Cart is Empty!');
            }

            // Create the order
            $order = new Order();
            $order->order_number = 'ORD-' . strtoupper(Str::random(10));
            $order->user_id = $request->user()->id;
            $order->quantity = Helper::cartCount();
            $order->total_amount = Helper::totalCartPrice();
            $order->fill($request->all());
            $order->save();

            Cart::where('user_id', auth()->user()->id)
                ->where('order_id', null)
                ->update(['order_id' => $order->id]);

            Cart::where('user_id', auth()->user()->id)
                ->where('order_id', $order->id)
                ->delete();

            DB::commit();

            session(['cart_count' => Helper::cartCount()]);
            return back()->with('success', 'Your order has been successfully placed.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $order=Order::find($id);
    //     // return $order;
    //     return view('orders.show')->with('order',$order);
    // }
    // app/Http/Controllers/OrderController.php
public function show($id)
{
    // Fetch the specific order with associated products
    $order = Order::with('products')->findOrFail($id);

    return view('orders.show', [
        'order' => $order,
    ]);
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        return view('orders.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order=Order::find($id);
        $request->validate([
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();
        // return $request->status;
        if($request->status=='delivered'){
            foreach($order->cart as $cart){
                $product=$cart->product;
                // return $product;
                $product->stock -=$cart->quantity;
                $product->save();
            }
        }
        $status=$order->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated order');
        }
        else{
            request()->session()->flash('error','Error while updating order');
        }
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        if($order){
            $status=$order->delete();
            if($status){
                request()->session()->flash('success','Order Successfully deleted');
            }
            else{
                request()->session()->flash('error','Order can not deleted');
            }
            return redirect()->route('orders.index');
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }


}
