<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        return view("frontend.dashboard.profile");
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email,'. Auth::user()->id],
            'image' => ['nullable', 'max:2020', 'image']
        ]);

        $user = Auth::user();
        if ($request->hasFile('image')) {
            if (File::exist(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand() .'_' . $image->getClientOriginalName();
            $image->move(public_path('image/'.$imageName));
            $path = 'image/'.$imageName;
            $request->image = $path;
        }

        toastr()->success('profile update');

        // dd($request->all());
    }
}
