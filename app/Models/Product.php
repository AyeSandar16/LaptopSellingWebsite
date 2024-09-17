<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public function categories():BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
    public function products(){
        return $this->hasMany('App\Models\Product','id')->orderBy('id','DESC');
    }
    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function wishlists(){
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public static function countAllProducts(){
        $data = Product::count(); // Using Eloquent ORM
        return $data;
    }
    public static function getProductById($id){
        return Product::where('id',$id)->first();
    }
  // In the Product model or Order model, ensure the correct table name is used
public function orders()
{
    return $this->belongsToMany(Order::class, 'order_product')
                ->withPivot('quantity', 'price')
                ->withTimestamps();
}


// public function order()
// {
//     return $this->belongsTo(Order::class, 'order_id');
// }
}
