<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumb_image' => ['required', 'image', 'max:200'],
            'name' => ['required', 'max:200'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required', 'max:500'],
            'long_description' => ['required'],
            'seo_title' => ['nullable','max:200'],
            'seo_description' => ['nullable','max:200'],
            'video_link' => ['nullable'],
            'status' => ['required'],
        ]);

        $product = new Product();
        $imagepath = $this->uploadImage($request, 'thumb_image', 'image');
        $product->thumb_image =$imagepath ;
        $product->name  = $request->name ;
        $product->slug = Str::slug($request->name);
        $product->vendor_id  =  Auth::user()->vendor->id;
        $product->category_id  = $request->category_id ;
        $product->sub_category_id  = $request->sub_category_id ;
        $product->child_category_id  = $request->child_category_id ;
        $product->brand_id  = $request->brand_id ;
        $product->short_description  = $request->short_description ;
        $product->long_description  = $request->long_description ;
        $product->video_link  = $request->video_link;
        $product->sku  = $request->sku;
        $product->price  = $request->price ;
        $product->product_type  = $request->product_type ;
        $product->offer_price  = $request->offer_price;
        $product->offer_start_date  = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->qty  = $request->qty ;
        $product->status = $request->status;
        $product->is_approved = 1;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        toastr()->success('Create Succesfully ');
        return redirect()->route('admin.products.index');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product','categories', 'brands'));
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

    //get all products
    public function getSubCategories(Request $request){
        $subCategories = SubCategory::where('category_id' , $request->id)->get();
        return $subCategories;
    }

    public function getChildCategories(Request $request){
        $childCategories = ChildCategory::where('sub_category_id', $request->id)->get();
        return $childCategories;
    }
}
