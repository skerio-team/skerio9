<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $id=$this->likes->all();
       
        $likes = count($id);
        
        return [
            'id'=>$this->id,
            'created_at'=>$this->created_at->format('d/m/Y'), 
            'sport_category'=>$this->sport_category_id,
            'continent_id' => $this->continent_id,
            'status'=>$this->status,
            'special'=>$this->special,
            'likes' => [$likes],
            'image'=>$this->image,
            'title_uz'=>$this->translate('uz')->title,
            'title_ru'=>$this->translate('ru')->title,
            'title_en'=>$this->translate('en')->title,
            'description_uz'=>strip_tags($this->translate('uz')->description),
            'description_ru'=>strip_tags($this->translate('ru')->description),
            'description_en'=>strip_tags($this->translate('en')->description),
        ];
    }
}
