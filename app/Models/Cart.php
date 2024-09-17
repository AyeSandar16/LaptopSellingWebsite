<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['user_id','product_id','quantity','amount','price','status'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }


    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public static function getAllProductFromCart($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::with('product')->where('user_id',$user_id)->get();
        }
        else{
            return 0;
        }
    }

}
