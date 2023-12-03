<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id],
            'image' => ['nullable', 'max:2020', 'image']
        ]);
        $user = Auth::user();
        //temporaly img -> disk('profile') :)
        if ($request->hasFile('image')) {
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $image =$request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('image'), $imageName);
            $path= '/image/'. $imageName;
            $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr()->success('profile update succesfull');
        return redirect()->back();
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $request->user()->update([
            'password'=>bcrypt($request->password)
        ]);
        toastr()->success('profile password update succesfull');
        return redirect()->back();
    }
}
