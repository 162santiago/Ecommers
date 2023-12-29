<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use File;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
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
            'serial' => ['required'],
            'status' => ['required']
        ]);

        $slider = new Slider();
        //  Carga de imagen
        $bannerPath = $this->uploadImage($request, 'banner', 'image');


        $slider->banner = $bannerPath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();
        toastr()->success('Create Successfull');
        return redirect()->route('admin.slider.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:2000'],
            'type' => ['string', 'max:200'],
            'title' => ['nullable', 'max:200'],
            'starting_price' => ['max:200'],
            'btn_url' => ['nullable', 'url'],
            'serial' => ['nullable'],
            'status' => ['nullable']
        ]);

        $slider = Slider::findOrFail($id);
        $imagePath = $this->updateImage($request, 'banner','image', $slider->banner);
        $slider->banner = empty(!$imagePath) ? $imagePath : $slider->banner;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();
        toastr()->success('Update Successfull');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        $this->deleteImage($slider->banner);
        $slider->delete();
        toastr()->success('Slider delete');
        return response(['status' => 'success', 'message' => 'Deleted Successfull']);
    }
}
