<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Str;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['nullable', 'image'],
            'name' => ['max:200', 'required'],
            'status'=> ['required'],
            'is_featured' => [ 'required']
        ]);

        $image = $this->uploadImage($request,'logo','image');
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->logo = $image;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured= $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr()->success('Brand Created Successfull');
        return redirect()->route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['nullable', 'image'],
            'name' => ['max:200', 'required'],
            'status'=> ['required'],
            'is_featured' => [ 'required']
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name =$request->name;
        $logo = $this->updateImage($request, 'logo', 'image', $brand->logo);
        $brand->logo = !empty($logo) ? $logo : $brand->logo ;
        $brand->slug = Str::slug($request->name);
        $brand->status = $request->status;
        $brand->is_featured = $request->is_featured;
        $brand->save();

        toastr()->success('update brand succesfull');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $this->deleteImage($brand->logo);
        $brand->delete();
        toastr()->success('brand delete');
        return response(['status' => 'success', 'message' => 'Deleted Successfull']);
    }

    public function changeStatus(Request $request){
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status=='true' ? 1 :0;
        $brand->save();
        return response(['message' => 'Status has been update']);
    }
}
