<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DetailsAboutResource;
use App\Models\About;
use App\Traits\ApiResponse;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class DetailsAboutController extends Controller
{

    use UploadImages;
    use ApiResponse;

    public function index(){

        $details = DetailsAboutResource::collection(About::get());
        if ($details) {
            return $this->apiResponse($details, 200, 'done');
        }else{
            return $this->apiResponse($details,401,'Cannot Find To show');
        }
    }

    public function show($id){

        $details = About::find($id);
        if ($details){
            return $this->apiResponse(new DetailsAboutResource($details),200,'done');
        }
        return $this->apiResponse(null,404,'cannot find this');
    }

    public function store(Request $request){


        $details = About::create([

            'title'=> $request->title,
            'discription'=> $request->discription,
            'icon'=> $request->icon,

        ]);
        if ($details){
            return $this->apiResponse( DetailsAboutResource::collection(About::get()),201,'Add Success');
        }
        return $this->apiResponse(null,404,'Cannot Add');
    }

    public function update(Request $request,$id){

        $details=About::findorfail($id);

        $details->update([
            'title'=> $request->title,
            'discription'=> $request->discription,
            'icon'=> $request->icon,

        ]);
        if ($details){
            return $this->apiResponse( DetailsAboutResource::collection(About::get()),201,'Ubdate Success');
        }
        return $this->apiResponse(null,404,'Cannot Ubdate');

    }


    public function destroy($id){

        $details = About::find($id);

        if ($details){
            $details->delete();
            return $this->apiResponse(DetailsAboutResource::collection(About::get()),200,'About has been deleted');
        }
        return $this->apiResponse($details,401,'Cannot Find To delete');

    }


}
