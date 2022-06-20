<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'sport_category_id'=>$this->sport_category_id,
            'team_id'=>$this->teams->image,
            'product_category_id'=>$this->product_category_id,
            'brand_id'=>$this->brand_id,
            'name'=>$this->name,
            'discount'=>$this->discount,
            
            'size'=> \App\Http\Resources\SizeResource::collection($this->sizes),

            'price'=>$this->price,
            'status'=>$this->status,
            'image'=>$this->image,
        ];
    }
}
