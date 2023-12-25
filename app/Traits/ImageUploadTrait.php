<?php

namespace App\Traits;

use illuminate\Http\Request;

trait ImageUploadTrait{

    public function uploadImage(Request $request, $inputName, $path){

        if ($request->hasFile($inputName)) {
            $image = $request->banner;
            $imageName = rand(). '_'. $image->getClientOriginalName();
            $image->move(public_path('image'), $imageName);
            $path = '/image/'. $imageName;
            $slider->banner = $path;
         }
    }

}
