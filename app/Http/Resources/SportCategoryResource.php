<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SportCategoryResource extends JsonResource
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
            'sport_name_uz'=>$this->translate('uz')->name,
            'sport_name_ru'=>$this->translate('ru')->name,
            'sport_name_en'=>$this->translate('en')->name,
        ];
    }
}
