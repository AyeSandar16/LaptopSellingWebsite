<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','order_number','quantity','status','total_amount','first_name','last_name','address','phone','email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cart_info(){
        return $this->hasMany('App\Models\Cart','order_id','id');
    }
    public static function getAllOrder($id){
        return Order::with('cart_info')->find($id);
    }

    public static function countAllOrders(){
        $data = Order::count(); // Using Eloquent ORM
        return $data;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'order_id');
    // }

    public function cart(){
        return $this->hasMany(Cart::class);
    }
    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'user_id');
    // }


}
