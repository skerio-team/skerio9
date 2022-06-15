<?php

namespace App\Http\Requests\Admin\Product;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            '%description%'      => 'required|string',
            'name'               => 'required|string',
            'sport_category_id'  => 'required',
            'product_category_id'=> 'required',
            'price'              => 'required',
            'image'              => 'required|file|max:5000|mimes:png,jpg,jpeg,gif',
        ]);

    }
    public function messages()
    {
        return [
            'uz.description.required'       => 'O`zbekcha tavsif to`ldirilishi kerak!',
            'ru.description.required'       => 'Ruscha tavsif to`ldirilishi kerak!',
            'en.description.required'       => 'Inglizcha tavsif to`ldirilishi kerak!',

            'uz.description.string'         => 'O`zbekcha tavsif matn ko`rinishida bo`lishi kerak!',
            'ru.description.string'         => 'Ruscha tavsif matn ko`rinishida bo`lishi kerak!',
            'en.description.string'         => 'Inglizcha tavsif matn ko`rinishida bo`lishi kerak!',

            'name.required'                 => 'Nomi to`ldirilishi kerak!',
            'name.string'                   => 'Nomi matn ko`rinishida bo`lishi kerak!',

            'sport_category_id.required'    => 'Sport Kategoriyasi tanlanishi kerak!',

            'product_category_id.required'  => 'Mahsulot Kategoriyasi tanlanishi kerak!',

            'price.required'                => 'Narx to`ldirilishi kerak!',

            'image.required'                => 'Rasm tanlanishi kerak!',
            'image.file'                    => 'Rasm fayl tipida bo`lishligi kerak!',
            'image.max'                     => 'Rasm hajmi 5 mb.dan oshmasligi kerak!',
            'image.mimes'                   => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
        ];
    }
}
