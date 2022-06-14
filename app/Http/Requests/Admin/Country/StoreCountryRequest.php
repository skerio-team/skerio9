<?php

namespace App\Http\Requests\Admin\Country;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
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
            'country'  => ['required', 'min:2', 'string', 'unique:countries,country'],
        ];
    }
    public function messages()
    {
        return [
            'country.required'  => 'Mamlakat nomi to`ldirilishi kerak!',
            'country.min'       => 'Mamlakat nomi eng ozi bilan 2 ta belgidan oz bo`lmasligi kerak!',
            'country.string'    => 'Mamlakat nomi matn ko`rinishida bo`lishi kerak!',
            'country.unique'    => 'Bu mamlakat oldin kiritilgan!',
        ];
    }
}
