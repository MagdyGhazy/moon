<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = [

            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'subject'=>$this->subject,
            'message'=>$this->message,

        ];
        return $array;
    }
}
