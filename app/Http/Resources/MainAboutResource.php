<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MainAboutResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'discription' => $this->discription,
            'image' => $this->image

        ];
        return $array;
    }
}
