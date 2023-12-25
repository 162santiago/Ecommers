<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use File;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => ['required', 'image', 'max:2000'],
            'type' => ['string', 'max:200'],
            'title' => ['required', 'max:200'],
            'starting_price' => ['max:200'],
            'btn_url' => ['nullable', 'url'],
            'serial' =>['required'],
            'status' => ['required']
         ]);

         $slider = new Slider();
         if ($request->hasFile('banner')) {
            if (File::exists(public_path($slider->banner))) {
                File::delete(public_path($slider->banner));
            }
            $image = $request->banner;
            $imageName = rand(). '_'. $image->getClientOriginalName();
            $image->move(public_path('image'), $imageName);
            $path = '/image/'. $imageName;
            $slider->banner = $path;
         }

         $slider->type = $request->type;
         $slider->title = $request->title;
         $slider->starting_price = $request->starting_price;
         $slider->btn_url = $request->btn_url;
         $slider->serial = $request->serial;
         $slider->status = $request->status;
         $slider->save();
         toastr()->success('Create Successfull');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
