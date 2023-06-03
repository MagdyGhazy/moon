<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainAboutResource;
use App\Models\MainAbout;
use App\Traits\ApiResponse;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class MainAboutController extends Controller
{

    use UploadImages;
    use ApiResponse;

    public function index(){

        $main = MainAboutResource::collection(MainAbout::get());
        if ($main) {
            return $this->apiResponse($main, 200, 'done');
        }else{
            return $this->apiResponse($main,401,'Cannot Find To show');
        }
    }

    public function show($id){

        $main = MainAbout::find($id);
        if ($main){
            return $this->apiResponse(new MainAboutResource($main),200,'done');
        }
        return $this->apiResponse(null,404,'cannot find this');
    }

    public function store(Request $request){


        $path = $this->uploadImage($request, 'MainAbout');

        $main = MainAbout::create([

            'title'=> $request->title,
            'discription'=> $request->discription,
            'image'=>$path,

        ]);
        if ($main){
            return $this->apiResponse( MainAboutResource::collection(MainAbout::get()),201,'Add Success');
        }
        return $this->apiResponse(null,404,'Cannot Add');
    }

    public function update(Request $request,$id){

        $main=MainAbout::findorfail($id);

        if ($request->image == "") {
            $path = $main->image;
        }else{
            $path = $this->uploadImage($request, 'MainAbout');
        }
        $main->update([
            'title'=> $request->title,
            'discription'=> $request->discription,
            'image'=>$path,

        ]);
        if ($main){
            return $this->apiResponse( MainAboutResource::collection(MainAbout::get()),201,'Ubdate Success');
        }
        return $this->apiResponse(null,404,'Cannot Ubdate');

    }


    public function destroy($id){

        $main = MainAbout::find($id);

        if ($main){
            $main->delete();
            return $this->apiResponse(MainAboutResource::collection(MainAbout::get()),200,'About has been deleted');
        }
        return $this->apiResponse($main,401,'Cannot Find To delete');

    }

}
