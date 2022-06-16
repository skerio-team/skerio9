<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSportComplexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sport_category_id' =>  ['required'],
            'area_id'           =>  ['required'],
            'name'              =>  ['required', 'string', 'min:3'],
            'image.*'           =>  ['image|mimes:png,jpg,gif,jpeg'],
            'price'             =>  ['required', 'numeric'],
            'phone'             =>  ['required'],
            'address'           =>  ['required'],
            'dress_room'        =>  ['required'],
            'food'              =>  ['required'],
            'bath_room'         =>  ['required'],
            'sit_place'         =>  ['required'],
            'status'            =>  ['required'],
        ];
    }
}
