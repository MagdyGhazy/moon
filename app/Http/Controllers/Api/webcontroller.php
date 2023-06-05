<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\portofileWeb;
use App\Models\Web;
use App\Traits\ApiResponse;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class webcontroller extends Controller
{
    use ApiResponse;
    use UploadImages;
    public function index(){

        $team = portofileWeb::collection(Web::get());
        return $this->apiResponse($team,200,'done');
    }
    public function show($id){

        $team = Web::find($id);
        if ($team){
            return $this->apiResponse(new portofileWeb($team),200,'done');
        }
        return $this->apiResponse(null,404,'cannot find member');
    }
    public function store(Request $request){


        $path = $this->loadWebImage($request, 'portfolio');

        $team = Web::create([

            'WebName'=> $request->WebName,
            'WebImage'=>$path,
            'WebLinke'=> $request->WebLinke,
        ]);
        if ($team){
            return $this->apiResponse( portofileWeb::collection(Web::get()),201,'Add Success');
        }
        return $this->apiResponse(null,404,'Cannot Add Member');
    }
    public function update(Request $request,$id){

        $team=Web::findorfail($id);

        if ($request->image == "") {
            $path = $team->image;
        }else{
            $path = $this->loadWebImage($request, 'portfolio');
        }
        $team->update([
            'WebName'=> $request->WebName,
            'WebImage'=>$path,
            'WebLinke'=> $request->WebLinke,
        ]);
        if ($team){
            return $this->apiResponse( portofileWeb::collection(Web::get()),201,'Ubdate Success');
        }
        return $this->apiResponse(null,404,'Cannot Ubdate Member');

    }
    public function destroy($id){

        $team = Web::find($id);

        if ($team){
            $team->delete();
            return $this->apiResponse(portofileWeb::collection(Web::get()),200,'Member has been deleted');
        }
        return $this->apiResponse($team,401,'Cannot Find To delete');

    }
}


