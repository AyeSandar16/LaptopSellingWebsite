<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index',['categories'=>Category::all()]);
    }
    public function create()
    {
       return view('categories.create');
    }
    // public function store(CategoryRequest $request)
    // {
    //     $request->validated();
    //     $category = new Category();
    //     $category->name = $request->input('name');
    //     $category->save();//insert into category
    //     return redirect()->route('categories.index')->with('success','Successfully Inserted!');

    // }
    public function store(Request $request)
    {
        $request->validate([
            'names' => 'required|string',
        ]);

        $names = explode(',', $request->input('names'));

        foreach ($names as $name) {
            Category::create([
                'name' => trim($name), // Trim to remove any leading/trailing spaces
                // Other fields if any
            ]);
        }

        return redirect()->route('categories.index')
                        ->with('success', 'Categories added successfully.');
    }

    public function show(string $id)
    {
       $record = Category::findOrFail($id);
        return view('categories.show',['category'=>$record]);
    }
    public function edit(string $id)
    {
        return view('categories.edit',['category'=>Category::findOrFail($id)]);
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $record = $request->validated();
        $category->update($record);
        return redirect()->route('categories.index')->with('success','Successfully Updated!');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Successfully Deleted!');
    }
}
