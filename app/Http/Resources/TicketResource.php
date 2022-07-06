<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'sport_category'=>$this->sportCategories->name,
            'team_1'=>$this->teams1->name,
            'team_2'=>$this->teams2->name,
            'stadium_section'=>$this->stadiumSections->name,
            'name'=>$this->name,
            'date'=>$this->date,
            'price'=>$this->price,
            'status'=>$this->status,
            'image'=>$this->image,
        ];
    }
}