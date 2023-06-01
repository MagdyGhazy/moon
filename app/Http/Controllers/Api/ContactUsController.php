<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    use ApiResponse;

    public function index(){

        $contact = ContactUs::get();
        if ($contact) {
            return $this->apiResponse(ContactUsResource::collection(ContactUs::get()), 200, 'done');
        }else{
            return $this->apiResponse(null, 404, 'thier are no messages');
        }
    }
    public function show($id){

        $contact = ContactUs::find($id);
        if ($contact){
            return $this->apiResponse(new ContactUsResource($contact),200,'Done');
        }
        return $this->apiResponse(null,404,'Cannot Find Message');
    }
    public function store(Request $request){

        $contact = ContactUs::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'message'=> $request->message,
        ]);
        if ($contact){
            return $this->apiResponse( ContactUsResource::collection(ContactUs::get()),201,'Add Success');
        }
        return $this->apiResponse(null,404,'Cannot Add Member');

    }

    public function destroy($id){

        $contact = ContactUs::find($id);

        if ($contact){
            $contact->delete();
            return $this->apiResponse(ContactUsResource::collection(ContactUs::get()),200,'Message has been deleted');
        }
        return $this->apiResponse($contact,401,'Cannot Find To delete');

    }
}
