<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index',['products'=>$products] );
    }


    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create',['categories'=>$categories],['brands'=>$brands]);
    }

    public function store(ProductRequest $request)
    {
        $request->validated(

        );
        $product = new Product();
        $product->model  = $request->input('model');
        $product->display  = $request->input('display');
        $product->memory  = $request->input('memory');
        $product->cpu  = $request->input('cpu');
        $product->storage  = $request->input('storage');
        $product->battery  = $request->input('battery');
        $product->weight  = $request->input('weight');
        $product->feature  = $request->input('feature');
        $product->warranty  = $request->input('warranty');
        $product->discount  = $request->input('discount');
        $product->price  = $request->input('price');
        $product->stock  = $request->input('stock');
        $product->condition  = $request->input('condition');
        $product->status  = $request->input('status');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $img_name = time(). '.' .$request->image->extension();
        $request->image->move(public_path('images'), $img_name);
        $product->image = $img_name;
        $product->save();
        return redirect()->route('products.index')->with('success','Successfully Insert!!');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product'=>$product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit',['product'=>$product, 'categories'=>Category::all(), 'brands'=>Brand::all()]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate( [
            'model'=>'required',
            'display'=>'required',
            'memory'=>'required',
            'cpu'=>'required',
            'storage'=>'required',
            'battery'=>'required',
            'weight'=>'required',
            'feature'=>'required',
            'warranty'=>'required',
            'discount'=>'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'condition' => 'required|in:default,new,hot',
            'status'=>'required|in:active,inactive',
            'category_id'=>'required',
            'brand_id'=>'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp,avif'
               ]);


        try {
            // Find the product by ID
            $product = Product::findOrFail($id);

            // Update product properties
            $product->model = $request->input('model');
            $product->display = $request->input('display');
            $product->memory = $request->input('memory');
            $product->cpu = $request->input('cpu');
            $product->storage = $request->input('storage');
            $product->battery = $request->input('battery');
            $product->weight = $request->input('weight');
            $product->feature = $request->input('feature');
            $product->warranty = $request->input('warranty');
            $product->discount = $request->input('discount');
            $product->price = $request->input('price');
            $product->stock = $request->input('stock');
            $product->condition = $request->input('condition');
            $product->status = $request->input('status');
            $product->brand_id = $request->input('brand_id');
            $product->category_id = $request->input('category_id');

            // Handle image upload
            if ($request->hasFile('image')) {
                $img_name = time(). '.' .$request->image->extension();
                $request->image->move(public_path('images'), $img_name);
                $product->image = $img_name;
            }

            // Save the updated product
            $product->save();

            return redirect()->route('products.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            // Log any exceptions for debugging
            Log::error('Error updating product: '.$e->getMessage());
            return redirect()->back()->with('error', 'Failed to update product. Please try again.');
        }
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Successfully Delete!!');
    }
}
