<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Traits\ApiResponse;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use UploadImages;
    use ApiResponse;

    public function index(){

        $team = TeamResource::collection(Team::get());
        return $this->apiResponse($team,200,'done');
    }

    public function show($id){

        $team = Team::find($id);
        if ($team){
            return $this->apiResponse(new TeamResource($team),200,'done');
        }
        return $this->apiResponse(null,404,'cannot find member');
    }

    public function store(Request $request){


        $path = $this->uploadImage($request, 'team');

        $team = Team::create([

            'name'=> $request->name,
            'job'=> $request->job,
            'image'=>$path,
            'fb'=> $request->fb,
            'li'=> $request->li,
            'gm'=> $request->gm,
            'ig'=> $request->ig,
        ]);
        if ($team){
            return $this->apiResponse( TeamResource::collection(Team::get()),201,'Add Success');
        }
        return $this->apiResponse(null,404,'Cannot Add Member');
    }

    public function update(Request $request,$id){

        $team=Team::findorfail($id);

        if ($request->image == "") {
            $path = $team->image;
        }else{
            $path = $this->uploadImage($request, 'team');
        }
        $team->update([
            'name'=> $request->name,
            'job'=> $request->job,
            'image'=>$path,
            'fb'=> $request->fb,
            'li'=> $request->li,
            'gm'=> $request->gm,
            'ig'=> $request->ig,
        ]);
        if ($team){
            return $this->apiResponse( TeamResource::collection(Team::get()),201,'Ubdate Success');
        }
        return $this->apiResponse(null,404,'Cannot Ubdate Member');

    }


    public function destroy($id){

        $team = Team::find($id);

        if ($team){
            $team->delete();
            return $this->apiResponse(TeamResource::collection(Team::get()),200,'Member has been deleted');
        }
        return $this->apiResponse($team,401,'Cannot Find To delete');

    }



}
