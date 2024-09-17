<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Helper extends Model
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    }
    public static function getAllCategory(){
        $category=new Category();
        $menu=$category->getAllParentWithChild();
        return $menu;
    }
    public static function getAllBrand(){
        $brand=new Brand();
        $menu=$brand->getAllParentWithChild();
        return $menu;
    }

    public static function getHeaderCategory()
    {
        $categories = Category::with('products')->get();

        if($categories->count() > 0){
            ?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories <i class="ti-angle-down"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php foreach($categories as $category): ?>
                        <?php if ($category->id): ?>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="<?php echo route('product-cat', ['id'=>$category->id]); ?>"><?php echo $category->name; ?></a>
                            </li>
                        <?php else: ?>
                            <!-- Handle case where category ID is missing or invalid -->
                            <li class="dropdown-submenu">
                                <span class="dropdown-item">Invalid Category</span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>


                </ul>
            </li>

            <?php
            }
    }

    public static function getHeaderBrand() {
            $brands = Brand::with('products')->get();

            if($brands->count() > 0){
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Brands <i class="ti-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach($brands as $brand): ?>
                        <?php if ($brand->id): ?>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="<?php echo route('product-cat', ['id'=>$brand->id]); ?>"><?php echo $brand->name; ?></a>
                            </li>
                        <?php else: ?>
                            <!-- Handle case where category ID is missing or invalid -->
                            <li class="dropdown-submenu">
                                <span class="dropdown-item">Invalid Brand</span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </ul>
                </li>

                <?php
                }
    }


    public static function productCategoryList($option='all'){
        if($option='all'){
            return Category::orderBy('id','DESC')->get();
        }
        return Category::has('products')->orderBy('id','DESC')->get();
    }



    public static function postCategoryList($option="all"){
        if($option='all'){
            return PostCategory::orderBy('id','DESC')->get();
        }
        return PostCategory::has('posts')->orderBy('id','DESC')->get();
    }
    // Cart Count
    public static function cartCount($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->sum('quantity');
        }
        else{
            return 0;
        }
    }
    // relationship cart with product
    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
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
    public static function getAllProductFromOrder($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Order::with('product')->where('user_id',$user_id)->get();
        }
        else{
            return 0;
        }
    }
    // Total amount cart
    public static function totalCartPrice($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->where('order_id',null)->sum('amount');
        }
        else{
            return 0;
        }
    }
    // Wishlist Count
    public static function wishlistCount($user_id=''){

        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('quantity');
        }
        else{
            return 0;
        }
    }
    public static function getAllProductFromWishlist($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Wishlist::with('product')->where('user_id',$user_id)->where('cart_id',null)->get();
        }
        else{
            return 0;
        }
    }



}

