<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminFeedResource;
use App\Models\AdminFeed;
use App\Models\UserFeed;
use App\Traits\ApiResponse;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class AdminFeedController extends Controller
{
    use UploadImages;
    use ApiResponse;
    public function index(){

        $user = AdminFeedResource::collection(AdminFeed::get());
        return $this->apiResponse($user,200,'done');
    }
    public function show($id){

        $user = AdminFeed::find($id);
        if ($user){
            return $this->apiResponse(new AdminFeedResource($user),200,'done');
        }
        return $this->apiResponse(null,404,'cannot find comment');
    }

    public function store(Request $request)
    {

        $Search = UserFeed::select('*')->where('id','=',$request->commentId)->get();


        $user =  AdminFeed::create([

            'name'=>$Search[0]->name,
            'comment'=>$Search[0]->comment,
            'image'=>$Search[0]->image,
        ]);

        if ($user){
            return $this->apiResponse( AdminFeedResource::collection(AdminFeed::get()),201,'Add Success');
        }
        return $this->apiResponse(null,404,'Cannot Add comment');

    }

    public function destroy($id){

        $user = AdminFeed::find($id);

        if ($user){
            $user->delete();
            return $this->apiResponse(AdminFeedResource::collection(AdminFeed::get()),200,'comment has been deleted');
        }
        return $this->apiResponse($user,401,'Cannot Find To delete');

    }
}
