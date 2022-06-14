<?php

namespace App\Http\Requests\Admin\Region;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
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
            'country_id'    =>  ['required', 'numeric'],
            'name'          =>  ['required', 'min:2', 'string', 'unique:regions,name'],
        ];
    }

    public function messages()
    {
        return [
            'country_id.required'        => 'Mamlakat nomi kiritilishi kerak!',

            'name.required'             => 'Joy nomi to`ldirilishi kerak!',
            'name.min'                  => 'Joy nomi 2 ta belgidan oz bo`lmasligi kerak!',
            'name.string'               => 'Joy nomi matn ko`rinishida bo`lishi kerak!',
            'country.unique'            => 'Bu Joy oldin kiritilgan!',
        ];
    }
}
