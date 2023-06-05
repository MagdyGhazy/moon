<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppPortofile;
use App\Models\app;
use App\Traits\ApiResponse;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class appbcontroller extends Controller
{
    use ApiResponse;
    use UploadImages;

    public function index(){

        $team = AppPortofile::collection(app::get());
        return $this->apiResponse($team,200,'done');
    }
    public function show($id){

        $team = app::find($id);
        if ($team){
            return $this->apiResponse(new AppPortofile($team),200,'done');
        }
        return $this->apiResponse(null,404,'cannot find member');
    }
    public function store(Request $request){


        $path = $this->loadAppImage($request, 'portfolio');

        $team = app::create([

            'AppName'=> $request->AppName,
            'AppImage'=>$path,
            'AppLink'=> $request->AppLink,
        ]);
        if ($team){
            return $this->apiResponse( AppPortofile::collection(app::get()),201,'Add Success');
        }
        return $this->apiResponse(null,404,'Cannot Add Member');
    }
    public function update(Request $request,$id){

        $team=app::findorfail($id);

        if ($request->image == "") {
            $path = $team->image;
        }else{
            $path = $this->loadAppImage($request, 'portfolio');
        }
        $team->update([
            'AppName'=> $request->AppName,
            'AppImage'=>$path,
            'AppLink'=> $request->AppLink,
        ]);
        if ($team){
            return $this->apiResponse( AppPortofile::collection(app::get()),201,'Ubdate Success');
        }
        return $this->apiResponse(null,404,'Cannot Ubdate Member');

    }

    public function destroy($id){

        $team = app::find($id);

        if ($team){
            $team->delete();
            return $this->apiResponse(AppPortofile::collection(app::get()),200,'Member has been deleted');
        }
        return $this->apiResponse($team,401,'Cannot Find To delete');

    }

}

