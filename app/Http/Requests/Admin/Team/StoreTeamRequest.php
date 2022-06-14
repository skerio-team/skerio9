<?php

namespace App\Http\Requests\Admin\Team;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
            'name'                  => 'required|string|max:20|unique:teams',
            'sport_category_id'     => 'required',
            'year'                  => 'required',
            'official_site'         => 'required',
            'sport_category_id'     => 'required',
            'image'                 => 'required|file|max:5000|mimes:png,jpg,jpeg,gif',
        ];
    }

    public function messages()
    {
        return [
            'name.required'              => 'Bu nom to`ldirilishi kerak!',
            'name.string'                => 'Bu nom matn ko`rinishida bo`lishi kerak!',
            'name.max'                   => 'Bu nom eng ko`pi bilan 20 ta belgidan oshmasligi kerak!',
            'name.unique'                => 'Bu nom oldin tanlangan!',

            'sport_category_id.required' => 'Sport Kategoriyasi tanlanishi kerak!',

            'year.required'              => 'Tashkil topgan yili kiritilishi kerak kerak!',

            'official_site.required'     => 'Rasmiy sayti kiritilishi kerak kerak!',

            'image.required'             => 'Rasm tanlanishi kerak!',
            'image.file'                 => 'Rasm fayl tipida bo`lishligi kerak!',
            'image.max'                  => 'Rasm hajmi 5 mb.dan oshmasligi kerak!',
            'image.mimes'                => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',

        ];
    }
}
