<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserFeedResource;
use App\Models\UserFeed;
use App\Traits\ApiResponse;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class UserFeedController extends Controller
{

    use UploadImages;
    use ApiResponse;
    public function index(){

        $user = UserFeedResource::collection(UserFeed::get());
        return $this->apiResponse($user,200,'done');
    }

    public function show($id){

        $user = UserFeed::find($id);
        if ($user){
            return $this->apiResponse(new UserFeedResource($user),200,'done');
        }
        return $this->apiResponse(null,404,'cannot find comment');
    }

    public function store(Request $request){


        if ($request->image == "") {
            $path = $request->image;
        }else{
            $path = $this->uploadImage($request, 'users');
        }

        $user = UserFeed::create([
            'name'=> $request->name,
            'comment'=> $request->comment,
            'image'=>$path,
        ]);
        if ($user){
            return $this->apiResponse( UserFeedResource::collection(UserFeed::get()),201,'Add Success');
        }
        return $this->apiResponse(null,404,'Cannot Add comment');
    }

    public function destroy($id){

        $user = UserFeed::find($id);

        if ($user){
            $user->delete();
            return $this->apiResponse(UserFeedResource::collection(UserFeed::get()),200,'comment has been deleted');
        }
        return $this->apiResponse($user,401,'Cannot Find To delete');

    }
}
