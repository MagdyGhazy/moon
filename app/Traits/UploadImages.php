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

    public function uploadLogo(Request $request,$folderName){
        $logo = $request->file('logo')->getClientOriginalName();
        $path = $request->file('logo')->storeAs($folderName,$logo,'save');
        return $path;
    }

    public function loadAppImage(Request $request,$folderName){
        $image=$request->file('AppImage')->getClientOriginalName();
        $path=$request->file('AppImage')->storeAs($folderName,$image,'save');
        return $path;
    }public function loadWebImage(Request $request,$folderName){
        $image=$request->file('WebImage')->getClientOriginalName();
        $path=$request->file('WebImage')->storeAs($folderName,$image,'save');
        return $path;
    }
}
