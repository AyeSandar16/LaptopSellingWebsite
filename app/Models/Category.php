<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'

    ];
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public static function countAllCategories(){
        $data = Category::count(); // Using Eloquent ORM
        return $data;
    }
    public function child_cat(){
        return $this->hasMany('App\Models\Category','id')->get();
    }
    public static function getAllParentWithChild(){
        return Category::get();
    }
    public static function getProductByCat($id){
        // dd($slug);
        return Category::with('products')->where('id',$id)->first();
        // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    }

    // public static function getAllParentWithChild(){
    //     return Category::with('products')->where('status','active')->orderBy('model','ASC')->get();
    // }
}
