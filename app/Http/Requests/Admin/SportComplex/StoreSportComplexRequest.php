<?php

namespace App\Http\Requests\Admin\SportComplex;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class StoreSportComplexRequest extends FormRequest
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
        return RuleFactory::make([
            '%description%'     =>  'required|string',
            'sport_category_id' =>  'required',
            'area_id'           =>  'required',
            'name'              =>  'required', 'string', 'min:3',
            'image'             =>  'required|file|max:5000|mimes:png,jpg,gif,jpeg',
            'price'             =>  'required', 'numeric',
            'phone'             =>  'required',
            'address'           =>  'required',
            'location'          =>  'required',

        ]);
        return [


        ];
    }
    public function messages()
    {
        return [

            'uz.description.required' => 'O`zbekcha tavsif to`ldirilishi kerak!',
            'ru.description.required' => 'Ruscha tavsif to`ldirilishi kerak!',
            'en.description.required' => 'Inglizcha tavsif to`ldirilishi kerak!',

            'uz.description.string'   => 'O`zbekcha tavsif matn ko`rinishida bo`lishi kerak!',
            'ru.description.string'   => 'Ruscha tavsif matn ko`rinishida bo`lishi kerak!',
            'en.description.string'   => 'Inglizcha tavsif matn ko`rinishida bo`lishi kerak!',

            'sport_category_id.required' => 'Sport Kategoriyasi tanlanishi kerak!',

            'area_id.required'          => 'Joy tanlanishi kerak!',

            'name.required'             => 'Majmua nomi to`ldirilishi kerak!',
            'name.string'               => 'Majmua nomi matn ko`rinishida bo`lishi kerak!',
            'name.min'                  => 'Majmua nomi 3 ta belgidan ko`p bo`lishi kerak!',

            'image.required'            => 'Rasm tanlanishi kerak!',
            'image.file'                => 'Rasm fayl tipida bo`lishligi kerak!',
            'image.max'                 => 'Rasm hajmi 5 mb.dan oshmasligi kerak!',
            'image.mimes'               => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',

            'price.required'            => 'Narx to`ldirilishi kerak!',

            'phone.required'            => 'Telefon raqam to`ldirilishi kerak!',

            'address.required'          => 'Manzil to`ldirilishi kerak!',

            'address.required'          => 'Manzil to`ldirilishi kerak!',

        ];
    }
}
