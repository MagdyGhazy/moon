<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class portofileWeb extends JsonResource
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
            'WebName'=>$this->WebName,
            'WebImage'=>$this->WebImage,
            'WebLinke'=>$this->WebLinke
        ];
        return $array;
    }
}
