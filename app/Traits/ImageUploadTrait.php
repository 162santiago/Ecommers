<?php

namespace App\Traits;

use illuminate\Http\Request;

trait ImageUploadTrait{

    public function uploadImage(Request $request, $inputName, $path){

        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalNameExtension();
            $imageName = 'media_'. uniqid() .'.'. $ext;
            $image->move(public_path($path), $imageName);
            return $path. '/'. $imageName;
         }
    }

}
