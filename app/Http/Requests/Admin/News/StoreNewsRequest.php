<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreNewsRequest extends FormRequest
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
            '%title%'            => 'required|string',
            '%description%'      => 'required|string',
            'sport_category_id'  => 'required',
            'image*'              => 'required|image|max:5000|mimes:png,jpg,jpeg,gif',
        ]);

    }
    public function messages()
    {
        return [
            'uz.title.required'       => 'O`zbekcha sarlovha to`ldirilishi kerak!',
            'ru.title.required'       => 'Ruscha sarlovha to`ldirilishi kerak!',
            'en.title.required'       => 'Inglizcha sarlovha to`ldirilishi kerak!',

            'uz.title.string'         => 'O`zbekcha sarlovha matn ko`rinishida bo`lishi kerak!',
            'ru.title.string'         => 'Ruscha sarlovha matn ko`rinishida bo`lishi kerak!',
            'en.title.string'         => 'Inglizcha sarlovha matn ko`rinishida bo`lishi kerak!',

            'uz.description.required' => 'O`zbekcha tavsif to`ldirilishi kerak!',
            'ru.description.required' => 'Ruscha tavsif to`ldirilishi kerak!',
            'en.description.required' => 'Inglizcha tavsif to`ldirilishi kerak!',

            'uz.description.string'   => 'O`zbekcha tavsif matn ko`rinishida bo`lishi kerak!',
            'ru.description.string'   => 'Ruscha tavsif matn ko`rinishida bo`lishi kerak!',
            'en.description.string'   => 'Inglizcha tavsif matn ko`rinishida bo`lishi kerak!',

            'sport_category_id.required' => 'Sport Kategoriyasi tanlanishi kerak!',

            'image.required'          => 'Rasm tanlanishi kerak!',
            'image.image'              => 'Rasm bo`lishligi kerak!',
            'image.max'               => 'Rasm hajmi 5 mb.dan oshmasligi kerak!',
            'image.mimes'             => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
        ];
    }
}
