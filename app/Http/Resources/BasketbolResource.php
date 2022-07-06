<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketbolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return         
        [
            'id'=>$this->id,
            'status'=>$this->status,
            'discount'=>$this->discount,
            'price'=>$this->price,
            'name'=>$this->name,
            'brand_id'=>$this->brands->name,
            'sport_category_id'=>$this->sport_categories->name,
            'product_category_id'=>$this->product_categories->name,
            'image'=>$this->image,
            'team_id'=>$this->teams->image,
            'descrition'=>$this->description,
            'size'=> \App\Http\Resources\SizeResource::collection($this->sizes),
        ];
    }
}
