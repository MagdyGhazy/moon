<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'name'=> $this->name,
            'job'=> $this->job,
            'image'=>$this->image,
            'fb'=> $this->fb,
            'li'=> $this->li,
            'gm'=> $this->gm,
            'ig'=> $this->ig,
        ];
        return $array;
    }
}
