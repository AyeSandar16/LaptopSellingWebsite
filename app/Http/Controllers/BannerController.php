<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::paginate(5);
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }


    public function store(BannerRequest $request)
    {
        $request->validated();
        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        $img_name = time(). '.' .$request->image->extension();
        $request->image->move(public_path('images'), $img_name);
        $banner->image = $img_name;
        $banner->save();
        return redirect()->route('banners.index')->with('success','Successfully Insert!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = Banner::findOrFail($id);
        return view('banners.show',['banner'=>$record]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('banners.edit',['banner'=>Banner::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, string $id)
    {
        $request->validated();
        $banner = Banner::findOrFail($id);
        $banner->title  = $request->input('title');
        $banner->description  = $request->input('description');
        $img_name = time(). '.' .$request->image->extension();//39749574.png
        $request->image->move(public_path('images'), $img_name);
        $banner->image = $img_name;
        $banner->save();
        return redirect()->route('banners.index')->with('success','Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banners.index')->with('success','Successfully Deleted!');
    }
}
