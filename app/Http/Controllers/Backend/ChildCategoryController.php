<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.child-category.create', ['categories' => $categories]);
    }

    public function getSubCategories(Request $request){
        $subcategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subcategories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'category' => ['required'],
            'sub_category' => ['required'],
            'name' => ['required', 'max:200', 'unique:child_categories,name'],
            'status' => ['required'],
        ]);

        $childcategory = new ChildCategory();
        $childcategory->category_id = $request->category;
        $childcategory->sub_category_id = $request->sub_category;
        $childcategory->name = $request->name;
        $childcategory->slug = Str::slug($request->name);
        $childcategory->status = $request->status;
        $childcategory->save();

        toastr()->success('Create Succesfull');
        return redirect()->route('admin.child-category.index');
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
        $childcategory = ChildCategory::findOrFail($id);
        $subcategories = SubCategory::where('category_id' , $childcategory->category_id)->get();
        $categories = Category::all();
        return view('admin.child-category.edit', ['childcategory' => $childcategory, 'categories' => $categories, 'subcategories' => $subcategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required'],
            'sub_category' => ['required'],
            'name' => ['required', 'max:200', 'unique:child_categories,name,'.$id],
            'status' => ['required'],
        ]);

        $childcategory = ChildCategory::findOrFail($id);
        $childcategory->category_id = $request->category;
        $childcategory->sub_category_id = $request->sub_category;
        $childcategory->name = $request->name;
        $childcategory->slug = Str::slug($request->name);
        $childcategory->status = $request->status;
        $childcategory->save();
        toastr()->success('Update child Category '. $childcategory->name);
        return redirect()->route('admin.child-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childcategory = ChildCategory::findOrFail($id);
        $childcategory->delete();

        return reset(['status' => 'success', 'message' => 'Deleted Successfull!']);
    }

    public function changeStatus(Request $request){
        $childcategory = ChildCategory::findORFail($request->id);
        $childcategory->status = $request->status == 'true' ? 1 : 0;
        print($childcategory->status);
        $childcategory->save();
        return response(['message' => 'Status has been  updated!']);
    }
}
