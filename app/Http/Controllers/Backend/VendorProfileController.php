<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorProfileController extends Controller
{
    public function index(){
        return view('vendor.dashboard.profile');
    }

    public function updateProfile(){
        return view('vendor.dashboard.profile');
    }

    public function updatePassword(){
        return view('vendor.dashboard.profile');
    }
}
