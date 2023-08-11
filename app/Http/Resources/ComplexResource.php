<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplexResource extends JsonResource
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
            'sport_category'=>$this->sportCategory->name,
            'area'=>$this->areas->name,
            'name'=>$this->name,
            'image'=>$this->image,
            'price'=>$this->price,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'location'=>$this->location,
            'working_status'=>$this->working_status == 1 ? 'faol' : 'faol emas',
            'dress_room'=>$this->dress_room == 1 ? 'mavjud' : 'mavjud emas',
            'food'=>$this->food == 1 ? 'mavjud' : 'mavjud emas',
            'bath_room'=>$this->bath_room == 1 ? 'mavjud' : 'mavjud emas',
            'sit_place'=>$this->sit_place == 1 ? 'mavjud' : 'mavjud emas',
            'description_uz'=>strip_tags($this->translate('uz')->description),
            'description_ru'=>strip_tags($this->translate('ru')->description),
            'description_en'=>strip_tags($this->translate('en')->description),

        ];
    }
}
