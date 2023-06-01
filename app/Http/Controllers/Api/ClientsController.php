<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\About;
use App\Models\Clients;
use App\Traits\ApiResponse;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    use UploadImages;
    use ApiResponse;

    public function index(){
        $clients = ClientResource::collection(Clients::get());
        return $this->apiResponse($clients,200,'done');
    }


    public function show($id){
        $clients = Clients::find($id);
        if ($clients){
            return $this->apiResponse(new ClientResource($clients),200,'done');
        }
        return $this->apiResponse(null,400,'client not found');
    }


    public function store(Request $request){
        $path = $this->uploadLogo($request,'clint');
        $clients = Clients::create([
            'name'=> $request->name,
            'logo'=> $path,
        ]);
        if ($clients){
            return $this->apiResponse( ClientResource::collection(Clients::get()),201,'client has been saved');
        }
        return $this->apiResponse($clients,401,'not saved');
    }



    public function update(Request $request,$id)
    {
        $clients=Clients::findorfail($id);
        if ($request->logo == ""){
            $path = $clients->logo;
        }
        else {
            $path = $this->uploadLogo($request,'clint');
        }
        $clients->update([
            'name'=> $request->name,
            'logo'=> $path,
        ]);
        if ($clients){
            return $this->apiResponse( ClientResource::collection(Clients::get()),200,'client has been updated');
        }
        return $this->apiResponse($clients,401,'not updated');
    }



    public function destroy($id)
    {
        $clients = Clients::findorfail($id)->delete();
        if ($clients){
            return $this->apiResponse( ClientResource::collection(Clients::get()),200,'client has been deleted');
        }
        return $this->apiResponse($clients,401,'not deleted');
    }
}
