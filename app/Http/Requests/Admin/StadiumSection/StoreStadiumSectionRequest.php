<?php

namespace App\Http\Requests\Admin\StadiumSection;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class StoreStadiumSectionRequest extends FormRequest
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
            'stadium_id'=>  'required',
            'name'      =>  'required',
            'price'     =>  'required',
            'capacity'  =>  'nullable',
            // 'image'     =>  'nullable|file|max:5000|mimes:png,jpg,gif,jpeg',
            'image.*'   =>  ['nullable|image|mimes:png,jpg,gif,jpeg'],
        ];
    }

    public function messages(){
        return [
            'stadium_id.required'   => 'Stadion Tanlanishi kerak!',
            'name.required'         => 'Nomi kiritilishi kerak!',
            'price.required'        => 'Stadion kiritlishi kerak!',
            'capacity.required'     => 'Hajmi kiritlishi kerak!',

            'image.required'        => 'Rasm tanlanishi kerak!',
            'image.file'            => 'Rasm fayl tipida bo`lishligi kerak!',
            'image.max'             => 'Rasm hajmi 5 mb.dan oshmasligi kerak!',
            'image.mimes'           => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
        ];
    }
}
