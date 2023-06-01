<?php

namespace App\Traits;

trait ApiResponse
{

    public function apiResponse($data = null,$status = null,$message = null){

        $array = [

            'data'=>$data,
            'status'=>$status,
            'message'=>$message
        ];

        return response($array);
    }

}
