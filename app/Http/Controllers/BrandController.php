<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{


    public function index()
    {
        return view('brands.index',['brands'=>Brand::all()]);

        // return redirect()->route('brands.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(BrandRequest $request)
    // {
    //     $request->validated();
    //     $brand = new Brand();
    //     $brand->name = $request->input('name');
    //     $brand->save();//insert into category
    //     return redirect()->route('brands.index')->with('success','Successfully Insert!');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'names' => 'required|string',
        ]);

        $names = explode(',', $request->input('names'));

        foreach ($names as $name) {
            Brand::create([
                'name' => trim($name), // Trim to remove any leading/trailing spaces
                // Other fields if any
            ]);
        }

        return redirect()->route('brands.index')
                        ->with('success', 'Brands added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = Brand::findOrFail($id);
        return view('brands.show',['brand'=>$record]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('brands.edit',['brand'=>Brand::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $record = $request->validated();
        $brand->update($record);
        return redirect()->route('brands.index')->with('success','Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success','Successfully Deleted!');
    }
}
