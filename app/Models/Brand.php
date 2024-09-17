<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'

    ];
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public static function countAllBrands(){
        $data = Brand::count(); // Using Eloquent ORM
        return $data;
    }
    public static function getProductByBrand($id){
        // dd($slug);
        return Brand::with('products')->where('id',$id)->first();
        // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    }
    public static function getAllParentWithChild(){
        return Brand::get();
    }
}
