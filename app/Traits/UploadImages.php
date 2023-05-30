<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImages
{
    public function uploadImage(Request $request,$folderName){
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs($folderName,$image,'save');
        return $path;
    }

}
