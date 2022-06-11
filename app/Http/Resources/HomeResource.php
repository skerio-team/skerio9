<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
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
            'title_uz'=>$this->translate('uz')->title,
            'title_ru'=>$this->translate('ru')->title,
            'title_en'=>$this->translate('en')->title,
            'description_uz'=>strip_tags($this->translate('uz')->description),
            'description_ru'=>$this->translate('ru')->description,
            'description_en'=>$this->translate('en')->description,
            'image'=>$this->image,
        ];
    }
}
