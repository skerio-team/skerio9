<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreSportCategoryRequest extends FormRequest
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
            '%name%'       => 'required|string|max:20',
        ]);

    }

    public function messages()
    {
        return [
            'uz.name.required'       => 'O`zbekcha nomi to`ldirilishi kerak!',
            'ru.name.required'       => 'Ruscha nomi to`ldirilishi kerak!',
            'en.name.required'       => 'Inglizcha nomi to`ldirilishi kerak!',

            'uz.name.string'         => 'O`zbekcha nomi matn ko`rinishida bo`lishi kerak!',
            'ru.name.string'         => 'Ruscha nomi matn ko`rinishida bo`lishi kerak!',
            'en.name.string'         => 'Inglizcha nomi matn ko`rinishida bo`lishi kerak!',

            'uz.name.max' => 'O`zbekcha nomi eng ko`pi bilan 20 ta belgidan oshmasligi kerak!',
            'ru.name.max' => 'Ruscha nomi eng ko`pi bilan 20 ta belgidan oshmasligi kerak!',
            'en.name.max' => 'Inglizcha nomi eng ko`pi bilan 20 ta belgidan oshmasligi kerak!',
        ];
    }
}
