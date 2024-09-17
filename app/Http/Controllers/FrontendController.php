<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Brand;
use App\User;
use Auth;
use Session;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function productDetail($id){
        $product_detail= Product::getProductById($id);
        // dd($product_detail);
        return view('frontend.pages.product_detail')->with('product_detail',$product_detail);
    }
    public function productCat($id){
        $products=Category::getProductByCat($id);
        // // return $request->slug;
        // $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

            return view('frontend.pages.product-lists')->with('products',$products->products);
    }
    public function productBrand($id){
        $products=Brand::getProductByBrand($id);
        // // return $request->slug;
        // $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

            return view('frontend.pages.product-lists')->with('products',$products->products);
    }

    public function productSearch(Request $request)
    {
        $searchTerm = $request->input('search');

        // Search products where any of the specified columns contain the search term
        $products = Product::where('model', 'like', '%' . $searchTerm . '%')
                            ->orWhere('display', 'like', '%' . $searchTerm . '%')
                            ->orWhere('price', 'like', '%' . $searchTerm . '%')
                            ->orWhere('memory', 'like', '%' . $searchTerm . '%')
                            ->orWhere('storage', 'like', '%' . $searchTerm . '%')
                            ->orWhere('battery', 'like', '%' . $searchTerm . '%')
                            ->orWhere('weight', 'like', '%' . $searchTerm . '%')
                            ->orWhere('cpu', 'like', '%' . $searchTerm . '%')
                            ->orWhereHas('brands', function ($query) use ($searchTerm) {
                                $query->where('name', 'like', '%' . $searchTerm . '%');
                            })
                            ->orWhereHas('categories', function ($query) use ($searchTerm) {
                                $query->where('name', 'like', '%' . $searchTerm . '%');
                            })
                            ->orderBy('id', 'DESC')
                            ->get();

        return view('frontend.pages.product-grids', compact('products', 'searchTerm'));
    }



}
