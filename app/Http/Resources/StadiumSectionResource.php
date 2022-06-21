<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StadiumSectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'stadium_name'=>$this->stadiums->name,
            'sektor_name'=>$this->name,
            'price'=>$this->price,
            'capacity'=>$this->capacity,
            'images'=>$this->image,
        ];
    }
}
