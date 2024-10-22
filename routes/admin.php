<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
/**Profile controllers */
Route::get('profile',[ProfileController::class, 'index'] )->name('profile');
Route::post('profile/update', [ProfileController::class,'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class,'updatePassword'])->name('password.update');
/**Sliders controllers */
Route::resource('/slider', SliderController::class);
/**category controller */
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('/category', CategoryController::class);
/**sub category controller */
Route::put('sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('/sub-category', SubCategoryController::class);

/**child category controller */
Route::get('get-subcategory', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::resource('/child-category', ChildCategoryController::class);

/**brand controller */
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('/brand', BrandController::class);

/**vendor profile route controller */
Route::resource('/vendor-profile', AdminVendorProfileController::class);

/**Products route controller */
Route::get('/product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('/product/get-childcategories', [ProductController::class, 'getChildCategories'])->name('product.child-subcategories');
Route::resource('/products', ProductController::class);
